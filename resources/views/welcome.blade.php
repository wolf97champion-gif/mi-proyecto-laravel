<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Punto de Encuentro | Home 2026</title>
    <style>
        :root {
            --bg-base: #090a0f;
            --bg-surface: #12151c;
            --bg-surface-hover: #1a1f2c;
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
            padding-bottom: 100px; 
            overflow-x: hidden;
        }

        /* Hero Profesional con Profundidad */
        .hero {
            position: relative;
            padding: 80px 20px 50px 20px;
            text-align: center;
            background: radial-gradient(circle at 50% 10%, #1c2333 0%, var(--bg-base) 70%);
            border-bottom: 1px solid var(--border);
        }

        .hero-badge {
            display: inline-block;
            padding: 6px 16px;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            font-size: 0.85rem;
            color: var(--accent);
            font-weight: 600;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            letter-spacing: -0.5px;
            color: #ffffff;
        }

        .hero h1 span {
            color: var(--accent);
        }

        .hero p {
            font-size: 1.15rem;
            color: var(--text-muted);
            max-width: 650px;
            margin: 0 auto 30px auto;
            line-height: 1.6;
        }

        /* Botones de Acción */
        .cta-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 26px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            font-size: 0.95rem;
        }

        .btn-main {
            background-color: var(--accent);
            color: #000;
        }

        .btn-main:hover {
            transform: translateY(-2px);
            background-color: #fbbf24;
            box-shadow: 0 6px 20px rgba(245, 158, 11, 0.35);
        }

        .btn-sec {
            background-color: var(--bg-surface);
            color: var(--text-main);
            border: 1px solid var(--border);
        }

        .btn-sec:hover {
            background-color: var(--bg-surface-hover);
            transform: translateY(-2px);
            border-color: rgba(255,255,255,0.2);
        }

        /* Contenedor y Secciones */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .section-header {
            margin-bottom: 25px;
        }

        .section-header h2 {
            font-size: 1.7rem;
            font-weight: 700;
            color: #fff;
        }

        .section-header p {
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-top: 5px;
        }

        /* Banner de Último Video / Destacado */
        .featured-banner {
            background: linear-gradient(135deg, #12151c 0%, #1a2233 100%);
            border: 1px solid rgba(245, 158, 11, 0.25);
            border-radius: 18px;
            padding: 30px;
            margin-bottom: 50px;
            display: flex;
            flex-direction: column;
            gap: 15px;
            box-shadow: var(--shadow);
            position: relative;
            overflow: hidden;
        }

        .featured-tag {
            font-size: 0.75rem;
            background: rgba(245, 158, 11, 0.2);
            color: var(--accent);
            padding: 4px 10px;
            border-radius: 6px;
            width: fit-content;
            font-weight: 700;
            text-transform: uppercase;
        }

        .featured-banner h3 {
            font-size: 1.4rem;
            color: #fff;
            line-height: 1.4;
        }

        .featured-banner p {
            color: var(--text-muted);
            font-size: 0.95rem;
        }

        /* Grid de Tarjetas */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 25px;
        }

        .card {
            background: var(--bg-surface);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, transparent, var(--accent), transparent);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            border-color: rgba(245, 158, 11, 0.4);
            box-shadow: 0 20px 40px -15px rgba(0,0,0,0.7);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card h3 {
            font-size: 1.35rem;
            margin-bottom: 12px;
            color: #fff;
        }

        .card p {
            color: var(--text-muted);
            line-height: 1.6;
            font-size: 0.95rem;
            margin-bottom: 25px;
        }

        .card-link {
            color: var(--accent);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .card-link:hover {
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-muted);
            font-size: 0.85rem;
            border-top: 1px solid var(--border);
            margin-top: 50px;
        }

        /* Navbar Inferior Fijo */
        .bottom-nav {
            position: fixed;
            bottom: 15px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 500px;
            background: rgba(18, 21, 28, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid var(--border);
            border-radius: 50px;
            display: flex;
            justify-content: space-around;
            padding: 12px 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.6);
            z-index: 1000;
        }

        .nav-item {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.8rem;
            font-weight: 500;
            transition: color 0.2s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
        }

        .nav-item:hover, .nav-item.active {
            color: var(--accent);
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <div class="hero-badge">Comunidad & Análisis</div>
        <h1>El Punto de <span>Encuentro</span></h1>
        <p>El espacio definitivo para vivir el análisis, debates post-partido, estadísticas y la mejor interacción en comunidad.</p>
        <div class="cta-group">
            <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="btn btn-main">Ver YouTube</a>
            <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="btn btn-sec">Seguir en TikTok</a>
        </div>
    </header>

    <!-- Contenido Principal -->
    <main class="container">

        <!-- Banner Último Análisis / Video -->
        <div class="featured-banner">
            <span class="featured-tag">📺 Último Análisis Destacado</span>
            <h3>Análisis Post Partido - Previa de Sudamericana & Cierre de Semana</h3>
            <p>Reviví el análisis completo de la victoria, el panorama del equipo de cara al próximo partido de copa y todo lo que dejó la semana.</p>
            <a href="https://www.youtube.com/watch?v=It-xG6qLVmM" target="_blank" class="card-link">Mirar video completo en YouTube &rarr;</a>
        </div>

        <div class="section-header">
            <h2>Secciones Interactivas</h2>
            <p>Navegá por las herramientas principales del canal</p>
        </div>

        <div class="grid">
            <!-- Tarjeta 1 -->
            <div class="card">
                <div>
                    <h3>El Podio del Partido</h3>
                    <p>Elegí a los tres jugadores destacados de cada encuentro. Tu voto alimenta las estadísticas y el debate del próximo stream.</p>
                </div>
                <a href="#" class="card-link">Participar del Podio &rarr;</a>
            </div>
            <!-- Tarjeta 2 -->
            <div class="card">
                <div>
                    <h3>Tablas y Estadísticas</h3>
                    <p>Seguí de cerca la tabla anual, la posición en el torneo y el rendimiento detallado fecha a fecha con análisis exclusivo.</p>
                </div>
                <a href="#" class="card-link">Ver Tablas &rarr;</a>
            </div>
            <!-- Tarjeta 3 -->
            <div class="card">
                <div>
                    <h3>Comunidad Activa</h3>
                    <p>Sumate al grupo de comunicación directa y enterate antes que nadie de las previas, reacciones y transmisiones en vivo.</p>
                </div>
                <a href="#" class="card-link">Unirme al Grupo &rarr;</a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
    </footer>

    <!-- Navbar Inferior Fijo -->
    <nav class="bottom-nav">
        <a href="#" class="nav-item active">🏠 <span>Inicio</span></a>
        <a href="#" class="nav-item">📊 <span>Podio</span></a>
        <a href="#" class="nav-item">📈 <span>Tablas</span></a>
        <a href="#" class="nav-item">💬 <span>Comunidad</span></a>
    </nav>

</body>
</html>