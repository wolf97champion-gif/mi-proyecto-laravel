<?php
declare(strict_types=1);

/**
 * tracker.php
 * -------------------------------------------------------------------
 * Registra visitas y usuarios "en línea" del sitio.
 *
 * CÓMO USARLO: poné esta línea como PRIMERA línea de cada página
 * .php que quieras medir (antes de cualquier HTML):
 *
 *     <?php require __DIR__ . '/tracker.php'; ?>
 *
 * Guarda los datos en storage/app/datos (FUERA de public/, privado).
 * -------------------------------------------------------------------
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// La carpeta de datos va FUERA de public/ (en storage/) para que
// nadie pueda descargar los JSON escribiendo la URL en el navegador.
$dirDatos = __DIR__ . '/../storage/app/datos';
if (!is_dir($dirDatos)) {
    @mkdir($dirDatos, 0775, true);
}

$archOnline  = $dirDatos . '/online.json';
$archVisitas = $dirDatos . '/visitas.json';

// Segundos sin actividad para considerar que alguien se "desconectó".
const TRACKER_TIMEOUT = 60;

$paginaActual = basename($_SERVER['PHP_SELF'] ?? 'desconocida');

/* ------------------------- helpers de lectura/escritura ------------------ */

function tracker_leer(string $archivo): array {
    if (!is_file($archivo)) {
        return [];
    }
    $fp = fopen($archivo, 'r');
    if (!$fp) {
        return [];
    }
    $datos = [];
    if (flock($fp, LOCK_SH)) {
        $contenido = stream_get_contents($fp);
        flock($fp, LOCK_UN);
        $datos = json_decode($contenido ?: '[]', true) ?: [];
    }
    fclose($fp);
    return $datos;
}

function tracker_escribir(string $archivo, array $datos): void {
    $fp = fopen($archivo, 'c+');
    if (!$fp) {
        return;
    }
    if (flock($fp, LOCK_EX)) {
        ftruncate($fp, 0);
        rewind($fp);
        fwrite($fp, json_encode($datos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        fflush($fp);
        flock($fp, LOCK_UN);
    }
    fclose($fp);
}

$ahora = time();

/* --------------------------- registrar "en línea" ------------------------ */
$online = tracker_leer($archOnline);
$sid = session_id();

$online[$sid] = ['ts' => $ahora, 'pagina' => $paginaActual];

// Sacar a los que están inactivos hace más de TRACKER_TIMEOUT segundos.
foreach ($online as $clave => $info) {
    if (($ahora - (int)($info['ts'] ?? 0)) > TRACKER_TIMEOUT) {
        unset($online[$clave]);
    }
}
tracker_escribir($archOnline, $online);

/* ----------------------------- contar la visita -------------------------- */
$visitas = tracker_leer($archVisitas);
$visitas['total']   = (int)($visitas['total'] ?? 0) + 1;
$visitas['paginas'] = $visitas['paginas'] ?? [];
$visitas['paginas'][$paginaActual] = (int)($visitas['paginas'][$paginaActual] ?? 0) + 1;
tracker_escribir($archVisitas, $visitas);
