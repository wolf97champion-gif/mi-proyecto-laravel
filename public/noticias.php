<?php
/*
 |------------------------------------------------------------------
 | NOTICIAS DE BOCA JUNIORS - El Punto de Encuentro
 |------------------------------------------------------------------
 | Trae solo las ultimas noticias de Boca desde Google News (gratis)
 | y las guarda un ratito en cache para que cargue rapido en Render.
 | No hay que cargar nada a mano: se actualiza solo.
 */

// ---- CONFIG ----
$FEED_URL  = 'https://news.google.com/rss/search?q=%22Boca+Juniors%22&hl=es-419&gl=AR&ceid=AR:es-419';
$CACHE_MIN = 15; // cada cuantos minutos se refresca
$MAX_NOTICIAS = 24;

// Carpeta de cache (misma logica que el foro: storage/app/datos)
$cacheDir  = __DIR__ . '/../storage/app/datos';
$cacheFile = $cacheDir . '/noticias_boca.xml';
if (!is_dir($cacheDir)) { @mkdir($cacheDir, 0775, true); }

// ---- TRAER EL FEED (con cache) ----
function bajarFeed($url) {
    if (function_exists('curl_init')) {
        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_TIMEOUT        => 12,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_USERAGENT      => 'Mozilla/5.0 (PuntoDeEncuentro Bot)'
        ]);
        $data = curl_exec($ch);
        curl_close($ch);
        if ($data) return $data;
    }
    $ctx = stream_context_create(['http' => ['timeout' => 12, 'user_agent' => 'Mozilla/5.0']]);
    return @file_get_contents($url, false, $ctx);
}

$xmlData = null;
$cacheValido = is_file($cacheFile) && (time() - filemtime($cacheFile) < $CACHE_MIN * 60);

if ($cacheValido) {
    $xmlData = @file_get_contents($cacheFile);
} else {
    $xmlData = bajarFeed($FEED_URL);
    if ($xmlData && strpos($xmlData, '<item') !== false) {
        @file_put_contents($cacheFile, $xmlData);
    } elseif (is_file($cacheFile)) {
        // si fallo la descarga, usamos lo ultimo que teniamos guardado
        $xmlData = @file_get_contents($cacheFile);
    }
}

// ---- PARSEAR ----
$noticias = [];
if ($xmlData) {
    libxml_use_internal_errors(true);
    $xml = simplexml_load_string($xmlData);
    if ($xml && isset($xml->channel->item)) {
        foreach ($xml->channel->item as $item) {
            $titulo = trim((string)$item->title);
            $link   = trim((string)$item->link);
            $fecha  = trim((string)$item->pubDate);
            $fuente = isset($item->source) ? trim((string)$item->source) : '';
            // El titulo de Google News suele venir como \"Titular - Fuente\"
            if ($fuente === '' && strrpos($titulo, ' - ') !== false) {
                $fuente = trim(substr($titulo, strrpos($titulo, ' - ') + 3));
                $titulo = trim(substr($titulo, 0, strrpos($titulo, ' - ')));
            }
            if ($titulo && $link) {
                $noticias[] = ['titulo' => $titulo, 'link' => $link, 'fecha' => $fecha, 'fuente' => $fuente];
            }
            if (count($noticias) >= $MAX_NOTICIAS) break;
        }
    }
}

// ---- FECHA LINDA (hace X horas / dd mmm) ----
function fechaLinda($pubDate) {
    if (!$pubDate) return '';
    $ts = strtotime($pubDate);
    if (!$ts) return '';
    $diff = time() - $ts;
    if ($diff < 60)      return 'recién';
    if ($diff < 3600)    return 'hace ' . floor($diff / 60) . ' min';
    if ($diff < 86400)   return 'hace ' . floor($diff / 3600) . ' h';
    if ($diff < 172800)  return 'ayer';
    $meses = ['', 'ene','feb','mar','abr','may','jun','jul','ago','sep','oct','nov','dic'];
    return date('j', $ts) . ' ' . $meses[(int)date('n', $ts)];
}

$ultimaAct = is_file($cacheFile) ? date('H:i', filemtime($cacheFile)) : date('H:i');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias de Boca · El Punto de Encuentro</title>
    <!-- se refresca solo cada 15 min para traer lo ultimo -->
    <meta http-equiv="refresh" content="900">
    <style>
        :root {
            --bg-base: #0b0e14;
            --bg-card: #131824;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --accent: #f5b301;
            --accent2: #009ee3;
            --border: rgba(255,255,255,0.08);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: var(--bg-base);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
        }
        a { text-decoration: none; color: inherit; }

        /* ---- SIDEBAR / NAVBAR ---- */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0e131f, #0b0e14);
            border-right: 1px solid var(--border);
            padding: 22px 18px;
            display: flex;
            flex-direction: column;
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .brand { font-size: 1.15rem; font-weight: 800; letter-spacing: 0.5px; color: var(--accent); margin-bottom: 4px; }
        .brand span { color: var(--accent2); }
        .brand-sub { font-size: 0.7rem; color: var(--text-muted); margin-bottom: 22px; }
        .nav-title { font-size: 0.65rem; color: var(--text-muted); text-transform: uppercase; letter-spacing: 1px; margin: 14px 0 8px; }
        .nav-link {
            display: flex; align-items: center; gap: 9px;
            padding: 9px 11px; border-radius: 9px; font-size: 0.88rem;
            color: var(--text-muted); font-weight: 600; margin-bottom: 3px;
            transition: all 0.15s;
        }
        .nav-link:hover { background: rgba(255,255,255,0.05); color: var(--text-main); }
        .nav-link.active { background: rgba(245,179,1,0.14); color: var(--accent); }
        .badge-pronto { font-size: 0.55rem; background: #f97316; color: #000; padding: 2px 6px; border-radius: 5px; font-weight: 800; margin-left: auto; }

        .sidebar-footer { margin-top: auto; padding-top: 18px; }
        .sidebar-socials { display: flex; flex-direction: column; gap: 7px; }
        .social-pill {
            display: flex; align-items: center; gap: 8px;
            padding: 8px 11px; border-radius: 9px; font-size: 0.8rem; font-weight: 700;
            border: 1px solid var(--border); color: var(--text-muted); transition: all 0.15s;
        }
        .social-pill.youtube:hover { background: #ff0000; border-color: #ff0000; color: #fff; }
        .social-pill.tiktok:hover { background: #ff0050; border-color: #ff0050; color: #fff; }

        /* --- CAJA MERCADO PAGO EN EL NAVBAR --- */
        .mp-box { margin-top: 14px; background: linear-gradient(135deg, rgba(0,158,227,0.18), rgba(245,158,11,0.10)); border: 1px solid rgba(0,158,227,0.35); border-radius: 12px; padding: 12px; }
        .mp-box .mp-title { font-size: 0.72rem; font-weight: 800; color: #35c2ff; letter-spacing: 0.5px; display: flex; align-items: center; gap: 6px; margin-bottom: 8px; }
        .mp-row { font-size: 0.74rem; color: var(--text-muted); margin-bottom: 4px; }
        .mp-row b { color: var(--text-main); font-weight: 700; }
        .mp-alias { display: flex; align-items: center; justify-content: space-between; gap: 8px; background: var(--bg-base); border: 1px solid var(--border); border-radius: 8px; padding: 7px 10px; margin-top: 6px; }
        .mp-alias code { color: var(--accent); font-weight: 800; font-size: 0.82rem; }
        .mp-copy { background: var(--accent); color: #000; border: none; border-radius: 6px; padding: 4px 9px; font-size: 0.68rem; font-weight: 800; cursor: pointer; }
        .mp-copy:hover { background: #fbbf24; }

        /* ---- CONTENIDO ---- */
        .main { flex: 1; padding: 32px 38px; max-width: 1100px; }
        .page-head { display: flex; align-items: flex-end; justify-content: space-between; flex-wrap: wrap; gap: 12px; margin-bottom: 8px; }
        .page-title { font-size: 1.9rem; font-weight: 800; }
        .page-title .em { color: var(--accent); }
        .page-sub { color: var(--text-muted); font-size: 0.92rem; margin-bottom: 22px; }
        .live-pill {
            display: inline-flex; align-items: center; gap: 7px;
            font-size: 0.72rem; font-weight: 700; color: #4ade80;
            background: rgba(74,222,128,0.12); border: 1px solid rgba(74,222,128,0.3);
            padding: 6px 12px; border-radius: 999px;
        }
        .live-dot { width: 8px; height: 8px; border-radius: 50%; background: #4ade80; animation: pulso 1.4s infinite; }
        @keyframes pulso { 0%,100% { opacity: 1; } 50% { opacity: 0.35; } }

        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 16px; }
        .card {
            background: var(--bg-card); border: 1px solid var(--border);
            border-radius: 14px; padding: 18px; display: flex; flex-direction: column;
            transition: transform 0.15s, border-color 0.15s;
        }
        .card:hover { transform: translateY(-3px); border-color: rgba(245,179,1,0.4); }
        .card-fuente { font-size: 0.7rem; font-weight: 800; color: var(--accent2); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .card-titulo { font-size: 1.02rem; font-weight: 700; line-height: 1.4; color: var(--text-main); margin-bottom: 14px; }
        .card-foot { margin-top: auto; display: flex; align-items: center; justify-content: space-between; }
        .card-fecha { font-size: 0.75rem; color: var(--text-muted); }
        .card-link { font-size: 0.78rem; font-weight: 800; color: var(--accent); }
        .card-link:hover { text-decoration: underline; }

        .vacio { background: var(--bg-card); border: 1px dashed var(--border); border-radius: 14px; padding: 40px; text-align: center; color: var(--text-muted); }
        .foot-note { margin-top: 26px; font-size: 0.75rem; color: var(--text-muted); line-height: 1.6; }

        @media (max-width: 800px) {
            body { flex-direction: column; }
            .sidebar { width: 100%; height: auto; position: static; }
            .main { padding: 22px; }
        }
    </style>
</head>
<body>
    <!-- ================= NAVBAR ================= -->
    <aside class="sidebar">
        <div class="brand">PUNTO DE <span>ENCUENTRO</span></div>
        <div class="brand-sub">La web de la comunidad Xeneize</div>

        <div class="nav-title">Menú</div>
        <a href="welcome.blade.php" class="nav-link">🏠 Inicio</a>
        <a href="podio.php" class="nav-link">🏆 Podio de Jugadores</a>
        <a href="estadisticas.php" class="nav-link">📊 Estadísticas</a>
        <a href="foro.php" class="nav-link">💬 Foro y Debates</a>
        <a href="plantel.php" class="nav-link">👕 Plantel Actual</a>
        <a href="noticias.php" class="nav-link active">📰 Noticias</a>

        <div class="nav-title">Archivo Histórico</div>
        <a href="#" class="nav-link">📚 Sección de Historia <span class="badge-pronto">PRONTO</span></a>

        <div class="sidebar-footer">
            <div class="sidebar-socials">
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-pill tiktok">TikTok</a>
            </div>

            <!-- CAJA MERCADO PAGO -->
            <div class="mp-box">
                <div class="mp-title">💳 APOYÁ AL CANAL · MERCADO PAGO</div>
                <div class="mp-row">Titular: <b>Michael Novoa y Gonzalez</b></div>
                <div class="mp-alias">
                    <code id="mpAlias">michael.ok.mp</code>
                    <button class="mp-copy" type="button" onclick="copiarAlias()">Copiar</button>
                </div>
            </div>
        </div>
    </aside>

    <!-- ================= CONTENIDO ================= -->
    <main class="main">
        <div class="page-head">
            <div>
                <div class="page-title">📰 Noticias de <span class="em">Boca</span></div>
            </div>
            <div class="live-pill"><span class="live-dot"></span> EN VIVO · se actualiza solo</div>
        </div>
        <p class="page-sub">Lo último del mundo Xeneize, todo junto en un solo lugar. Última actualización: <b><?php echo $ultimaAct; ?></b> hs.</p>

        <?php if (count($noticias) > 0): ?>
        <div class="grid">
            <?php foreach ($noticias as $n): ?>
            <article class="card">
                <?php if ($n['fuente']): ?><div class="card-fuente"><?php echo htmlspecialchars($n['fuente']); ?></div><?php endif; ?>
                <div class="card-titulo"><?php echo htmlspecialchars($n['titulo']); ?></div>
                <div class="card-foot">
                    <span class="card-fecha">🕒 <?php echo htmlspecialchars(fechaLinda($n['fecha'])); ?></span>
                    <a class="card-link" href="<?php echo htmlspecialchars($n['link']); ?>" target="_blank" rel="noopener">Leer nota →</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="vacio">
            <p>⚽ No pudimos traer las noticias en este momento.</p>
            <p style="margin-top:8px;font-size:0.85rem;">Probá recargar la página en un ratito. En Render gratis el servidor a veces tarda en despertar.</p>
        </div>
        <?php endif; ?>

        <p class="foot-note">
            Las noticias se toman automáticamente de Google News (diarios como Olé, TyC, ESPN y otros). Cada titular te lleva a la nota original del medio.<br>
            El Punto de Encuentro · comunidad Xeneize · conducido por Michael Novoa.
        </p>
    </main>

    <script>
        function copiarAlias(){
            const alias = document.getElementById('mpAlias').textContent.trim();
            navigator.clipboard?.writeText(alias).then(() => {
                const b = document.querySelector('.mp-copy'); const o = b.textContent; b.textContent = '¡Copiado!';
                setTimeout(() => b.textContent = o, 1500);
            });
        }
    </script>
</body>
</html>