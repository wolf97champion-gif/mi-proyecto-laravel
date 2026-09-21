<?php
declare(strict_types=1);

/**
 * admin.php
 * -------------------------------------------------------------------
 * Panel de administración con acceso restringido por contraseña.
 * Muestra cuántos usuarios hay conectados ahora y las visitas del sitio.
 *
 * >>> IMPORTANTE (SEGURIDAD) <<<
 * 1. CAMBIÁ la contraseña de abajo por una tuya, larga y difícil.
 *    Lo ideal es guardarla en una variable de entorno en Render:
 *    Settings -> Environment -> Add: ADMIN_CLAVE = tu_clave_secreta
 * 2. Este panel debe usarse siempre por HTTPS (Render ya te lo da).
 * -------------------------------------------------------------------
 */

session_start();

// ====================== CONFIGURACIÓN ======================
// Si definís la variable de entorno ADMIN_CLAVE en Render, se usa esa.
// Si no, se usa la de aquí abajo (CAMBIALA SÍ O SÍ).
$CLAVE_ADMIN = getenv('ADMIN_CLAVE') ?: 'CambiaEstaClave2026';
// ===========================================================

$dirDatos    = __DIR__ . '/../storage/app/datos';
$archOnline  = $dirDatos . '/online.json';
$archVisitas = $dirDatos . '/visitas.json';
const ADMIN_TIMEOUT = 60;

function h(mixed $v): string {
    return htmlspecialchars((string)$v, ENT_QUOTES, 'UTF-8');
}

function leer_json(string $archivo): array {
    if (!is_file($archivo)) {
        return [];
    }
    $contenido = @file_get_contents($archivo);
    return json_decode($contenido ?: '[]', true) ?: [];
}

/* ---------------------------- cerrar sesión ------------------------------ */
if (isset($_GET['salir'])) {
    $_SESSION = [];
    session_destroy();
    header('Location: admin.php');
    exit;
}

/* ------------------------------ login ------------------------------------ */
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $claveIngresada = (string)($_POST['clave'] ?? '');
    if (hash_equals($CLAVE_ADMIN, $claveIngresada)) {
        session_regenerate_id(true);
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    }
    $error = 'Contraseña incorrecta.';
}

$logueado = !empty($_SESSION['admin']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <?php if ($logueado): ?>
    <meta http-equiv="refresh" content="10"><!-- refresca el panel cada 10s -->
    <?php endif; ?>
    <title>Panel de Admin | El Punto de Encuentro</title>
    <style>
        :root {
            --bg-base: #07090e;
            --bg-surface: #0f131c;
            --accent: #f59e0b;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border: rgba(255,255,255,0.08);
            --ok: #16a34a;
        }
        * { margin:0; padding:0; box-sizing:border-box; font-family: system-ui, -apple-system, sans-serif; }
        body { background: var(--bg-base); color: var(--text-main); min-height:100vh; padding: 30px 20px; }
        .wrap { max-width: 1000px; margin: 0 auto; }
        h1 { font-size: 1.5rem; margin-bottom: 4px; }
        .sub { color: var(--text-muted); font-size: 0.85rem; margin-bottom: 25px; }
        .accent { color: var(--accent); }

        /* Login */
        .login-box { max-width: 360px; margin: 8vh auto; background: var(--bg-surface); border:1px solid var(--border); border-radius: 16px; padding: 30px; }
        .login-box h1 { text-align:center; }
        .login-box .sub { text-align:center; }
        .login-box input { width:100%; padding: 12px 14px; border-radius:10px; border:1px solid var(--border); background: var(--bg-base); color: var(--text-main); font-size: 0.95rem; margin-bottom: 12px; }
        .login-box button { width:100%; padding: 12px; border:0; border-radius:10px; background: var(--accent); color:#000; font-weight:700; font-size: 0.95rem; cursor:pointer; }
        .login-box button:hover { background:#fbbf24; }
        .msg-error { background: rgba(239,68,68,0.15); border:1px solid rgba(239,68,68,0.4); color:#fca5a5; padding:10px; border-radius:8px; font-size:0.85rem; margin-bottom:12px; text-align:center; }

        /* Dashboard */
        .topbar { display:flex; justify-content:space-between; align-items:center; margin-bottom: 25px; }
        .btn-salir { color: var(--text-muted); text-decoration:none; font-size:0.85rem; border:1px solid var(--border); padding:8px 14px; border-radius:8px; }
        .btn-salir:hover { color:#fff; border-color: var(--accent); }
        .cards { display:grid; grid-template-columns: repeat(auto-fit, minmax(200px,1fr)); gap:15px; margin-bottom: 25px; }
        .card { background: var(--bg-surface); border:1px solid var(--border); border-radius:14px; padding:22px; }
        .card .n { font-size: 2.4rem; font-weight: 800; color: var(--accent); line-height:1; }
        .card .n.live { color: var(--ok); }
        .card .lbl { color: var(--text-muted); font-size:0.8rem; text-transform:uppercase; letter-spacing:1px; margin-top:6px; }
        .dot { display:inline-block; width:9px; height:9px; border-radius:50%; background: var(--ok); margin-right:6px; animation: pulse 1.5s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.3} }
        .panel { background: var(--bg-surface); border:1px solid var(--border); border-radius:14px; padding:22px; margin-bottom:20px; }
        .panel h2 { font-size:1.05rem; margin-bottom:14px; }
        table { width:100%; border-collapse: collapse; font-size:0.9rem; }
        th, td { text-align:left; padding:10px 8px; border-bottom:1px solid var(--border); }
        th { color: var(--text-muted); font-weight:600; font-size:0.78rem; text-transform:uppercase; letter-spacing:0.5px; }
        td.num { text-align:right; font-weight:700; color: var(--accent); }
        .vacio { color: var(--text-muted); font-size:0.88rem; padding: 8px 0; }
        .nota { color: var(--text-muted); font-size:0.75rem; margin-top: 10px; }
    </style>
</head>
<body>
<div class="wrap">

<?php if (!$logueado): ?>
    <!-- ===================== PANTALLA DE LOGIN ===================== -->
    <form class="login-box" method="post" action="admin.php">
        <h1>🔒 Panel de Admin</h1>
        <p class="sub">El Punto de Encuentro</p>
        <?php if ($error): ?>
            <div class="msg-error"><?= h($error) ?></div>
        <?php endif; ?>
        <input type="password" name="clave" placeholder="Contraseña" autofocus required>
        <button type="submit">Ingresar</button>
    </form>

<?php else: ?>
    <!-- ===================== DASHBOARD ===================== -->
    <?php
    $ahora   = time();
    $online  = leer_json($archOnline);
    $visitas = leer_json($archVisitas);

    // Filtrar conectados activos y agrupar por página.
    $conectados = 0;
    $porPagina  = [];
    foreach ($online as $info) {
        if (($ahora - (int)($info['ts'] ?? 0)) <= ADMIN_TIMEOUT) {
            $conectados++;
            $pag = (string)($info['pagina'] ?? 'desconocida');
            $porPagina[$pag] = ($porPagina[$pag] ?? 0) + 1;
        }
    }
    arsort($porPagina);

    $totalVisitas = (int)($visitas['total'] ?? 0);
    $visitasPagina = $visitas['paginas'] ?? [];
    arsort($visitasPagina);
    ?>
    <div class="topbar">
        <div>
            <h1>Panel de <span class="accent">Control</span></h1>
            <p class="sub">Datos en vivo · se actualiza cada 10 segundos</p>
        </div>
        <a class="btn-salir" href="admin.php?salir=1">Cerrar sesión</a>
    </div>

    <div class="cards">
        <div class="card">
            <div class="n live"><span class="dot"></span><?= (int)$conectados ?></div>
            <div class="lbl">Conectados ahora</div>
        </div>
        <div class="card">
            <div class="n"><?= number_format($totalVisitas, 0, ',', '.') ?></div>
            <div class="lbl">Páginas vistas (total)</div>
        </div>
        <div class="card">
            <div class="n"><?= count($visitasPagina) ?></div>
            <div class="lbl">Páginas registradas</div>
        </div>
    </div>

    <div class="panel">
        <h2>🟢 ¿Qué están viendo ahora?</h2>
        <?php if ($conectados === 0): ?>
            <p class="vacio">Nadie navegando en este momento.</p>
        <?php else: ?>
            <table>
                <thead><tr><th>Página</th><th style="text-align:right;">Usuarios</th></tr></thead>
                <tbody>
                <?php foreach ($porPagina as $pag => $cant): ?>
                    <tr><td><?= h($pag) ?></td><td class="num"><?= (int)$cant ?></td></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <div class="panel">
        <h2>📊 Visitas por página (histórico)</h2>
        <?php if (empty($visitasPagina)): ?>
            <p class="vacio">Todavía no hay visitas registradas. Instalá el tracker en tus páginas (ver instrucciones).</p>
        <?php else: ?>
            <table>
                <thead><tr><th>Página</th><th style="text-align:right;">Vistas</th></tr></thead>
                <tbody>
                <?php foreach ($visitasPagina as $pag => $cant): ?>
                    <tr><td><?= h($pag) ?></td><td class="num"><?= number_format((int)$cant, 0, ',', '.') ?></td></tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <p class="nota">"Conectados" = visitantes activos en los últimos <?= ADMIN_TIMEOUT ?> segundos.</p>
    </div>
<?php endif; ?>

</div>
</body>
</html>