<?php
/**
 * HISTORIA DE BOCA JUNIORS (Diseño en Tarjetas y Épocas)
 * --------------------------------------------------------------
 * Para agregar un hito: sumá una línea nueva en $hitos indicando su época.
 * Épocas disponibles: 'fundacion' (Orígenes), 'amateur' (Amateurismo), 'gloria' (Época Dorada).
 */

$epocas = [
    'todos' => 'Todos los hitos',
    'fundacion' => 'Orígenes y Fundación',
    'amateur' => 'Era Amateur y Primeros Títulos',
    'gloria' => 'La Época Dorada y Copas'
];

$hitos = [
    [
        'epoca' => 'fundacion',
        'anio' => '1905',
        'titulo' => 'Nace una pasión',
        'texto' => 'El 3 de abril de 1905, un grupo de jóvenes del barrio de La Boca, entre ellos Esteban Baglietto, Alfredo Scarpatti, Santiago Sana y los hermanos Teodoro y Juan Antonio Farenga, fundó el club en la Plaza Solís.',
        'foto' => ''
    ],
    [
        'epoca' => 'amateur',
        'anio' => '1913',
        'titulo' => 'El salto a Primera',
        'texto' => 'Boca llegó a la máxima categoría del fútbol argentino y desde entonces nunca más se fue. Ese camino sin descensos es parte fundamental de su identidad.',
        'foto' => ''
    ],
    [
        'epoca' => 'amateur',
        'anio' => '1919',
        'titulo' => 'El primer título',
        'texto' => 'El club levantó su primer campeonato de Primera División. Fue el puntapié inicial de una colección inmensa de conquistas locales.',
        'foto' => ''
    ],
    [
        'epoca' => 'amateur',
        'anio' => '1925',
        'titulo' => 'La histórica gira europea',
        'texto' => 'Boca cruzó el océano para jugar por Europa y demostró su nivel futbolístico a nivel internacional, ganándose el cariño y respeto en el viejo continente.',
        'foto' => ''
    ],
    [
        'epoca' => 'gloria',
        'anio' => '1940',
        'titulo' => 'Inauguración de La Bombonera',
        'texto' => 'El 25 de mayo de 1940 se inauguró el mítico estadio de Brandsen. Su diseño único y la cercanía de la hinchada crearon una atmósfera inigualable.',
        'foto' => ''
    ],
    [
        'epoca' => 'gloria',
        'anio' => '1977',
        'titulo' => 'Primera Copa Libertadores',
        'texto' => 'Boca conquistó América por primera vez y coronó un año inolvidable ganando también la Copa Intercontinental frente al Borussia Mönchengladbach.',
        'foto' => ''
    ],
    [
        'epoca' => 'gloria',
        'anio' => '2000',
        'titulo' => 'La cumbre mundial',
        'texto' => 'De la mano de Carlos Bianchi, Boca ganó la Copa Libertadores y venció al Real Madrid en Tokio para levantar la segunda Intercontinental de su historia.',
        'foto' => ''
    ],
    [
        'epoca' => 'gloria',
        'anio' => '2007',
        'titulo' => 'La sexta de América',
        'texto' => 'Con una actuación consagratoria de Juan Román Riquelme, Boca alzó su sexta Copa Libertadores en una final inolvidable ante Gremio.',
        'foto' => ''
    ],
];

$datos = [
    ['1905', 'Año de fundación'],
    ['1940', 'Inauguración de La Bombonera'],
    ['6', 'Copas Libertadores'],
    ['3', 'Copas Intercontinentales'],
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
    <title>Historia de Boca Juniors | El Punto de Encuentro</title>
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
            --oro: #f5b301;
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

        /* --- HERO & STATS --- */
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
            max-width: 600px;
            margin: 0 auto;
        }

        .datos {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .dato {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px;
            text-align: center;
        }

        .dato strong {
            display: block;
            font-family: 'Bebas Neue', Impact, sans-serif;
            font-size: 2.2rem;
            color: var(--accent);
            line-height: 1;
        }

        .dato span { font-size: 0.8rem; color: var(--text-muted); }

        /* --- FILTROS DE ÉPOCA --- */
        .filtros-container {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .filtro-btn {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            color: var(--text-main);
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .filtro-btn:hover, .filtro-btn.active {
            background: var(--bg-active);
            border-color: var(--accent);
            color: var(--accent);
        }

        /* --- TARJETAS DE HISTORIA --- */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
        }

        .historia-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .historia-card:hover {
            transform: translateY(-4px);
            border-color: rgba(245, 158, 11, 0.3);
        }

        .card-img {
            aspect-ratio: 16/9;
            background: var(--bg-surface-hover);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            font-size: 0.85rem;
            border-bottom: 1px solid var(--border);
        }

        .card-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }

        .card-anio {
            font-family: 'Bebas Neue', Impact, sans-serif;
            font-size: 1.8rem;
            color: var(--accent);
            line-height: 1;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #fff;
        }

        .card-text {
            font-size: 0.88rem;
            color: var(--text-muted);
            line-height: 1.6;
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
            <a href="podio.php" class="sidebar-link"><span class="icon">🏆</span> Podio de Jugadores</a>
            <a href="estadisticas.php" class="sidebar-link active"><span class="icon">📊</span> Estadísticas</a>
            <a href="posiciones.php" class="sidebar-link"><span class="icon">📌</span> Posiciones Actuales</a>
            <a href="plantel.php" class="sidebar-link"><span class="icon">👥</span> Plantel Actual</a>
            <div class="sidebar-divider"></div>
            <div class="menu-label">Archivo Histórico</div>
            <a href="#" class="sidebar-link" style="opacity: 0.6; cursor: default;">
                <span class="icon">📜</span> Sección de Historia <span class="badge-soon">Pronto</span>
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

    <!-- CONTENIDO -->
    <div class="main-wrapper">
        <header class="top-header">
            <h2>Historia de Boca Juniors</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">
            <section class="historia-hero">
                <h1>Nuestra Historia</h1>
                <p>Un recorrido por los momentos más emblemáticos que forjaron la grandeza del club más popular.</p>
            </section>

            <div class="datos">
                <?php foreach ($datos as [$numero, $texto]): ?>
                    <div class="dato">
                        <strong><?= h($numero) ?></strong>
                        <span><?= h($texto) ?></span>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- FILTROS -->
            <div class="filtros-container">
                <?php foreach ($epocas as $key => $label): ?>
                    <button class="filtro-btn <?= $key === 'todos' ? 'active' : '' ?>" onclick="filtrarEpoca('<?= h($key) ?>', this)">
                        <?= h($label) ?>
                    </button>
                <?php endforeach; ?>
            </div>

            <!-- TARJETAS -->
            <div class="cards-grid" id="gridHitos">
                <?php foreach ($hitos as $hito): ?>
                    <div class="historia-card" data-epoca="<?= h($hito['epoca']) ?>">
                        <div class="card-img">
                            <?php if (!empty($hito['foto'])): ?>
                                <img src="<?= h($hito['foto']) ?>" alt="<?= h($hito['titulo']) ?>" loading="lazy">
                            <?php else: ?>
                                📷 <?= h($hito['anio']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <div class="card-anio"><?= h($hito['anio']) ?></div>
                            <div class="card-title"><?= h($hito['titulo']) ?></div>
                            <div class="card-text"><?= h($hito['texto']) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        function filtrarEpoca(epoca, btn) {
            // Actualizar botones activos
            document.querySelectorAll('.filtro-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Filtrar tarjetas
            document.querySelectorAll('.historia-card').forEach(card => {
                if (epoca === 'todos' || card.dataset.epoca === epoca) {
                    card.style.display = 'flex';
                } else {
                    card.style.display = 'none';
                }
            });
        }
    </script>
</body>
</html>