<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ── Credentials ──────────────────────────────────────────────────────────────
define('ADMIN_EMAIL', 'edgar@onlinetizando.com');
define('ADMIN_HASH',  '$2y$12$Bp/KVwItz4TB6XOde8AOqecoSuSvemcf7fYRc3ZBlBopyDnSvxMBC'); // generated with password_hash()

// ── Config ────────────────────────────────────────────────────────────────────
define('DATA_DIR',           __DIR__ . '/data');
define('CONTACTS_FILE',      DATA_DIR . '/contacts.json');
define('ATTEMPTS_FILE',      DATA_DIR . '/login_attempts.json');
define('SESSION_TIMEOUT',    7200);   // 2 hours
define('MAX_ATTEMPTS',       5);
define('LOCKOUT_SECONDS',    900);    // 15 minutes
define('PER_PAGE',           20);

// ── Helpers ───────────────────────────────────────────────────────────────────
function read_json(string $file): array {
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    return json_decode($content ?: '[]', true) ?: [];
}

function write_json(string $file, array $data): void {
    if (!is_dir(DATA_DIR)) mkdir(DATA_DIR, 0755, true);
    $fp = fopen($file, 'c+');
    if (!$fp) return;
    flock($fp, LOCK_EX);
    rewind($fp);
    ftruncate($fp, 0);
    fwrite($fp, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
    flock($fp, LOCK_UN);
    fclose($fp);
}

function get_client_ip(): string {
    return $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
}

function is_locked_out(): bool {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    if (!isset($attempts[$ip])) return false;
    $entry = $attempts[$ip];
    if ($entry['count'] < MAX_ATTEMPTS) return false;
    if (time() - $entry['last'] < LOCKOUT_SECONDS) return true;
    // Lockout expired — reset
    unset($attempts[$ip]);
    write_json(ATTEMPTS_FILE, $attempts);
    return false;
}

function record_failed_attempt(): void {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    if (!isset($attempts[$ip])) {
        $attempts[$ip] = ['count' => 0, 'last' => 0];
    }
    $attempts[$ip]['count']++;
    $attempts[$ip]['last'] = time();
    write_json(ATTEMPTS_FILE, $attempts);
}

function clear_attempts(): void {
    $attempts = read_json(ATTEMPTS_FILE);
    $ip       = get_client_ip();
    unset($attempts[$ip]);
    write_json(ATTEMPTS_FILE, $attempts);
}

function check_session_timeout(): void {
    if (isset($_SESSION['admin'])) {
        if (time() - ($_SESSION['last_activity'] ?? 0) > SESSION_TIMEOUT) {
            session_destroy();
            header('Location: painel-contatos.php?timeout=1');
            exit;
        }
        $_SESSION['last_activity'] = time();
    }
}

// ── Init CSRF for this page ───────────────────────────────────────────────────
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// ── Check session timeout ─────────────────────────────────────────────────────
check_session_timeout();

// ── Logout ────────────────────────────────────────────────────────────────────
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: painel-contatos.php');
    exit;
}

// ── Login POST ────────────────────────────────────────────────────────────────
$loginError = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['admin'])) {
    if (is_locked_out()) {
        $loginError = 'Muitas tentativas. Aguarde 15 minutos.';
    } else {
        $inputEmail = trim($_POST['email'] ?? '');
        $inputPass  = $_POST['password'] ?? '';
        if ($inputEmail === ADMIN_EMAIL && password_verify($inputPass, ADMIN_HASH)) {
            session_regenerate_id(true);
            $_SESSION['admin']         = true;
            $_SESSION['last_activity'] = time();
            clear_attempts();
            header('Location: painel-contatos.php');
            exit;
        } else {
            record_failed_attempt();
            $loginError = 'Credenciais inválidas.';
        }
    }
}

// ── Pagination ────────────────────────────────────────────────────────────────
$page        = max(1, (int)($_GET['page'] ?? 1));
$allContacts = array_reverse(read_json(CONTACTS_FILE)); // newest first
$total       = count($allContacts);
$pages       = max(1, (int)ceil($total / PER_PAGE));
$page        = min($page, $pages);
$offset      = ($page - 1) * PER_PAGE;
$contacts    = array_slice($allContacts, $offset, PER_PAGE);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Contatos — XClickID</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>body { font-family: 'Inter', sans-serif; background: #050505; color: #fff; }</style>
</head>
<body class="min-h-screen">

<?php if (!isset($_SESSION['admin'])): ?>
<!-- ═══════════════════════════ LOGIN FORM ═══════════════════════════ -->
<div class="min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-sm">
        <div class="text-center mb-8">
            <p class="text-zinc-500 text-sm uppercase tracking-widest font-semibold mb-4">Administrador</p>
            <h1 class="text-2xl font-bold text-white">Painel de Contatos</h1>
        </div>
        <?php if ($loginError): ?>
            <div class="bg-red-500/10 border border-red-500/20 text-red-400 text-sm rounded-xl px-4 py-3 mb-4">
                <?= htmlspecialchars($loginError) ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_GET['timeout'])): ?>
            <div class="bg-yellow-500/10 border border-yellow-500/20 text-yellow-400 text-sm rounded-xl px-4 py-3 mb-4">
                Sessão expirada. Faça login novamente.
            </div>
        <?php endif; ?>
        <form method="POST" class="bg-white/[0.03] border border-white/5 rounded-2xl p-6 space-y-4">
            <div>
                <label class="block text-sm text-zinc-400 mb-1.5">E-mail</label>
                <input type="email" name="email" required autocomplete="username"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="admin@email.com">
            </div>
            <div>
                <label class="block text-sm text-zinc-400 mb-1.5">Senha</label>
                <input type="password" name="password" required autocomplete="current-password"
                       class="w-full bg-white/5 border border-white/10 rounded-xl px-4 py-3 text-white text-sm focus:outline-none focus:border-blue-500 transition-colors"
                       placeholder="••••••••••••">
            </div>
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-full py-3 text-sm transition-colors">
                Entrar
            </button>
        </form>
    </div>
</div>

<?php else: ?>
<!-- ═══════════════════════════ DASHBOARD ═══════════════════════════ -->

<!-- Header bar -->
<header class="border-b border-white/5 bg-[#0a0a0a] sticky top-0 z-10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <span class="text-white font-bold text-lg">Painel de Contatos</span>
            <span class="bg-blue-500/10 border border-blue-500/20 text-blue-400 text-xs font-semibold px-2.5 py-1 rounded-full">
                <?= $total ?> contato<?= $total !== 1 ? 's' : '' ?>
            </span>
        </div>
        <div class="flex items-center gap-3">
            <!-- Export CSV -->
            <form method="POST" action="admin-action.php">
                <input type="hidden" name="action" value="export">
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                <button type="submit" class="flex items-center gap-2 bg-white/5 hover:bg-white/10 border border-white/10 text-white text-sm font-medium px-4 py-2 rounded-full transition-colors">
                    <i data-lucide="download" class="w-4 h-4"></i> Exportar CSV
                </button>
            </form>
            <!-- Logout -->
            <a href="painel-contatos.php?logout=1" class="flex items-center gap-2 text-zinc-400 hover:text-white text-sm transition-colors">
                <i data-lucide="log-out" class="w-4 h-4"></i> Sair
            </a>
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-8">

    <?php if (empty($contacts) && $page === 1): ?>
    <!-- Empty state -->
    <div class="text-center py-24">
        <div class="w-16 h-16 rounded-full bg-white/5 flex items-center justify-center mx-auto mb-4">
            <i data-lucide="inbox" class="w-8 h-8 text-zinc-600"></i>
        </div>
        <p class="text-white font-semibold mb-1">Nenhum contato ainda</p>
        <p class="text-zinc-500 text-sm">Os formulários preenchidos aparecerão aqui.</p>
    </div>

    <?php else: ?>
    <!-- Table -->
    <div class="bg-white/[0.02] border border-white/5 rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-white/5 text-zinc-500 text-xs uppercase tracking-wider">
                        <th class="text-left px-6 py-4 font-medium">Data</th>
                        <th class="text-left px-6 py-4 font-medium">Nome</th>
                        <th class="text-left px-6 py-4 font-medium">E-mail</th>
                        <th class="text-left px-6 py-4 font-medium">Telefone</th>
                        <th class="text-left px-6 py-4 font-medium">Sites</th>
                        <th class="text-left px-6 py-4 font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <?php foreach ($contacts as $c): ?>
                    <tr class="hover:bg-white/[0.02] transition-colors">
                        <td class="px-6 py-4 text-zinc-400 whitespace-nowrap">
                            <?= htmlspecialchars(date('d/m/Y H:i', strtotime($c['created_at']))) ?>
                        </td>
                        <td class="px-6 py-4 text-white font-medium">
                            <?= htmlspecialchars($c['name']) ?>
                        </td>
                        <td class="px-6 py-4 text-zinc-300">
                            <?= htmlspecialchars($c['email']) ?>
                        </td>
                        <td class="px-6 py-4 text-zinc-300 whitespace-nowrap">
                            <?= htmlspecialchars($c['phone']) ?>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex flex-col gap-1">
                                <?php foreach ((array)$c['sites'] as $url): ?>
                                    <a href="<?= htmlspecialchars($url) ?>" target="_blank" rel="noopener noreferrer"
                                       class="text-blue-400 hover:text-blue-300 transition-colors truncate max-w-[200px] block"
                                       title="<?= htmlspecialchars($url) ?>">
                                        <?= htmlspecialchars($url) ?>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <form method="POST" action="admin-action.php" class="inline delete-form">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($c['id']) ?>">
                                <input type="hidden" name="page" value="<?= $page ?>">
                                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token']) ?>">
                                <button type="submit"
                                        class="text-zinc-500 hover:text-red-400 transition-colors flex items-center gap-1.5 text-xs">
                                    <i data-lucide="trash-2" class="w-3.5 h-3.5"></i> Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pagination -->
    <?php if ($pages > 1): ?>
    <div class="flex items-center justify-between mt-6">
        <p class="text-zinc-500 text-sm">
            Mostrando <?= $offset + 1 ?>–<?= min($offset + PER_PAGE, $total) ?> de <?= $total ?>
        </p>
        <div class="flex items-center gap-2">
            <?php if ($page > 1): ?>
                <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 text-white text-sm transition-colors">← Anterior</a>
            <?php endif; ?>
            <?php if ($page < $pages): ?>
                <a href="?page=<?= $page + 1 ?>" class="px-4 py-2 rounded-full bg-white/5 hover:bg-white/10 text-white text-sm transition-colors">Próximo →</a>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>

    <?php endif; ?>
</main>

<?php endif; ?>

<script>
if (typeof lucide !== 'undefined') lucide.createIcons();

// Confirm before delete
document.querySelectorAll('.delete-form').forEach(form => {
    form.addEventListener('submit', e => {
        if (!confirm('Excluir este contato? Esta ação não pode ser desfeita.')) {
            e.preventDefault();
        }
    });
});
</script>

</body>
</html>
