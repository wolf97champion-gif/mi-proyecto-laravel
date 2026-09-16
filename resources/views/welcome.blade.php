<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Punto de Encuentro | Home 2026</title>
    <style>
        :root {
            --bg-base: #07090e;
            --bg-surface: #0f131c;
            --bg-surface-hover: #161b26;
            --accent: #f59e0b; 
            --accent-glow: rgba(245, 158, 11, 0.12);
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --border: rgba(255, 255, 255, 0.07);
            --shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
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

        /* 1. Navbar Superior Fijo de Marca */
        .top-nav {
            position: sticky;
            top: 0;
            background: rgba(7, 9, 14, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
        }

        .nav-brand {
            font-weight: 800;
            font-size: 1.1rem;
            color: #fff;
            letter-spacing: -0.5px;
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
            padding: 6px 14px;
            border-radius: 6px;
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

        /* 2. Contenedor Principal Organizado */
        .main-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            gap: 40px;
        }

        /* Hero Integrado */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121824 100%);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 50px 40px;
            text-align: center;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 25px auto;
            line-height: 1.5;
        }

        /* 3. Secciones en Grid de Contenido Completo */
        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .column-main {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .column-side {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .panel {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 25px;
            box-shadow: var(--shadow);
            transition: border-color 0.2s;
        }

        .panel:hover {
            border-color: rgba(245, 158, 11, 0.3);
        }

        .panel-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .panel p {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        /* Estilo para el reproductor o video destacado */
        .video-box {
            background: #000;
            border-radius: 10px;
            aspect-ratio: 16/9;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .video-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.7;
        }

        .play-button {
            position: absolute;
            background: var(--accent);
            color: #000;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .action-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .action-link:hover {
            text-decoration: underline;
        }

        /* 4. Footer Limpio */
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
            font-size: 0.85rem;
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

    <!-- Contenedor General -->
    <div class="main-container">

        <!-- Hero Centralizado -->
        <header class="hero-section">
            <h1>El espacio definitivo de <span>análisis y debate</span></h1>
            <p>Toda la previa, reacciones post-partido, estadísticas en vivo y la comunidad más activa reunidas en una sola plataforma central.</p>
        </header>

        <!-- Grid de Contenido Estructurado -->
        <div class="content-grid">
            
            <!-- Columna Izquierda (Principal) -->
            <div class="column-main">
                <!-- Video Destacado -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Análisis Post Partido - Previa de Sudamericana y debate abierto sobre el rendimiento del equipo.</p>
                    <div class="video-box">
                        <!-- Aquí puedes incrustar tu iframe de YouTube o miniatura -->
                        <div class="play-button">▶</div>
                    </div>
                    <div style="margin-top: 15px;">
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="action-link">Ver transmisión completa en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Secciones Interactivas -->
                <div class="panel">
                    <div class="panel-title">⚡ Herramientas del Canal</div>
                    <p>Participá activamente de las dinámicas del stream y consultá los datos clave de la temporada.</p>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <div style="background: var(--bg-base); padding: 15px; border-radius: 10px; border: 1px solid var(--border);">
                            <h4 style="color: #fff; margin-bottom: 5px; font-size: 1rem;">Podio del Partido</h4>
                            <p style="font-size: 0.85rem; margin-bottom: 10px;">Votá a los mejores jugadores.</p>
                            <a href="#" class="action-link" style="font-size: 0.85rem;">Votar ahora &rarr;</a>
                        </div>
                        <div style="background: var(--bg-base); padding: 15px; border-radius: 10px; border: 1px solid var(--border);">
                            <h4 style="color: #fff; margin-bottom: 5px; font-size: 1rem;">Tablas & Stats</h4>
                            <p style="font-size: 0.85rem; margin-bottom: 10px;">Seguí la tabla y el rendimiento.</p>
                            <a href="#" class="action-link" style="font-size: 0.85rem;">Ver datos &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha (Lateral de Comunidad) -->
            <div class="column-side">
                <div class="panel">
                    <div class="panel-title">💬 Comunidad Activa</div>
                    <p>Unite al grupo exclusivo para enterarte de los horarios de stream, debates y la previa con toda la comunidad.</p>
                    <a href="#" class="action-link" style="background: var(--accent); color: #000; padding: 10px 16px; border-radius: 8px; justify-content: center; width: 100%; text-align: center;">Unirme al Grupo &rarr;</a>
                </div>

                <div class="panel">
                    <div class="panel-title">📱 Redes Oficiales</div>
                    <p>Seguinos en TikTok para clips cortos, polémicas y recortes imperdibles de cada transmisión.</p>
                    <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="action-link">Ir al TikTok de Michael &rarr;</a>
                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
    </footer>

</body>
</html>