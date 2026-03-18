<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

header('Content-Type: application/json; charset=utf-8');

// Only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Método não permitido']);
    exit;
}

// CSRF check
$token = $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
if (empty($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    http_response_code(403);
    echo json_encode(['error' => 'Token inválido']);
    exit;
}

// Parse JSON body
$body = json_decode(file_get_contents('php://input'), true);
if (!is_array($body)) {
    http_response_code(400);
    echo json_encode(['error' => 'Corpo da requisição inválido']);
    exit;
}

// Validate
$name  = trim((string)($body['name']  ?? ''));
$email = trim((string)($body['email'] ?? ''));
$phone = trim((string)($body['phone'] ?? ''));
$sites = $body['sites'] ?? [];

$errors = [];

if (strlen($name) < 2) {
    $errors[] = 'Nome deve ter ao menos 2 caracteres';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'E-mail inválido';
}
if (empty($phone)) {
    $errors[] = 'Telefone obrigatório';
}
if (!is_array($sites) || count($sites) === 0) {
    $errors[] = 'Informe ao menos um site';
} elseif (count($sites) > 10) {
    $errors[] = 'Máximo de 10 sites permitidos';
} else {
    foreach ($sites as $url) {
        $url = trim((string)$url);
        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors[] = 'URL inválida: ' . htmlspecialchars($url);
            break;
        }
        $scheme = parse_url($url, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https'], true)) {
            $errors[] = 'URLs devem usar http ou https';
            break;
        }
    }
}

if (!empty($errors)) {
    http_response_code(400);
    echo json_encode(['error' => implode('. ', $errors)]);
    exit;
}

// Sanitize sites
$sites = array_map(fn($u) => trim((string)$u), $sites);

// UUID v4
if (!function_exists('generate_uuid_v4')) {
    function generate_uuid_v4(): string {
        $data = random_bytes(16);
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }
}

$contact = [
    'id'         => generate_uuid_v4(),
    'created_at' => date('c'),
    'name'       => $name,
    'email'      => $email,
    'phone'      => $phone,
    'sites'      => $sites,
];

// Write to JSON with exclusive lock
$dataDir = __DIR__ . '/data';
$file    = $dataDir . '/contacts.json';

if (!is_dir($dataDir)) {
    mkdir($dataDir, 0755, true);
}

$fp = fopen($file, 'c+');
if (!$fp) {
    http_response_code(500);
    echo json_encode(['error' => 'Erro interno ao salvar']);
    exit;
}

flock($fp, LOCK_EX);
$size     = filesize($file) ?: 0;
$content  = $size > 0 ? fread($fp, $size) : '[]';
$contacts = json_decode($content, true);
if (!is_array($contacts)) {
    $contacts = [];
}
$contacts[] = $contact;
rewind($fp);
ftruncate($fp, 0);
fwrite($fp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
flock($fp, LOCK_UN);
fclose($fp);

http_response_code(201);
echo json_encode(['success' => true]);
