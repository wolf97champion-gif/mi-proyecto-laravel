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
            overflow-x: hidden;
            display: flex;
            min-height: 100vh;
        }

        /* --- BARRA LATERAL IZQUIERDA FIJA --- */
        .sidebar {
            width: 260px;
            background: var(--bg-surface);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 1000;
            padding: 20px 14px;
        }

        .sidebar-brand {
            font-weight: 800;
            font-size: 1.05rem;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 10px;
            margin-bottom: 20px;
        }

        .sidebar-brand span {
            color: var(--accent);
        }

        .sidebar-menu {
            display: flex;
            flex-direction: column;
            gap: 5px;
            flex: 1;
            overflow-y: auto;
        }

        .menu-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: var(--text-muted);
            padding: 8px 10px 4px 10px;
            font-weight: 700;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 12px;
            border-radius: 10px;
            text-decoration: none;
            color: var(--text-main);
            font-size: 0.88rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .sidebar-link span.icon {
            font-size: 1.05rem;
            width: 18px;
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
            margin: 10px 0;
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
            font-size: 0.65rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        .sidebar-footer {
            padding-top: 12px;
            border-top: 1px solid var(--border);
        }

        .sidebar-socials {
            display: flex;
            gap: 6px;
            margin-top: 6px;
        }

        .social-pill {
            flex: 1;
            padding: 7px;
            border-radius: 7px;
            font-size: 0.75rem;
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


        /* --- CONTENEDOR DERECHO CORREGIDO Y DISTRIBUIDO --- */
        .main-wrapper {
            margin-left: 260px;
            flex: 1;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .top-header {
            padding: 16px 35px;
            border-bottom: 1px solid var(--border);
            background: rgba(7, 9, 14, 0.8);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .top-header h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
        }

        .content-container {
            max-width: 1150px; /* Ancho controlado para evitar estiramientos grotescos */
            padding: 30px 35px;
            display: flex;
            flex-direction: column;
            gap: 24px;
            width: 100%;
        }

        /* Hero / Presentación compacta */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 30px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .creator-tag {
            display: inline-block;
            padding: 5px 14px;
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
            font-size: 1.9rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #fff;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 0.92rem;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.45;
        }

        /* Grilla interna para organizar el contenido en dos columnas equilibradas */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1.3fr 1fr;
            gap: 24px;
        }

        @media (max-width: 1000px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
        }

        .panel {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
        }

        .panel-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .panel p {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.45;
            margin-bottom: 16px;
        }

        /* Video de YouTube optimizado en tarjeta */
        .video-card-preview {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 10px;
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
            width: 55px;
            height: 55px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: bold;
            box-shadow: 0 4px 20px rgba(0,0,0,0.8);
            transition: transform 0.2s, background 0.2s;
            padding-left: 3px;
        }

        .video-card-preview:hover .play-overlay-btn {
            transform: scale(1.1);
            background: #fbbf24;
        }

        .card-link-text {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.82rem;
            display: inline-flex;
            align-items: center;
            gap: 4px;
            text-decoration: none;
            margin-top: 12px;
        }

        .card-link-text:hover { text-decoration: underline; }

        .btn-main {
            background: var(--accent);
            color: #000;
            padding: 11px 18px;
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

        /* Footer */
        .footer {
            text-align: center;
            padding: 25px;
            color: var(--text-muted);
            font-size: 0.8rem;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }

        /* Responsive para celulares */
        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; }
        }
    </style>
</head>
<body>

    <!-- BARRA LATERAL IZQUIERDA -->
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

            <a href="posiciones.php" class="sidebar-link">
                <span class="icon">📌</span> Posiciones Actuales
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
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-pill tiktok">TikTok</a>
            </div>
        </div>
    </aside>

    <!-- CONTENEDOR DERECHO ORDENADO -->
    <div class="main-wrapper">
        
        <header class="top-header">
            <h2>Panel de Control</h2>
            <span style="font-size: 0.82rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <!-- Presentación (Ancho equilibrado) -->
            <div class="hero-section">
                <div class="creator-tag">Sitio Oficial • Transmisiones & Comunidad</div>
                <h1>El Punto de <span>Encuentro</span></h1>
                <p>El espacio definitivo de análisis, debates post-partido y toda la pasión del mundo de Boca Juniors conducido por Michael Novoa.</p>
            </div>

            <!-- Grilla equilibrada para que el video y la comunidad no se estiren feo -->
            <div class="dashboard-grid">
                
                <!-- Panel de Video -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Reviví el programa más reciente directamente haciendo clic en el reproductor.</p>
                    
                    <a href="https://www.youtube.com/watch?v=It-xG6qLVmM" target="_blank" class="video-card-preview">
                        <img src="https://img.youtube.com/vi/It-xG6qLVmM/maxresdefault.jpg" alt="Último video del canal">
                        <div class="play-overlay-btn">▶</div>
                    </a>

                    <div>
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="card-link-text">Ver más transmisiones en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Panel Comunidad -->
                <div class="panel">
                    <div class="panel-title">💬 Comunidad Activa</div>
                    <p>Sumate al grupo oficial de comunicación para enterarte antes de las previas, horarios de stream y debates abiertos.</p>
                    
                    <a href="#" class="btn-main">Unirse al Grupo de WhatsApp &rarr;</a>
                </div>

            </div>

        </main>

        <!-- Footer -->
        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

</body>
</html>