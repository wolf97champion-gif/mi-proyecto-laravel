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

        /* Navbar Superior Fijo - Limpio y perfectamente distribuido */
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

        /* Contenedor Principal: Concentrado 100% en el centro con excelente uso de márgenes */
        .main-container {
            max-width: 1050px;
            margin: 0 auto;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        /* Hero / Presentación Central */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 45px 30px;
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
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 12px;
            color: #fff;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.5;
        }

        /* Secciones Grid Central */
        .content-grid {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 25px;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .column {
            display: flex;
            flex-direction: column;
            gap: 25px;
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
            border-color: rgba(245, 158, 11, 0.35);
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

        /* Tarjeta de Reproductor / Video Segura y Funcional */
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
        }

        .video-card-preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.75;
            transition: transform 0.3s;
        }

        .video-card-preview:hover img {
            transform: scale(1.03);
            opacity: 0.9;
        }

        .play-overlay-btn {
            position: absolute;
            background: var(--accent);
            color: #000;
            width: 54px;
            height: 54px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            font-weight: bold;
            box-shadow: 0 4px 20px rgba(0,0,0,0.6);
            transition: transform 0.2s;
        }

        .video-card-preview:hover .play-overlay-btn {
            transform: scale(1.1);
        }

        /* Tarjetas de Navegación de Contenido (Para ir a páginas internas cargadas) */
        .nav-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .nav-feature-card {
            background: var(--bg-base);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: all 0.2s ease;
        }

        .nav-feature-card:hover {
            border-color: var(--accent);
            background: var(--bg-surface-hover);
            transform: translateY(-2px);
        }

        .nav-feature-card h4 {
            color: #fff;
            font-size: 1.05rem;
            margin-bottom: 6px;
        }

        .nav-feature-card p {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 15px;
        }

        .card-link-text {
            color: var(--accent);
            font-weight: 600;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
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

    <!-- Contenedor Principal al Centro -->
    <main class="main-container">

        <!-- Hero: Presentación oficial -->
        <header class="hero-section">
            <div class="creator-tag">Sitio Oficial • Creado por Michael Novoa</div>
            <h1>El Punto de <span>Encuentro</span></h1>
            <p>El espacio definitivo de análisis, debates post-partido y toda la pasión del mundo de Boca Juniors. Conducido y producido por Michael Novoa para vivir la comunidad de manera única.</p>
        </header>

        <!-- Grilla de Contenido Central -->
        <div class="content-grid">
            
            <!-- Columna Izquierda: Video Funcional y Tarjetas de Navegación -->
            <div class="column">
                
                <!-- Panel de Video con Enlace Directo y Seguro -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Mirá el programa más reciente o hacé clic para reproducirlo al instante en YouTube.</p>
                    
                    <!-- Tarjeta previsualización interactiva (evita errores de bloqueo externo de iframe) -->
                    <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="video-card-preview">
                        <!-- Podes cambiar esta imagen por la miniatura exacta de tu último video de YouTube -->
                        <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?q=80&w=1000&auto=format&fit=crop" alt="Último video del canal">
                        <div class="play-overlay-btn">▶</div>
                    </a>

                    <div style="margin-top: 15px;">
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="card-link-text">Ver todas las transmisiones en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Tarjetas de Navegación a Páginas Internas Cargadas -->
                <div class="panel">
                    <div class="panel-title">⚡ Secciones del Canal</div>
                    <p>Hacé clic en las tarjetas para ingresar a las páginas completas con todo el contenido interactivo.</p>
                    
                    <div class="nav-cards-grid">
                        <a href="podio.php" class="nav-feature-card">
                            <div>
                                <h4>🏆 Podio del Partido</h4>
                                <p>Votá y puntuá a los mejores jugadores de la fecha.</p>
                            </div>
                            <span class="card-link-text">Entrar al Podio &rarr;</span>
                        </a>

                        <a href="estadisticas.php" class="nav-feature-card">
                            <div>
                                <h4>📊 Tablas & Stats</h4>
                                <p>Consultá las posiciones, rendimiento y estadísticas detalladas.</p>
                            </div>
                            <span class="card-link-text">Ver Estadísticas &rarr;</span>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Columna Derecha: Comunidad y Accesos -->
            <div class="column">
                <div class="panel">
                    <div class="panel-title">💬 Comunidad Activa</div>
                    <p>Sumate al grupo oficial de comunicación para enterarte antes que nadie de las previas, horarios de stream y debates abiertos.</p>
                    <a href="#" class="btn-main">Unirme al Grupo &rarr;</a>
                </div>

                <div class="panel">
                    <div class="panel-title">📱 Redes Oficiales</div>
                    <p>Seguinos en TikTok (@michaelnovoa16) para clips cortos, polémicas picantes y recortes imperdibles de cada transmisión.</p>
                    <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="card-link-text">Ir al TikTok oficial &rarr;</a>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer con Derechos Propios -->
    <footer class="footer">
        <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados. Creado por Michael Novoa.</p>
    </footer>

</body>
</html>