<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Punto de Encuentro | Canal Oficial de Michael Novoa</title>
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
            --shadow: 0 12px 30px -10px rgba(0, 0, 0, 0.6);
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
            background: rgba(7, 9, 14, 0.9);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 15px 40px;
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
            cursor: pointer;
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

        /* Contenedor Centralizado */
        .main-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
            gap: 35px;
        }

        /* Hero / Presentación de Michael Novoa */
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #131a28 100%);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 50px 30px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .creator-tag {
            display: inline-block;
            padding: 6px 16px;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            font-size: 0.8rem;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero-section h1 {
            font-size: 2.6rem;
            font-weight: 800;
            margin-bottom: 15px;
            color: #fff;
            letter-spacing: -0.5px;
        }

        .hero-section h1 span {
            color: var(--accent);
        }

        .hero-section p {
            color: var(--text-muted);
            font-size: 1.05rem;
            max-width: 750px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Seccion de Columnas unificadas */
        .content-grid {
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 30px;
        }

        @media (max-width: 900px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        .column {
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
            border-color: rgba(245, 158, 11, 0.35);
        }

        .panel-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: 10px;
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

        /* Reproductor de YouTube Real */
        .video-container {
            position: relative;
            width: 100%;
            aspect-ratio: 16/9;
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid var(--border);
            background: #000;
        }

        .video-container iframe {
            width: 100%;
            height: 100%;
            border: none;
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

        .btn-main {
            background: var(--accent);
            color: #000;
            padding: 12px 20px;
            border-radius: 10px;
            text-align: center;
            justify-content: center;
            font-weight: 700;
            width: 100%;
            box-shadow: 0 4px 15px rgba(245, 158, 11, 0.2);
            transition: transform 0.2s, background 0.2s;
        }

        .btn-main:hover {
            background: #fbbf24;
            transform: translateY(-2px);
            text-decoration: none;
        }

        /* Herramientas Grid Interno */
        .tools-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .tool-card {
            background: var(--bg-base);
            padding: 18px;
            border-radius: 12px;
            border: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .tool-card h4 {
            color: #fff;
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .tool-card p {
            font-size: 0.85rem;
            margin-bottom: 15px;
        }

        /* Footer Oficial */
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

    <!-- Navbar Superior con enlace asegurado al Home -->
    <nav class="top-nav">
        <a href="#" class="nav-brand">⚡ EL PUNTO DE <span>ENCUENTRO</span></a>
        <div class="nav-socials">
            <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-btn youtube">YouTube</a>
            <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-btn tiktok">TikTok</a>
        </div>
    </nav>

    <!-- Contenedor Principal Centrado -->
    <main class="main-container">

        <!-- Hero: Quién soy y de qué trata -->
        <header class="hero-section">
            <div class="creator-tag">Sitio Oficial creado por Michael Novoa</div>
            <h1>El Punto de <span>Encuentro</span></h1>
            <p>El espacio definitivo de análisis, debates post-partido y toda la pasión del mundo de Boca Juniors. Conducido y producido por Michael Novoa para vivir la comunidad de manera única.</p>
        </header>

        <!-- Grilla de Contenido Principal -->
        <div class="content-grid">
            
            <!-- Columna Izquierda: Video Real y Herramientas -->
            <div class="column">
                <!-- Panel de Video Real de YouTube -->
                <div class="panel">
                    <div class="panel-title">📺 Último Análisis en Directo</div>
                    <p>Reviví el programa más reciente directamente desde el canal de YouTube.</p>
                    <div class="video-container">
                        <!-- Video real integrado para que funcione el play perfectamente -->
                        <iframe src="https://www.youtube-nocookie.com/embed/It-xG6qLVmM" title="Último video del canal" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div style="margin-top: 15px;">
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="action-link">Ver más transmisiones en YouTube &rarr;</a>
                    </div>
                </div>

                <!-- Herramientas Interactivas del Canal -->
                <div class="panel">
                    <div class="panel-title">⚡ Herramientas Interactivas</div>
                    <p>Secciones exclusivas para participar de las dinámicas del stream y consultar datos al instante.</p>
                    <div class="tools-grid">
                        <div class="tool-card">
                            <div>
                                <h4>Podio del Partido</h4>
                                <p>Votá a los mejores jugadores.</p>
                            </div>
                            <a href="#" class="action-link" style="font-size: 0.85rem;">Participar &rarr;</a>
                        </div>
                        <div class="tool-card">
                            <div>
                                <h4>Tablas & Stats</h4>
                                <p>Seguí las posiciones en detalle.</p>
                            </div>
                            <a href="#" class="action-link" style="font-size: 0.85rem;">Consultar &rarr;</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Columna Derecha: Comunidad y Accesos Directos -->
            <div class="column">
                <div class="panel">
                    <div class="panel-title">💬 Comunidad Activa</div>
                    <p>Sumate al grupo oficial de comunicación para enterarte antes que nadie de las previas, horarios de stream y debates abiertos.</p>
                    <a href="#" class="btn-main" style="display: inline-flex; text-decoration: none;">Unirme al Grupo &rarr;</a>
                </div>

                <div class="panel">
                    <div class="panel-title">📱 Redes Oficiales</div>
                    <p>Seguinos en TikTok (@michaelnovoa16) para clips cortos, polémicas picantes y recortes imperdibles de cada transmisión.</p>
                    <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="action-link">Ir al TikTok oficial &rarr;</a>
                </div>
            </div>

        </div>

    </main>

    <!-- Footer con Derechos Reservados Propios -->
    <footer class="footer">
        <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados. Creado por Michael Novoa.</p>
    </footer>

</body>
</html>