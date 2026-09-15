<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punto de Encuentro | El Mundo Boca</title>
    <style>
        :root {
            --bg-dark: #0b0f19;
            --card-bg: #131b2e;
            --blue-boca: #0038a8;
            --gold-boca: #ffcc00;
            --text-main: #f3f4f6;
            --text-muted: #9ca3af;
            --shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.5);
            --border-glow: 1px solid rgba(255, 204, 0, 0.2);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--bg-dark);
            color: var(--text-main);
            overflow-x: hidden;
        }

        /* Hero Section con profundidad y gradientes */
        .hero {
            position: relative;
            padding: 80px 20px;
            text-align: center;
            background: radial-gradient(circle at 50% 20%, #1e293b 0%, var(--bg-dark) 70%);
            border-bottom: var(--border-glow);
        }

        .hero h1 {
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #ffffff 30%, var(--gold-boca) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.2rem;
            color: var(--text-muted);
            max-width: 600px;
            margin: 0 auto 30px auto;
        }

        /* Botones de acción con relieve */
        .cta-buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 28px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 14px rgba(0,0,0,0.3);
        }

        .btn-primary {
            background-color: var(--gold-boca);
            color: #000;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 204, 0, 0.4);
        }

        .btn-secondary {
            background-color: var(--card-bg);
            color: var(--text-main);
            border: var(--border-glow);
        }

        .btn-secondary:hover {
            background-color: #1a2642;
            transform: translateY(-2px);
        }

        /* Contenedor principal de secciones */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px;
        }

        .section-title {
            font-size: 2rem;
            margin-bottom: 30px;
            border-left: 5px solid var(--gold-boca);
            padding-left: 15px;
        }

        /* Grid de tarjetas sin diseño plano (efecto 3D / elevación) */
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .card {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 30px;
            box-shadow: var(--shadow);
            border: var(--border-glow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px -15px rgba(0, 56, 168, 0.4);
            border-color: rgba(255, 204, 0, 0.5);
        }

        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: var(--gold-boca);
        }

        .card p {
            color: var(--text-muted);
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <header class="hero">
        <h1>Punto de Encuentro</h1>
        <p>El análisis definitivo de Boca Juniors, la previa de la Sudamericana y toda la comunidad de YouTube y TikTok en un solo lugar.</p>
        <div class="cta-buttons">
            <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="btn btn-primary">Ver Canal de YouTube</a>
            <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="btn btn-secondary">Seguir en TikTok</a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container">
        <h2 class="section-title">Secciones Interactívas del Canal</h2>
        <div class="grid">
            <!-- Tarjeta 1 -->
            <div class="card">
                <h3>El Podio del Partido</h3>
                <p>Ingresá para votar y elegir a los tres mejores jugadores de Boca tras cada encuentro. Tu opinión construye el debate del próximo stream.</p>
            </div>
            <!-- Tarjeta 2 -->
            <div class="card">
                <h3>Tablas y Estadísticas</h3>
                <p>Seguí de cerca la tabla anual, la posición de Boca en el torneo y las estadísticas detalladas de rendimiento fecha a fecha.</p>
            </div>
            <!-- Tarjeta 3 -->
            <div class="card">
                <h3>Comunidad y Debate</h3>
                <p>Sumate al grupo de WhatsApp y a las transmisiones en vivo para participar activamente de las reacciones y polémicas del mundo xeneize.</p>
            </div>
        </div>
    </main>

</body>
</html>