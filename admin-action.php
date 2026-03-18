<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Must be logged in
if (!isset($_SESSION['admin'])) {
    header('Location: painel-contatos.php');
    exit;
}

// Must be POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: painel-contatos.php');
    exit;
}

// CSRF check (from POST body — plain HTML form submissions)
$token = $_POST['csrf_token'] ?? '';
if (empty($token) || empty($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $token)) {
    http_response_code(403);
    echo 'Token inválido';
    exit;
}

define('DATA_DIR',      __DIR__ . '/data');
define('CONTACTS_FILE', DATA_DIR . '/contacts.json');

function read_contacts(): array {
    if (!file_exists(CONTACTS_FILE)) return [];
    return json_decode(file_get_contents(CONTACTS_FILE) ?: '[]', true) ?: [];
}

function write_contacts(array $contacts): void {
    if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
    $fp = fopen(CONTACTS_FILE, 'c+');
    if (!$fp) return;
    flock($fp, LOCK_EX);
    rewind($fp);
    ftruncate($fp, 0);
    fwrite($fp, json_encode($contacts, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    flock($fp, LOCK_UN);
    fclose($fp);
}

$action = $_POST['action'] ?? '';

// ── DELETE ────────────────────────────────────────────────────────────────────
if ($action === 'delete') {
    $id       = trim($_POST['id'] ?? '');
    $page     = max(1, (int)($_POST['page'] ?? 1));
    $contacts = read_contacts();
    $contacts = array_values(array_filter($contacts, fn($c) => $c['id'] !== $id));
    write_contacts($contacts);
    header('Location: painel-contatos.php?page=' . $page);
    exit;
}

// ── EXPORT CSV ────────────────────────────────────────────────────────────────
if ($action === 'export') {
    $contacts = array_reverse(read_contacts()); // newest first
    $date     = date('Y-m-d');

    header('Content-Type: text/csv; charset=UTF-8');
    header('Content-Disposition: attachment; filename="contatos-' . $date . '.csv"');
    header('Cache-Control: no-cache, no-store, must-revalidate');

    $out = fopen('php://output', 'w');
    // BOM for Excel UTF-8 compatibility
    fputs($out, "\xEF\xBB\xBF");
    fputcsv($out, ['ID', 'Data', 'Nome', 'E-mail', 'Telefone', 'Sites']);

    foreach ($contacts as $c) {
        fputcsv($out, [
            $c['id'],
            $c['created_at'],
            $c['name'],
            $c['email'],
            $c['phone'],
            implode(' | ', (array)$c['sites'])
        ]);
    }

    fclose($out);
    exit;
}

// Unknown action
header('Location: painel-contatos.php');
exit;
