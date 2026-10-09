<?php
/*
 |------------------------------------------------------------------
 | NOTICIAS DE BOCA JUNIORS - El Punto de Encuentro
 |------------------------------------------------------------------
 */
$FEED_URL  = 'https://news.google.com/rss/search?q=%22Boca+Juniors%22&hl=es-419&gl=AR&ceid=AR:es-419';
$CACHE_MIN = 15;
$MAX_NOTICIAS = 24;
$cacheDir  = __DIR__ . '/../storage/app/datos';
$cacheFile = $cacheDir . '/noticias_boca.xml';
if (!is_dir($cacheDir)) { @mkdir($cacheDir, 0775, true); }

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
        $xmlData = @file_get_contents($cacheFile);
    }
}

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
    <meta http-equiv="refresh" content="900">
    <style>
        :root {
            --bg-base: #07090e;
            --bg-surface: #0f131c;
            --bg-surface-hover: #161b26;
            --bg-active: rgba(245, 158, 11, 0.12);
            --accent: #f59e0b;
            --accent2: #009ee3;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border: rgba(255, 255, 255, 0.08);
            --bg-card: #131824;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        body { background-color: var(--bg-base); color: var(--text-main); display: flex; min-height: 100vh; overflow-x: hidden; }
        a { text-decoration: none; color: inherit; }

        /* --- SIDEBAR MEJORADA --- */
        .sidebar { 
            width: 270px; 
            background: var(--bg-surface); 
            border-right: 1px solid var(--border); 
            display: flex; 
            flex-direction: column; 
            position: fixed; 
            top: 0; left: 0; 
            height: 100vh; 
            z-index: 1000; 
            padding: 24px 18px; 
        }
        /* --- TÍTULO EXACTO COMO LA IMAGEN --- */
        .sidebar-brand { 
            font-weight: 900; 
            font-size: 1.25rem; 
            color: #fff; 
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
            gap: 6px 8px;
            padding: 6px 12px 14px 12px; 
            margin-bottom: 28px; 
            border-bottom: 1px solid var(--border);
            line-height: 1.1;
            letter-spacing: 0.3px;
        }
        .sidebar-brand .icon-flash {
            grid-row: 1 / 3;
            font-size: 1.4rem;
            align-self: center;
        }
        .sidebar-brand .line1 {
            grid-column: 2;
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .sidebar-brand .de {
            font-size: 0.9rem;
            font-weight: 700;
            color: #e5e7eb;
        }
        .sidebar-brand .encuentro {
            color: var(--accent);
            font-size: 1.25rem;
            font-weight: 900;
            text-transform: uppercase;
        }
        .sidebar-menu { display: flex; flex-direction: column; gap: 4px; flex: 1; overflow-y: auto; }
        .menu-label { 
            font-size: 0.7rem; 
            text-transform: uppercase; 
            letter-spacing: 1px; 
            color: var(--text-muted); 
            padding: 10px 12px 5px 12px; 
            font-weight: 700; 
            margin-top: 4px;
        }
        .sidebar-link { 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            padding: 12px 14px; 
            border-radius: 10px; 
            color: var(--text-main); 
            font-size: 0.9rem; 
            font-weight: 500; 
            transition: all 0.2s ease; 
        }
        .sidebar-link span.icon { font-size: 1rem; width: 20px; text-align: center; }
        .sidebar-link:hover { background: var(--bg-surface-hover); }
        .sidebar-link.active { background: var(--bg-active); color: var(--accent); font-weight: 600; }
        .sidebar-divider { height: 1px; background: transparent; margin: 4px 0; }
        .badge-soon { 
            margin-left: auto; 
            background: var(--accent); 
            color: #000; 
            font-size: 0.65rem; 
            font-weight: 800; 
            padding: 3px 8px; 
            border-radius: 6px; 
            text-transform: uppercase; 
        }
        .sidebar-footer { margin-top: auto; padding-top: 15px; }
        .sidebar-socials { display: flex; gap: 10px; margin-top: 10px; }
        .social-pill { 
            flex: 1; 
            padding: 10px; 
            border-radius: 8px; 
            font-size: 0.8rem; 
            font-weight: 600; 
            text-align: center; 
            background: var(--bg-base); 
            color: var(--text-main); 
            border: 1px solid var(--border); 
        }
        .social-pill.youtube:hover { background: #cc0000; border-color: #cc0000; color: #fff; }
        .social-pill.tiktok:hover { background: #ff0050; border-color: #ff0050; color: #fff; }
        
        .mp-box { 
            margin-top: 16px; 
            background: linear-gradient(135deg, rgba(0,158,227,0.15), rgba(245,158,11,0.08)); 
            border: 1px solid rgba(0,158,227,0.3); 
            border-radius: 10px; 
            padding: 12px; 
        }
        .mp-box .mp-title { 
            font-size: 0.75rem; 
            font-weight: 800; 
            color: #35c2ff; 
            margin-bottom: 6px; 
        }
        .mp-row { font-size: 0.72rem; color: var(--text-muted); margin-bottom: 4px; }
        .mp-alias { 
            display: flex; 
            align-items: center; 
            justify-content: space-between; 
            gap: 8px; 
            background: var(--bg-base); 
            border-radius: 6px; 
            padding: 8px 10px; 
        }
        .mp-alias code { color: var(--accent); font-weight: 800; font-size: 0.85rem; }
        .mp-copy { 
            background: var(--accent); 
            color: #000; 
            border: none; 
            border-radius: 6px; 
            padding: 5px 10px; 
            font-weight: 800; 
            cursor: pointer; 
            font-size: 0.75rem;
        }
        
        .main-wrapper { margin-left: 270px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; width: calc(100% - 270px); }
        .top-header { 
            padding: 20px 40px; 
            border-bottom: 1px solid var(--border); 
            background: rgba(7, 9, 14, 0.85); 
            backdrop-filter: blur(10px); 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            position: sticky; 
            top: 0; 
            z-index: 999; 
        }
        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }
        .content-container { padding: 35px 40px; display: flex; flex-direction: column; gap: 25px; width: 100%; flex: 1; }
        
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
        .card:hover { transform: translateY(-3px); border-color: rgba(245,158,11,0.4); }
        .card-fuente { font-size: 0.7rem; font-weight: 800; color: var(--accent2); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }
        .card-titulo { font-size: 1.02rem; font-weight: 700; line-height: 1.4; color: var(--text-main); margin-bottom: 14px; }
        .card-foot { margin-top: auto; display: flex; align-items: center; justify-content: space-between; }
        .card-fecha { font-size: 0.75rem; color: var(--text-muted); }
        .card-link { font-size: 0.78rem; font-weight: 800; color: var(--accent); }
        .card-link:hover { text-decoration: underline; }
        
        .vacio { background: var(--bg-card); border: 1px dashed var(--border); border-radius: 14px; padding: 40px; text-align: center; color: var(--text-muted); }
        .foot-note { margin-top: 26px; font-size: 0.75rem; color: var(--text-muted); line-height: 1.6; }
        
        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; padding: 18px; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .top-header, .content-container { padding-left: 20px; padding-right: 20px; }
            .sidebar-brand { grid-template-columns: auto 1fr; font-size: 1.1rem; }
            .sidebar-brand .encuentro { font-size: 1.1rem; }
        }
    </style>
</head>
<body>
    <!-- ================= NAVBAR CON TÍTULO PERFECTO ================= -->
<aside class="sidebar">
    <a href="index.php" class="sidebar-brand">
        <span class="icon-flash">⚡</span>
        <span class="line1">
            <strong>PUNTO DE</strong>
        </span>
        <span class="encuentro">ENCUENTRO</span>
    </a>

    <nav class="sidebar-menu">
        <div class="menu-label">Menú Principal</div>
        <a href="index.php" class="sidebar-link">
            <span class="icon">🏠</span> Inicio
        </a>
        <a href="podio.php" class="sidebar-link">
            <span class="icon">🏆</span> Podio de Jugadores
        </a>
        <a href="estadisticas.php" class="sidebar-link">
            <span class="icon">📊</span> Estadísticas
        </a>
        <a href="foro.php" class="sidebar-link">
            <span class="icon">💬</span> Foro y Debates
        </a>
        <a href="plantel.php" class="sidebar-link">
            <span class="icon">👥</span> Plantel Actual
        </a>
        <a href="noticias.php" class="sidebar-link active">
            <span class="icon">📰</span> Noticias
        </a>

        <div class="sidebar-divider"></div>

        <a href="historia.php" class="sidebar-link">
        <span class="icon">📜</span> Sección de Historia
        </a>
        </div>

        <div class="sidebar-footer">
            <div class="menu-label">Redes Oficiales</div>
            <div class="sidebar-socials">
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-pill tiktok">TikTok</a>
            </div>

            <div class="mp-box">
                <div class="mp-title">💙 APOYÁ AL CANAL - MERCADO PAGO</div>
                <div class="mp-row">Titular: Michael Novoa y Gonzalez</div>
                <div class="mp-alias" id="mpAlias">
                    <code>michael.ok.mp</code>
                    <button class="mp-copy" onclick="copiarAlias()">Copiar</button>
                </div>
            </div>
        </div>
    </nav>
</aside>

    <!-- ================= CONTENIDO ================= -->
    <div class="main-wrapper">
        <div class="top-header">
            <h2>📰 Noticias de Boca</h2>
            <div class="live-pill"><span class="live-dot"></span> EN VIVO · se actualiza solo</div>
        </div>
        <div class="content-container">
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
        </div>
    </div>

    <script>
        function copiarAlias(){
            const alias = document.getElementById('mpAlias').querySelector('code').textContent.trim();
            navigator.clipboard?.writeText(alias).then(() => {
                const b = document.querySelector('.mp-copy'); 
                const o = b.textContent; 
                b.textContent = '¡Copiado!';
                setTimeout(() => b.textContent = o, 1500);
            });
        }
    </script>
</body>
</html>