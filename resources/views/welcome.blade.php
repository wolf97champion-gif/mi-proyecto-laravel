<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Punto de Encuentro | Michael Novoa</title>
    <style>
        :root {
            --bg-base: #07090e;
            --bg-surface: #0f131c;
            --bg-surface-hover: #161b26;
            --bg-active: rgba(245, 158, 11, 0.12);
            --accent: #f59e0b; 
            --accent-glow: rgba(245, 158, 11, 0.15);
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border: rgba(255, 255, 255, 0.08);
            --shadow: 0 16px 40px -12px rgba(0, 0, 0, 0.7);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-base);
            color: var(--text-main);
            display: flex;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* --- BARRA LATERAL IZQUIERDA FIJA --- */
        .sidebar {
            width: 270px;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            padding: 20px 15px;
        }

        .sidebar-brand {
            font-weight: 800;
            font-size: 1.1rem;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 12px;
            margin-bottom: 25px;
        }

        .sidebar-brand span {
            color: var(--accent);
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex: 1;
            overflow-y: auto;
        }

        .menu-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 10px 12px 5px 12px;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link span.icon {
            font-size: 1.1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-link:hover {
            background: var(--bg-surface-hover);
            color: #fff;
        }

        .sidebar-link.active {
            background: var(--bg-active);
            color: var(--accent);
            font-weight: 600;
        }

        .sidebar-divider {
            height: 1px;
            background: var(--border);
            margin: 12px 0;
        }

        .sidebar-link.coming-soon {
            opacity: 0.6;
            cursor: default;
        }

        .sidebar-link.coming-soon:hover {
            background: transparent;
            color: var(--text-main);
        }

        .badge-soon {
            margin-left: auto;
            background: rgba(245, 158, 11, 0.15);
            color: var(--accent);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        .sidebar-footer {
            padding-top: 15px;
            border-top: 1px solid var(--border);
        }

        .sidebar-socials {
            display: flex;
            gap: 8px;
            margin-top: 8px;
        }

        .social-pill {
            flex: 1;
            padding: 8px;
            border-radius: 8px;
            font-size: 0.78rem;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            background: var(--bg-base);
            color: var(--text-main);
            border: 1px solid var(--border);
            transition: 0.2s;
        }

        .social-pill.youtube:hover { background: #cc0000; border-color: #cc0000; color: #fff; }
        .social-pill.tiktok:hover { background: #ff0050; border-color: #ff0050; color: #fff; }


        /* --- CONTENEDOR DERECHO (OCUPA TODO EL ANCHO DISPONIBLE) --- */
        .main-wrapper {
            margin-left: 270px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: calc(100% - 270px);
        }

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

        .top-header h2 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
        }

        .content-container {
            padding: 35px 40px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 100%;
            flex: 1;
        }

        /* Hero / Presentación */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            box-shadow: var(--shadow);
            width: 100%;
        }

        .creator-tag {
            display: inline-block;
            padding: 5px 16px;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            font-size: 0.75rem;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-section h1 {
            font-size: 2.1rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #fff;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 0.95rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Grilla flexible */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            gap: 25px;
            width: 100%;
        }

        @media (max-width: 1100px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .panel {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .panel-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .panel p {
            color: var(--text-muted);
            font-size: 0.88rem;
            line-height: 1.5;
            margin-bottom: 18px;
        }

        /* Reproductor de Video */
        .video-card-preview {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border);
            background: #000;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            margin-top: auto;
        }

        .video-card-preview img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            transition: transform 0.3s;
        }

        .video-card-preview:hover img {
            transform: scale(1.03);
            opacity: 1;
        }

        .play-overlay-btn {
            position: relative;
            z-index: 2;
            background: var(--accent);
            color: #000;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            font-weight: bold;
            box-shadow: 0 4px 20px rgba(0,0,0,0.8);
            transition: transform 0.2s, background 0.2s;
            padding-left: 3px;
        }

        .video-card-preview:hover .play-overlay-btn {
            transform: scale(1.12);
            background: #fbbf24;
        }

        .card-link-text {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            text-decoration: none;
            margin-top: 15px;
        }

        .card-link-text:hover { text-decoration: underline; }

        /* Estilo para rellenar el espacio de la comunidad con identidad bostera */
        .community-banner {
            background: linear-gradient(135deg, rgba(0, 50, 160, 0.25) 0%, rgba(245, 158, 11, 0.15) 100%);
            border: 1px solid rgba(245, 158, 11, 0.25);
            border-radius: 12px;
            padding: 25px 20px;
            text-align: center;
            margin: auto 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
        }

        .community-shield {
            font-size: 2.8rem;
            margin-bottom: 2px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.5));
        }

        .community-banner h3 {
            color: #fff;
            font-size: 1.15rem;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .community-banner p {
            color: var(--text-main);
            font-size: 0.9rem;
            margin-bottom: 0 !important;
        }

        .btn-main {
            background: var(--accent);
            color: #000;
            padding: 14px 20px;
            border-radius: 10px;
            text-align: center;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
            transition: 0.2s;
            margin-top: auto;
        }
        .btn-main:hover { background: #fbbf24; transform: translateY(-2px); }

        /* --- APOYO AL CANAL (MERCADO PAGO) --- */
        .support-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #101a2e 100%);
            border: 1px solid rgba(0, 156, 222, 0.35);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow);
            width: 100%;
        }

        .support-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 6px;
        }

        .support-header .mp-logo {
            width: 42px;
            height: 42px;
            border-radius: 10px;
            background: #009ee3;
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .support-header h2 {
            font-size: 1.25rem;
            font-weight: 800;
            color: #fff;
        }

        .support-header span {
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .support-desc {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.5;
            margin: 12px 0 22px;
            max-width: 640px;
        }

        .support-body {
            display: flex;
            gap: 25px;
            align-items: stretch;
        }

        .support-data {
            flex: 1 1 auto;
            min-width: 0;
        }

        .support-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 15px;
        }

        /* QR de pago */
        .support-qr {
            flex: 0 0 220px;
            background: #fff;
            border-radius: 14px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 10px;
            box-shadow: 0 8px 25px -10px rgba(0,0,0,0.6);
        }

        .support-qr img {
            width: 100%;
            max-width: 180px;
            height: auto;
            display: block;
        }

        .support-qr .qr-caption {
            font-size: 0.78rem;
            font-weight: 700;
            color: #07090e;
            text-align: center;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        @media (max-width: 900px) {
            .support-body { flex-direction: column; }
            .support-qr { flex: 1 1 auto; align-self: center; max-width: 260px; }
        }

        .pago-item {
            background: var(--bg-base);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 16px 18px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .pago-item .pago-label {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            font-weight: 700;
        }

        .pago-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }

        .pago-value {
            font-size: 0.98rem;
            font-weight: 700;
            color: #fff;
            word-break: break-all;
        }

        .copy-btn {
            flex-shrink: 0;
            background: rgba(0, 156, 222, 0.15);
            border: 1px solid rgba(0, 156, 222, 0.4);
            color: #4dc4ff;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 7px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            white-space: nowrap;
        }

        .copy-btn:hover {
            background: #009ee3;
            color: #fff;
            border-color: #009ee3;
        }

        .copy-btn.copied {
            background: #16a34a;
            border-color: #16a34a;
            color: #fff;
        }

        .pago-item.holder {
            grid-column: 1 / -1;
            flex-direction: row;
            align-items: center;
            justify-content: flex-start;
            gap: 12px;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 25px 40px;
            color: var(--text-muted);
            font-size: 0.82rem;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }

        /* Responsive para celulares */
        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .pago-item.holder { flex-direction: column; align-items: flex-start; }
        }
    </style>
</head>
<body>

    <!-- BARRA LATERAL IZQUIERDA FIJA -->
    <aside class="sidebar">
        <a href="#" class="sidebar-brand">
            ⚡ <span>PUNTO DE ENCUENTRO</span>
        </a>

        <div class="sidebar-menu">
            <div class="menu-label">Menú Principal</div>
            
            <a href="index.php" class="sidebar-link active">
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

            <div class="sidebar-divider"></div>

            <div class="menu-label">Archivo Histórico</div>

            <a href="#" class="sidebar-link coming-soon">
                <span class="icon">📜</span> Sección de Historia
                <span class="badge-soon">Pronto</span>
            </a>
        </div>

        <div class="sidebar-footer">
            <div class="menu-label" style="padding-left:0; margin-bottom: 2px;">Redes Oficiales</div>
            <div class="sidebar-socials">
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" rel="noopener" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" rel="noopener" class="social-pill tiktok">TikTok</a>
            </div>
        </div>
    </aside>

    <!-- CONTENEDOR DERECHO QUE OCUPA TODO EL ANCHO -->
    <div class="main-wrapper">
        
        <header class="top-header">
            <h2>Panel de Control</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <!-- Presentación -->
            <div class="hero-section">
                <div class="creator-tag">Sitio Oficial • Transmisiones & Comunidad</div>
                <h1>El Punto de <span>Encuentro</span></h1>
                <p>El espacio definitivo de análisis, debates post-partido y toda la pasión del mundo de Boca Juniors conducido por Michael Novoa.</p>
            </div>

            <!-- Grilla expansiva -->
            <div class="dashboard-grid">
                
                <!-- Panel de Video -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Reviví el programa más reciente directamente haciendo clic en el reproductor.</p>
                    
                    <a href="https://www.youtube.com/watch?v=SGnprjuOyWM" target="_blank" rel="noopener" class="video-card-preview">
                        <img src="https://img.youtube.com/vi/SGnprjuOyWM/maxresdefault.jpg" alt="Último video del canal">
                        <div class="play-overlay-btn">▶</div>
                    </a>

                    <div>
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" rel="noopener" class="card-link-text">Ver más transmisiones en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Panel Comunidad -->
                <div class="panel">
                    <div class="panel-title">💬 Comunidad Activa</div>
                    <p>Sumate al grupo oficial de comunicación para enterarte antes de las previas, horarios de stream y debates abiertos.</p>
                    
                    <!-- Elemento decorativo para rellenar el espacio vacío -->
                    <div class="community-banner">
                        <div class="community-shield">💙💛💙</div>
                        <h3>LA MITAD + 1</h3>
                        <p>¡Viví la pasión de Boca con toda la comunidad!</p>
                    </div>

                    <a href="https://whatsapp.com/channel/0029Vb7Aq78JJhzXb63HwD09" target="_blank" rel="noopener" class="btn-main">Unirse al Grupo de WhatsApp &rarr;</a>
                </div>

            </div>

            <!-- APOYO AL CANAL / MERCADO PAGO -->
            <section class="support-section">
                <div class="support-header">
                    <div class="mp-logo">💳</div>
                    <div>
                        <h2>Apoyá al Canal</h2>
                        <span>Mercado Pago • Tu aporte hace crecer la comunidad</span>
                    </div>
                </div>
                <p class="support-desc">Si te gusta el contenido y querés colaborar para seguir mejorando las transmisiones, podés hacerlo con tu billetera de Mercado Pago usando el alias o el CVU. ¡Muchas gracias por el aguante!</p>

                <div class="support-body">
                    <div class="support-data">
                        <div class="support-grid">
                            <div class="pago-item">
                                <span class="pago-label">Alias</span>
                                <div class="pago-row">
                                    <span class="pago-value" id="aliasValue">michael.ok.mp</span>
                                    <button type="button" class="copy-btn" data-copy-target="aliasValue">Copiar</button>
                                </div>
                            </div>

                            <div class="pago-item">
                                <span class="pago-label">CVU</span>
                                <div class="pago-row">
                                    <span class="pago-value" id="cvuValue">0000003100069487314033</span>
                                    <button type="button" class="copy-btn" data-copy-target="cvuValue">Copiar</button>
                                </div>
                            </div>

                            <div class="pago-item holder">
                                <span class="pago-label" style="margin-bottom:0;">Titular</span>
                                <span class="pago-value">Michael Novoa y Gonzalez</span>
                            </div>
                        </div>
                    </div>

                    <div class="support-qr">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAAD6CAIAAAAHjs1qAAAD+ElEQVR4nO3dMa7VMBRAQT6iQDTsf5k0iC60VC5I7neSM9O/pyg5cnNl++M4ji/Q8HX3A8DnkTshcidE7oTInRC5EyJ3QuROiNwJkTshcidE7oTInRC5EyJ3QuROiNwJkTshcifk25kff//x86rnuIk/v3/992/Xb+PMP5/hG/3L6k6I3AmROyFyJ0TuhMidELkTIndC5E7Iqanq2q454tquKeM9Z661b2R1J0TuhMidELkTIndC5E6I3AmROyFyJ2Rwqro2NzmbmxTOTUbvOXN94jdas7oTIndC5E6I3AmROyFyJ0TuhMidELkTsm2q+j5zM8h7zlyfyOpOiNwJkTshcidE7oTInRC5EyJ3QuROiKnqZdbTzTOT0ffdjbqL1Z0QuRMid0LkTojcCZE7IXInRO6EyJ2QbVPV9+2wnJubunX1KlZ3QuROiNwJkTshcidE7oTInRC5EyJ3QganqrUdlrv2qs7d5/o+VndC5E6I3AmROyFyJ0TuhMidELkTIndCPo7j2P0Mj3FmBvm+fZ9PZHUnRO6EyJ0QuRMid0LkTojcCZE7IXIn5NRU9X13he6afdZ2o+56z1Z3QuROiNwJkTshcidE7oTInRC5EyJ3Qgb3qs7t7Nw1g9z1z7XJ6NxXsLoTIndC5E6I3AmROyFyJ0TuhMidELkTMniv6q4dlrumubvMPfOutzE3r7W6EyJ3QuROiNwJkTshcidE7oTInRC5EzI4VV3btXdzbmK3awb5vl2wc6zuhMidELkTIndC5E6I3AmROyFyJ0TuhJyaqj7xvNwn7t1cmzstedf3dQIwXEDuhMidELkTIndC5E6I3AmROyFyJ2TwXtX3eeLcdM4Tp7lWd0LkTojcCZE7IXInRO6EyJ0QuRMid0JOTVXfd37s3PnA93xX99xP7F5VuIDcCZE7IXInRO6EyJ0QuRMid0LkTsjgvapzs7Ezzkw3n3h68K6vcM8pstWdELkTIndC5E6I3AmROyFyJ0TuhMidkMGp6tr75ohzdu0oXXOvKtya3AmROyFyJ0TuhMidELkTIndC5E7Itqnq+9zzzNu1ud23c789w+pOiNwJkTshcidE7oTInRC5EyJ3QuROiKnqZXadLXzGrntkTVVhnNwJkTshcidE7oTInRC5EyJ3QuROyLap6hPP6Z27G/WJb+OeN6euWd0JkTshcidE7oTInRC5EyJ3QuROiNwJGZyqPnHqtjY3N53b2Tn3zPe87XXN6k6I3AmROyFyJ0TuhMidELkTIndC5E7Ix3Ecu58BPonVnRC5EyJ3QuROiNwJkTshcidE7oTInRC5EyJ3QuROiNwJkTshcidE7oTInRC5EyJ3Qv4C01b+GsoFyw4AAAAASUVORK5CYII=" alt="Codigo QR para donar por Mercado Pago (alias michael.ok.mp)">
                        <div class="qr-caption">📲 Escaneá para donar</div>
                    </div>
                </div>
            </section>

        </main>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        // Copiar alias / CVU al portapapeles (sin handlers en línea).
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.copy-btn').forEach((btn) => {
                btn.addEventListener('click', async () => {
                    const target = document.getElementById(btn.dataset.copyTarget);
                    if (!target) return;
                    const texto = target.textContent.trim();

                    try {
                        await navigator.clipboard.writeText(texto);
                    } catch (e) {
                        // Respaldo para navegadores sin API de portapapeles.
                        const tmp = document.createElement('textarea');
                        tmp.value = texto;
                        document.body.appendChild(tmp);
                        tmp.select();
                        document.execCommand('copy');
                        document.body.removeChild(tmp);
                    }

                    const original = btn.textContent;
                    btn.textContent = '¡Copiado!';
                    btn.classList.add('copied');
                    setTimeout(() => {
                        btn.textContent = original;
                        btn.classList.remove('copied');
                    }, 1800);
                });
            });
        });
    </script>
</body>
</html>
