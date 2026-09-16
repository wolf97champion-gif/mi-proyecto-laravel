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
        }

        /* Navbar Superior Fijo */
        .top-nav {
            position: sticky;
            top: 0;
            background: rgba(7, 9, 14, 0.92);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid var(--border);
            padding: 15px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.15rem;
            color: #fff;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-brand span {
            color: var(--accent);
        }

        .nav-socials {
            display: flex;
            gap: 12px;
        }

        .social-btn {
            padding: 7px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            background: var(--bg-surface);
            color: var(--text-main);
            border: 1px solid var(--border);
            transition: all 0.2s;
        }

        .social-btn.youtube:hover {
            background: #cc0000;
            border-color: #cc0000;
            color: #fff;
        }

        .social-btn.tiktok:hover {
            background: #ff0050;
            border-color: #ff0050;
            color: #fff;
        }

        /* Contenedor Principal de la Página */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 35px 20px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Hero / Presentación Central */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px 30px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .creator-tag {
            display: inline-block;
            padding: 6px 16px;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            font-size: 0.78rem;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-section h1 {
            font-size: 2.3rem;
            font-weight: 800;
            margin-bottom: 10px;
            color: #fff;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 1rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Grilla General: Contenido Principal a la izquierda, Navbar Parado (Sidebar) a la derecha */
        .content-layout {
            display: grid;
            grid-template-columns: 1.4fr 0.9fr;
            gap: 25px;
            align-items: start;
        }

        @media (max-width: 950px) {
            .content-layout {
                grid-template-columns: 1fr;
            }
        }

        .column-main {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        /* Panel Común */
        .panel {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: border-color 0.2s;
        }

        .panel-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .panel p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* Tarjeta de Video Optimizada */
        .video-card-preview {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border);
            background: linear-gradient(135deg, #111827, #0b0f17);
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }

        .video-card-preview img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            transition: transform 0.3s, opacity 0.3s;
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
            width: 65px;
            height: 65px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: 0 4px 20px rgba(0,0,0,0.8);
            transition: transform 0.2s, background 0.2s;
            padding-left: 4px;
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
        }

        .card-link-text:hover {
            text-decoration: underline;
        }

        .btn-main {
            background: var(--accent);
            color: #000;
            padding: 12px 20px;
            border-radius: 10px;
            text-align: center;
            justify-content: center;
            font-weight: 700;
            width: 100%;
            text-decoration: none;
            display: inline-flex;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
            transition: transform 0.2s, background 0.2s;
        }

        .btn-main:hover {
            background: #fbbf24;
            transform: translateY(-2px);
        }

        /* --- NAVBAR PARADO (SIDEBAR LATERAL) --- */
        .sidebar-nav {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 22px;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: sticky;
            top: 95px;
        }

        .sidebar-header {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 4px;
        }

        .sidebar-item {
            background: var(--bg-base);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 14px 16px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .sidebar-item:hover {
            border-color: var(--accent);
            background: var(--bg-surface-hover);
            transform: translateX(3px);
        }

        .sidebar-item-content h4 {
            color: #fff;
            font-size: 0.95rem;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .sidebar-item-content span {
            color: var(--text-muted);
            font-size: 0.78rem;
        }

        .sidebar-arrow {
            color: var(--accent);
            font-weight: bold;
            font-size: 1.1rem;
        }

        /* Separador de Espacio en el Navbar Parado */
        .sidebar-divider {
            height: 1px;
            background: var(--border);
            margin: 8px 0;
        }

        /* Estilo especial para la Sección Historia (Próximamente) */
        .sidebar-item.coming-soon {
            opacity: 0.75;
            border-style: dashed;
            background: rgba(255, 255, 255, 0.02);
            cursor: default;
        }

        .sidebar-item.coming-soon:hover {
            transform: none;
            border-color: var(--border);
            background: rgba(255, 255, 255, 0.02);
        }

        .badge-soon {
            background: rgba(245, 158, 11, 0.12);
            color: var(--accent);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 3px 8px;
            border-radius: 6px;
            text-transform: uppercase;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 35px 20px;
            color: var(--text-muted);
            font-size: 0.82rem;
            border-top: 1px solid var(--border);
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar Superior -->
    <nav class="top-nav">
        <a href="#" class="nav-brand">⚡ EL PUNTO DE <span>ENCUENTRO</span></a>
        <div class="nav-socials">
            <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-btn youtube">YouTube</a>
            <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-btn tiktok">TikTok</a>
        </div>
    </nav>

    <!-- Contenedor Principal -->
    <main class="main-container">

        <!-- Hero / Presentación -->
        <header class="hero-section">
            <div class="creator-tag">Sitio Oficial • Creado por Michael Novoa</div>
            <h1>El Punto de <span>Encuentro</span></h1>
            <p>El espacio definitivo de análisis, debates post-partido y toda la pasión del mundo de Boca Juniors. Conducido y producido por Michael Novoa para vivir la comunidad de manera única.</p>
        </header>

        <!-- Grilla Principal (Izquierda: Video / Comunidad | Derecha: Navbar Parado) -->
        <div class="content-layout">
            
            <!-- Columna Izquierda: Contenido Central -->
            <div class="column-main">
                
                <!-- Panel del Último Video -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Reviví el programa más reciente directamente haciendo clic en el reproductor.</p>
                    
                    <a href="https://www.youtube.com/watch?v=It-xG6qLVmM" target="_blank" class="video-card-preview">
                        <img src="https://img.youtube.com/vi/It-xG6qLVmM/maxresdefault.jpg" alt="Último video del canal">
                        <div class="play-overlay-btn">▶</div>
                    </a>

                    <div style="margin-top: 15px;">
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="card-link-text">Ver más transmisiones en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Panel Comunidad y Redes -->
                <div class="panel">
                    <div class="panel-title">💬 Comunidad & Redes</div>
                    <p>Sumate al grupo oficial de comunicación y seguinos en TikTok para no perderte ningún clip exclusivo.</p>
                    <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                        <a href="#" class="btn-main" style="flex: 1; min-width: 180px;">Unirme al Grupo &rarr;</a>
                        <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-btn tiktok" style="padding: 12px 20px; font-size: 0.9rem; display: inline-flex; align-items: center; justify-content: center;">Ir a TikTok</a>
                    </div>
                </div>

            </div>

            <!-- Columna Derecha: Navbar Parado (Sidebar con Secciones) -->
            <aside class="sidebar-nav">
                <div class="sidebar-header">
                    <span>⚡</span> Secciones del Canal
                </div>

                <a href="podio.php" class="sidebar-item">
                    <div class="sidebar-item-content">
                        <h4>🏆 Podio de Jugadores</h4>
                        <span>Votá y puntuá a los mejores</span>
                    </div>
                    <span class="sidebar-arrow">&rsaquo;</span>
                </a>

                <a href="estadisticas.php" class="sidebar-item">
                    <div class="sidebar-item-content">
                        <h4>📊 Estadísticas</h4>
                        <span>Rendimiento y métricas</span>
                    </div>
                    <span class="sidebar-arrow">&rsaquo;</span>
                </a>

                <a href="posiciones.php" class="sidebar-item">
                    <div class="sidebar-item-content">
                        <h4>📌 Posiciones Actuales</h4>
                        <span>Tabla de la liga y copa</span>
                    </div>
                    <span class="sidebar-arrow">&rsaquo;</span>
                </a>

                <a href="plantel.php" class="sidebar-item">
                    <div class="sidebar-item-content">
                        <h4>👥 Plantel Actual</h4>
                        <span>Jugadores y cuerpo técnico</span>
                    </div>
                    <span class="sidebar-arrow">&rsaquo;</span>
                </a>

                <!-- Espacio / Separador en el medio -->
                <div class="sidebar-divider"></div>

                <!-- Sección Historia (Próximamente) -->
                <div class="sidebar-item coming-soon">
                    <div class="sidebar-item-content">
                        <h4>📜 Sección de Historia</h4>
                        <span>Orígenes y archivos del club</span>
                    </div>
                    <span class="badge-soon">Pronto</span>
                </div>
            </aside>

        </div>

    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados. Creado por Michael Novoa.</p>
    </footer>

</body>
</html>