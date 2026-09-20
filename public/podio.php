<?php
/**
 * PODIO DE GOLEADORES DE BOCA JUNIORS
 * --------------------------------------------------------------
 * Listado histórico oficial de máximos artilleros del club.
 */

// Array completo con los 50 máximos goleadores
$goleadores = [
    ['pos' => 1, 'nombre' => 'Martín Palermo', 'goles' => 236],
    ['pos' => 2, 'nombre' => 'Roberto Cherro', 'goles' => 218],
    ['pos' => 3, 'nombre' => 'Francisco Varallo', 'goles' => 194],
    ['pos' => 4, 'nombre' => 'Domingo Tarasconi', 'goles' => 191],
    ['pos' => 5, 'nombre' => 'Jaime Sarlanga', 'goles' => 129],
    ['pos' => 6, 'nombre' => 'Mario Boyé', 'goles' => 124],
    ['pos' => 7, 'nombre' => 'Delfín Benítez Cáceres', 'goles' => 114],
    ['pos' => 8, 'nombre' => 'Pío Corcuera', 'goles' => 97],
    ['pos' => 9, 'nombre' => 'Pedro Calomino', 'goles' => 94],
    ['pos' => 10, 'nombre' => 'Carlos Tévez', 'goles' => 94],
    ['pos' => 11, 'nombre' => 'Juan Román Riquelme', 'goles' => 92],
    ['pos' => 12, 'nombre' => 'Sergio Martínez', 'goles' => 86],
    ['pos' => 13, 'nombre' => 'Guillermo Barros Schelotto', 'goles' => 86],
    ['pos' => 14, 'nombre' => 'Alfredo Graciani', 'goles' => 83],
    ['pos' => 15, 'nombre' => 'Rodrigo Palacio', 'goles' => 82],
    ['pos' => 16, 'nombre' => 'Osvaldo Potente', 'goles' => 81],
    ['pos' => 17, 'nombre' => 'Ángel Rojas', 'goles' => 79],
    ['pos' => 18, 'nombre' => 'Diego Latorre', 'goles' => 77],
    ['pos' => 19, 'nombre' => 'Paulo Valentim', 'goles' => 71],
    ['pos' => 20, 'nombre' => 'Darío Benedetto', 'goles' => 70],
    ['pos' => 21, 'nombre' => 'Hugo Curioni', 'goles' => 68],
    ['pos' => 22, 'nombre' => 'Ricardo Gareca', 'goles' => 64],
    ['pos' => 23, 'nombre' => 'Jorge Comas', 'goles' => 63],
    ['pos' => 24, 'nombre' => 'Alfredo Rojas', 'goles' => 56],
    ['pos' => 25, 'nombre' => 'Ernesto Mastrangelo', 'goles' => 56],
    ['pos' => 26, 'nombre' => 'José Borello', 'goles' => 51],
    ['pos' => 27, 'nombre' => 'Marcelo Delgado', 'goles' => 50],
    ['pos' => 28, 'nombre' => 'Carlos Tapia', 'goles' => 47],
    ['pos' => 29, 'nombre' => 'Severino Varela', 'goles' => 46],
    ['pos' => 30, 'nombre' => 'Antonio Barijho', 'goles' => 45],
    ['pos' => 31, 'nombre' => 'Alfredo Garasini', 'goles' => 45],
    ['pos' => 32, 'nombre' => 'Ángel Nardiello', 'goles' => 44],
    ['pos' => 33, 'nombre' => 'Ramón Ponce', 'goles' => 42],
    ['pos' => 34, 'nombre' => 'Oscar Pianetti', 'goles' => 41],
    ['pos' => 35, 'nombre' => 'Donato Penella', 'goles' => 40],
    ['pos' => 36, 'nombre' => 'Jorge Benítez', 'goles' => 40],
    ['pos' => 37, 'nombre' => 'Norberto Madurga', 'goles' => 39],
    ['pos' => 38, 'nombre' => 'Enzo Ferrero', 'goles' => 39],
    ['pos' => 39, 'nombre' => 'Herminio González', 'goles' => 39],
    ['pos' => 40, 'nombre' => 'Pablo Bozzo', 'goles' => 38],
    ['pos' => 41, 'nombre' => 'Juan José Rodríguez', 'goles' => 38],
    ['pos' => 42, 'nombre' => 'Francisco Taggino', 'goles' => 38],
    ['pos' => 43, 'nombre' => 'Ramón Ábila', 'goles' => 36],
    ['pos' => 44, 'nombre' => 'Darío Felman', 'goles' => 36],
    ['pos' => 45, 'nombre' => 'Cristian Pavón', 'goles' => 36],
    ['pos' => 46, 'nombre' => 'Rubén Suñé', 'goles' => 36],
    ['pos' => 47, 'nombre' => 'Diego Armando Maradona', 'goles' => 35],
    ['pos' => 48, 'nombre' => 'Ricardo Alarcón', 'goles' => 33],
    ['pos' => 49, 'nombre' => 'Carlos María García Cambón', 'goles' => 33],
    ['pos' => 50, 'nombre' => 'Rafael Pratt', 'goles' => 32],
];

function h($v): string {
    return htmlspecialchars((string)$v);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podio de Goleadores | El Punto de Encuentro</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
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

        /* --- SIDEBAR --- */
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

        .sidebar-brand span { color: var(--accent); }

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

        .sidebar-link .icon {
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

        /* --- CONTENEDOR PRINCIPAL --- */
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

        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }

        .content-container {
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 35px;
        }

        /* --- HERO --- */
        .historia-hero {
            background: linear-gradient(135deg, var(--bg-surface), var(--bg-surface-hover));
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: var(--shadow);
        }

        .historia-hero h1 {
            font-family: 'Bebas Neue', Impact, sans-serif;
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            color: var(--accent);
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .historia-hero p {
            color: var(--text-muted);
            font-size: 0.95rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* --- GRILLA DE GOLEADORES --- */
        .goleadores-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .goleador-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .goleador-card:hover {
            transform: translateY(-3px);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .goleador-pos {
            font-family: 'Bebas Neue', Impact, sans-serif;
            font-size: 2.2rem;
            color: var(--text-muted);
            min-width: 45px;
            text-align: center;
            line-height: 1;
        }

        /* Destacar el podio principal (1, 2 y 3) */
        .goleador-card:nth-child(1) .goleador-pos { color: #f59e0b; text-shadow: 0 0 10px rgba(245,158,11,0.4); }
        .goleador-card:nth-child(2) .goleador-pos { color: #e5e7eb; }
        .goleador-card:nth-child(3) .goleador-pos { color: #d97706; }

        .goleador-info {
            display: flex;
            flex-direction: column;
            gap: 4px;
            flex: 1;
        }

        .goleador-nombre {
            font-size: 1.05rem;
            font-weight: 700;
            color: #fff;
        }

        .goleador-goles {
            font-size: 0.88rem;
            color: var(--accent);
            font-weight: 600;
        }

        .footer {
            text-align: center;
            padding: 25px 40px;
            color: var(--text-muted);
            font-size: 0.82rem;
            border-top: 1px solid var(--border);
            background: var(--bg-base);
        }

        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .content-container { padding: 20px; }
        }
    </style>
</head>
<body>

    <!-- BARRA LATERAL -->
    <aside class="sidebar">
        <a href="index.php" class="sidebar-brand">⚡ <span>PUNTO DE ENCUENTRO</span></a>
        <div class="sidebar-menu">
            <div class="menu-label">Menú Principal</div>
            <a href="index.php" class="sidebar-link"><span class="icon">🏠</span> Inicio</a>
            <a href="podio.php" class="sidebar-link active"><span class="icon">🏆</span> Podio de Jugadores</a>
            <a href="estadisticas.php" class="sidebar-link"><span class="icon">📊</span> Estadísticas</a>
            <a href="posiciones.php" class="sidebar-link"><span class="icon">📌</span> Posiciones Actuales</a>
            <a href="plantel.php" class="sidebar-link"><span class="icon">👥</span> Plantel Actual</a>
            <div class="sidebar-divider"></div>
            <div class="menu-label">Archivo Histórico</div>
            <a href="historia.php" class="sidebar-link"><span class="icon">📜</span> Sección de Historia</a>
        </div>
        <div class="sidebar-footer">
            <div class="menu-label" style="padding-left:0; margin-bottom: 2px;">Redes Oficiales</div>
            <div class="sidebar-socials">
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" class="social-pill tiktok">TikTok</a>
            </div>
        </div>
    </aside>

    <!-- CONTENIDO -->
    <div class="main-wrapper">
        <header class="top-header">
            <h2>Podio de Goleadores</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">
            <section class="historia-hero">
                <h1>Máximos Artilleros</h1>
                <p>En cada época, ya sea en las décadas de gloria del pasado o en los momentos actuales, Boca Juniors ha sido testigo de la presencia de jugadores excepcionales y goleadores legendarios cuyos nombres resuenan en el corazón de los hinchas.</p>
            </section>

            <!-- GRILLA DE GOLEADORES -->
            <div class="goleadores-grid">
                <?php foreach ($goleadores as $g): ?>
                    <div class="goleador-card">
                        <div class="goleador-pos">#<?= h($g['pos']) ?></div>
                        <div class="goleador-info">
                            <div class="goleador-nombre"><?= h($g['nombre']) ?></div>
                            <div class="goleador-goles"><?= h($g['goles']) ?> Goles</div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>
</body>
</html>