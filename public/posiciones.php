<?php
/*
 * POSICIONES ACTUALES
 * --------------------------------------------------------------
 * Para actualizar: cambiá los números en los arreglos de abajo.
 * Cada fila es: [equipo, ...datos]. El orden de las filas es la posición.
 *
 * Clausura y Anual: [equipo, PTS, J, 'Gol', '+/-', G, E, P]
 * Promedios:        [equipo, Prom, Pts, PJ, 2024, 2025, 2026]
 */
$actualizado = '20/09/2026';

$clausuraA = [
    ['Instituto',       22, 10, '13:7',   '+6', 7, 1, 2],
    ['Defensa',         18, 10, '13:11',  '+2', 5, 3, 2],
    ['Gimnasia (M)',    17, 10, '14:9',   '+5', 5, 2, 3],
    ['Vélez',           17, 9,  '12:7',   '+5', 4, 5, 0],
    ['Independiente',   17, 10, '10:8',   '+2', 5, 2, 3],
    ['Boca Jrs.',       15, 10, '12:11',  '+1', 3, 6, 1],
    ['Lanús',           13, 9,  '11:8',   '+3', 4, 1, 4],
    ['Newell\'s',       13, 9,  '10:8',   '+2', 3, 4, 2],
    ['Unión',           13, 10, '17:16',  '+1', 4, 1, 5],
    ['San Lorenzo',     12, 10, '4:6',    '-2', 3, 3, 4],
    ['Estudiantes',     10, 9,  '9:9',    '0',  3, 1, 5],
    ['Riestra',         10, 10, '8:10',   '-2', 2, 4, 4],
    ['Platense',        9,  9,  '9:14',   '-5', 2, 3, 4],
    ['Talleres',        8,  10, '11:17',  '-6', 2, 2, 6],
    ['Central Córdoba', 8,  10, '7:13',   '-6', 2, 2, 6],
];

$clausuraB = [
    ['Argentinos',        18, 9,  '13:8',   '+5', 5, 3, 1],
    ['Gimnasia',          17, 10, '15:15',  '0',  5, 2, 3],
    ['Huracán',           16, 10, '10:8',   '+2', 4, 4, 2],
    ['Sarmiento',         16, 10, '17:16',  '+1', 5, 1, 4],
    ['Central',           15, 9,  '10:8',   '+2', 4, 3, 2],
    ['Independiente Riv.', 14, 9, '13:13',  '0',  4, 2, 3],
    ['Belgrano',          13, 9,  '9:6',    '+3', 3, 4, 2],
    ['Atl. Tucumán',      13, 9,  '7:5',    '+2', 3, 4, 2],
    ['River',             13, 10, '13:12',  '+1', 4, 1, 5],
    ['Tigre',             12, 9,  '7:6',    '+1', 3, 3, 3],
    ['Barracas',          12, 9,  '5:6',    '-1', 3, 3, 3],
    ['Banfield',          9,  10, '11:16',  '-5', 2, 3, 5],
    ['Racing',            8,  10, '11:16',  '-5', 2, 2, 6],
    ['Estudiantes RC',    6,  9,  '4:11',   '-7', 1, 3, 5],
    ['Aldosivi',          5,  9,  '11:16',  '-5', 1, 2, 6],
];

$anual = [
    ['Independiente Riv.', 48, 25, '42:28', '+14', 14, 6,  5],
    ['Argentinos',         47, 25, '30:21', '+9',  13, 8,  4],
    ['Boca Jrs.',          45, 26, '34:20', '+14', 11, 12, 3],
    ['Vélez',              45, 25, '30:19', '+11', 11, 12, 2],
    ['Instituto',          43, 26, '30:24', '+6',  13, 4,  9],
    ['Central',            43, 25, '30:24', '+6',  12, 7,  6],
    ['Gimnasia',           43, 26, '34:34', '0',   13, 4,  9],
    ['River',              42, 26, '35:24', '+11', 13, 3,  10],
    ['Estudiantes',        41, 25, '28:16', '+12', 12, 5,  8],
    ['Independiente',      41, 26, '34:28', '+6',  11, 8,  7],
    ['Belgrano',           39, 25, '26:19', '+7',  10, 9,  6],
    ['Huracán',            38, 26, '27:21', '+6',  9,  11, 6],
    ['Lanús',              37, 25, '29:23', '+6',  10, 7,  8],
    ['Defensa',            37, 26, '31:32', '-1',  9,  10, 7],
    ['Gimnasia (M)',       36, 26, '28:31', '-3',  10, 6,  10],
    ['Sarmiento',          35, 26, '30:36', '-6',  11, 2,  13],
    ['Unión',              34, 26, '41:36', '+5',  9,  7,  10],
    ['Talleres',           34, 26, '28:30', '-2',  9,  7,  10],
    ['San Lorenzo',        34, 26, '18:20', '-2',  8,  10, 8],
    ['Barracas',           33, 25, '20:21', '-1',  8,  9,  8],
    ['Tigre',              32, 25, '25:21', '+4',  7,  11, 7],
    ['Racing',             29, 26, '28:31', '-3',  7,  8,  11],
    ['Newell\'s',          28, 25, '25:35', '-10', 6,  10, 9],
    ['Atl. Tucumán',       27, 25, '22:25', '-3',  6,  9,  10],
    ['Banfield',           27, 26, '28:35', '-7',  7,  6,  13],
    ['Platense',           25, 25, '19:29', '-10', 5,  10, 10],
    ['Central Córdoba',    24, 26, '18:34', '-16', 6,  6,  14],
    ['Riestra',            21, 26, '13:22', '-9',  3,  12, 11],
    ['Aldosivi',           13, 25, '17:35', '-18', 1,  10, 14],
    ['Estudiantes RC',     11, 25, '9:35',  '-26', 2,  5,  18],
];

$promedios = [
    ['Boca Jrs.',          '1.758', 174, 99, 67, 62, 45],
    ['River',              '1.667', 165, 99, 70, 53, 42],
    ['Vélez',              '1.643', 161, 98, 76, 40, 45],
    ['Argentinos',         '1.633', 160, 98, 56, 57, 47],
    ['Central',            '1.592', 156, 98, 47, 66, 43],
    ['Racing',             '1.535', 152, 99, 70, 53, 29],
    ['Independiente',      '1.525', 151, 99, 63, 47, 41],
    ['Estudiantes',        '1.490', 146, 98, 63, 42, 41],
    ['Lanús',              '1.490', 146, 98, 59, 50, 37],
    ['Huracán',            '1.485', 147, 99, 62, 47, 38],
    ['Talleres',           '1.414', 140, 99, 72, 34, 34],
    ['Independiente Riv.', '1.398', 137, 98, 46, 43, 48],
    ['Gimnasia (M)',       '1.385', 36,  26, 0,  0,  36],
    ['Defensa',            '1.343', 133, 99, 58, 38, 37],
    ['Unión',              '1.343', 133, 99, 60, 39, 34],
    ['Barracas',           '1.337', 131, 98, 49, 49, 33],
    ['Instituto',          '1.313', 130, 99, 53, 34, 43],
    ['San Lorenzo',        '1.313', 130, 99, 45, 51, 34],
    ['Gimnasia',           '1.303', 129, 99, 48, 38, 43],
    ['Belgrano',           '1.276', 125, 98, 49, 37, 39],
    ['Tigre',              '1.224', 120, 98, 39, 49, 32],
    ['Riestra',            '1.222', 121, 99, 48, 52, 21],
    ['Platense',           '1.194', 117, 98, 57, 35, 25],
    ['Atl. Tucumán',       '1.133', 111, 98, 50, 34, 27],
    ['Newell\'s',          '1.122', 110, 98, 49, 33, 28],
    ['Central Córdoba',    '1.091', 108, 99, 42, 42, 24],
    ['Sarmiento',          '1.061', 105, 99, 35, 35, 35],
    ['Banfield',           '1.040', 103, 99, 41, 35, 27],
    ['Aldosivi',           '0.807', 46,  57, 0,  33, 13],
    ['Estudiantes RC',     '0.440', 11,  25, 0,  0,  11],
];

$cabeceraTabla   = ['PTS', 'J', 'Gol', '+/-', 'G', 'E', 'P'];
$cabeceraPromedio = ['Prom', 'Pts', 'PJ', '24', '25', '26'];

function h($v): string { return htmlspecialchars((string) $v); }

function zonaClausura(int $pos): string { return $pos <= 8 ? 'z-octavos' : ''; }
function zonaAnual(int $pos): string {
    if ($pos === 1) return 'z-campeon';
    if ($pos <= 3)  return 'z-liberta';
    if ($pos <= 9)  return 'z-sudam';
    if ($pos === 30) return 'z-descenso';
    return '';
}
function zonaPromedio(int $pos): string { return $pos === 30 ? 'z-descenso' : ''; }

function renderTabla(string $titulo, array $cabecera, array $filas, callable $zona, array $leyenda = []): void { ?>
    <div class="tabla-card">
        <div class="tabla-titulo"><?= h($titulo) ?></div>
        <div class="tabla-scroll">
            <table class="tabla">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class="eq">Equipos</th>
                        <?php foreach ($cabecera as $c): ?><th><?= h($c) ?></th><?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filas as $i => $fila): $pos = $i + 1; ?>
                        <tr class="<?= $fila[0] === 'Boca Jrs.' ? 'boca' : '' ?>">
                            <td class="pos <?= $zona($pos) ?>"><?= $pos ?></td>
                            <td class="eq"><?= h($fila[0]) ?></td>
                            <?php foreach (array_slice($fila, 1) as $k => $v): ?>
                                <td class="<?= $k === 0 ? 'destacado' : '' ?>"><?= h($v) ?></td>
                            <?php endforeach; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php if ($leyenda): ?>
            <div class="leyenda">
                <?php foreach ($leyenda as [$clase, $texto]): ?>
                    <span><i class="punto <?= $clase ?>"></i> <?= h($texto) ?></span>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posiciones Actuales | El Punto de Encuentro</title>
    <style>
        :root {
            --bg-base: #07090e; --bg-surface: #0f131c; --bg-surface-hover: #161b26;
            --bg-active: rgba(245, 158, 11, 0.12); --accent: #f59e0b; --accent-glow: rgba(245, 158, 11, 0.15);
            --text-main: #f3f4f6; --text-muted: #9ca3af; --border: rgba(255, 255, 255, 0.08);
            --shadow: 0 16px 40px -12px rgba(0, 0, 0, 0.7);
            --c-octavos: #0ea5e9; --c-campeon: #22c55e; --c-liberta: #eab308; --c-sudam: #22d3ee; --c-descenso: #ef4444;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', system-ui, -apple-system, sans-serif; }
        body { background-color: var(--bg-base); color: var(--text-main); display: flex; min-height: 100vh; overflow-x: hidden; }

        /* --- SIDEBAR --- */
        .sidebar { width: 270px; background: var(--bg-surface); border-right: 1px solid var(--border); display: flex; flex-direction: column; position: fixed; top: 0; left: 0; height: 100vh; z-index: 1000; padding: 20px 15px; }
        .sidebar-brand { font-weight: 800; font-size: 1.1rem; color: #fff; text-decoration: none; display: flex; align-items: center; gap: 10px; padding: 10px 12px; margin-bottom: 25px; }
        .sidebar-brand span { color: var(--accent); }
        .sidebar-menu { display: flex; flex-direction: column; gap: 6px; flex: 1; overflow-y: auto; }
        .menu-label { font-size: 0.72rem; text-transform: uppercase; letter-spacing: 1px; color: var(--text-muted); padding: 10px 12px 5px 12px; font-weight: 700; }
        .sidebar-link { display: flex; align-items: center; gap: 12px; padding: 12px 14px; border-radius: 12px; text-decoration: none; color: var(--text-main); font-size: 0.9rem; font-weight: 500; transition: all 0.2s ease; }
        .sidebar-link span.icon { font-size: 1.1rem; width: 20px; text-align: center; }
        .sidebar-link:hover { background: var(--bg-surface-hover); color: #fff; }
        .sidebar-link.active { background: var(--bg-active); color: var(--accent); font-weight: 600; }
        .sidebar-divider { height: 1px; background: var(--border); margin: 12px 0; }
        .sidebar-link.coming-soon { opacity: 0.6; cursor: default; }
        .sidebar-link.coming-soon:hover { background: transparent; color: var(--text-main); }
        .badge-soon { margin-left: auto; background: rgba(245, 158, 11, 0.15); color: var(--accent); font-size: 0.68rem; font-weight: 700; padding: 2px 7px; border-radius: 6px; text-transform: uppercase; }
        .sidebar-footer { padding-top: 15px; border-top: 1px solid var(--border); }
        .sidebar-socials { display: flex; gap: 8px; margin-top: 8px; }
        .social-pill { flex: 1; padding: 8px; border-radius: 8px; font-size: 0.78rem; font-weight: 600; text-align: center; text-decoration: none; background: var(--bg-base); color: var(--text-main); border: 1px solid var(--border); transition: 0.2s; }
        .social-pill.youtube:hover { background: #cc0000; border-color: #cc0000; color: #fff; }
        .social-pill.tiktok:hover { background: #ff0050; border-color: #ff0050; color: #fff; }

        /* --- CONTENEDOR PRINCIPAL --- */
        .main-wrapper { margin-left: 270px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; width: calc(100% - 270px); }
        .top-header { padding: 20px 40px; border-bottom: 1px solid var(--border); background: rgba(7, 9, 14, 0.85); backdrop-filter: blur(10px); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 999; }
        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }
        .content-container { padding: 35px 40px; display: flex; flex-direction: column; gap: 25px; width: 100%; flex: 1; }

        .hero-section { background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%); border: 1px solid var(--border); border-radius: 16px; padding: 30px; text-align: center; box-shadow: var(--shadow); }
        .hero-section h1 { font-size: 1.9rem; font-weight: 800; margin-bottom: 8px; color: #fff; }
        .hero-section h1 span { color: var(--accent); }
        .hero-section p { color: var(--text-muted); font-size: 0.95rem; max-width: 700px; margin: 0 auto; line-height: 1.5; }
        .actualizado { display: inline-block; margin-top: 12px; font-size: 0.75rem; color: var(--accent); background: var(--accent-glow); padding: 4px 12px; border-radius: 999px; font-weight: 600; }

        /* --- PESTAÑAS --- */
        .tabs { display: flex; flex-wrap: wrap; gap: 8px; }
        .tab-btn { background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border); padding: 10px 18px; border-radius: 999px; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: 0.2s; }
        .tab-btn:hover { background: var(--bg-surface-hover); }
        .tab-btn.active { background: var(--accent); color: #000; border-color: var(--accent); }
        .tab-panel { display: none; }
        .tab-panel.active { display: block; }

        .grupos-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; align-items: start; }
        @media (max-width: 1300px) { .grupos-grid { grid-template-columns: 1fr; } }

        /* --- TABLAS --- */
        .tabla-card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 16px; padding: 18px; box-shadow: var(--shadow); }
        .tabla-titulo { font-size: 1rem; font-weight: 700; color: #fff; margin-bottom: 12px; }
        .tabla-scroll { overflow-x: auto; }
        .tabla { width: 100%; border-collapse: collapse; font-size: 0.83rem; }
        .tabla th { color: var(--text-muted); font-weight: 600; padding: 8px 6px; text-align: center; border-bottom: 1px solid var(--border); white-space: nowrap; }
        .tabla td { padding: 9px 6px; text-align: center; border-bottom: 1px solid var(--border); white-space: nowrap; }
        .tabla .eq { text-align: left; font-weight: 600; color: #fff; }
        .tabla th.eq { color: var(--text-muted); }
        .tabla tbody tr:hover { background: var(--bg-surface-hover); }
        .tabla td.destacado { font-weight: 800; color: #fff; }
        .tabla td.pos { font-weight: 700; color: var(--text-muted); border-left: 4px solid transparent; }
        .tabla tr.boca { background: rgba(245, 158, 11, 0.10); }
        .tabla tr.boca .eq { color: var(--accent); }

        .z-octavos  { border-left-color: var(--c-octavos) !important; }
        .z-campeon  { border-left-color: var(--c-campeon) !important; }
        .z-liberta  { border-left-color: var(--c-liberta) !important; }
        .z-sudam    { border-left-color: var(--c-sudam) !important; }
        .z-descenso { border-left-color: var(--c-descenso) !important; }

        .leyenda { display: flex; flex-direction: column; gap: 6px; margin-top: 14px; font-size: 0.78rem; color: var(--text-muted); }
        .punto { display: inline-block; width: 10px; height: 10px; border-radius: 50%; margin-right: 4px; }
        .punto.z-octavos  { background: var(--c-octavos); }
        .punto.z-campeon  { background: var(--c-campeon); }
        .punto.z-liberta  { background: var(--c-liberta); }
        .punto.z-sudam    { background: var(--c-sudam); }
        .punto.z-descenso { background: var(--c-descenso); }

        .footer { text-align: center; padding: 25px 40px; color: var(--text-muted); font-size: 0.82rem; border-top: 1px solid var(--border); margin-top: auto; }

        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .top-header, .content-container { padding-left: 20px; padding-right: 20px; }
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
            <a href="estadisticas.php" class="sidebar-link"><span class="icon">📊</span> Estadísticas</a>
            <a href="posiciones.php" class="sidebar-link active"><span class="icon">📌</span> Posiciones Actuales</a>
            <a href="plantel.php" class="sidebar-link"><span class="icon">👥</span> Plantel Actual</a>

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

    <!-- CONTENIDO -->
    <div class="main-wrapper">

        <header class="top-header">
            <h2>Posiciones Actuales</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <div class="hero-section">
                <h1>Posiciones <span>Actuales</span></h1>
                <p>Seguí cómo viene Boca en el Clausura, la Tabla Anual y los Promedios del descenso.</p>
                <span class="actualizado">Última actualización: <?= h($actualizado) ?></span>
            </div>

            <div class="tabs">
                <button class="tab-btn active" data-tab="clausura">Clausura</button>
                <button class="tab-btn" data-tab="anual">Tabla Anual</button>
                <button class="tab-btn" data-tab="promedios">Promedios</button>
            </div>

            <!-- CLAUSURA -->
            <section class="tab-panel active" id="tab-clausura">
                <div class="grupos-grid">
                    <?php renderTabla('Clausura - Grupo A', $cabeceraTabla, $clausuraA, 'zonaClausura', [['z-octavos', 'Octavos de Final']]); ?>
                    <?php renderTabla('Clausura - Grupo B', $cabeceraTabla, $clausuraB, 'zonaClausura', [['z-octavos', 'Octavos de Final']]); ?>
                </div>
            </section>

            <!-- TABLA ANUAL -->
            <section class="tab-panel" id="tab-anual">
                <?php renderTabla('Tabla Anual', $cabeceraTabla, $anual, 'zonaAnual', [
                    ['z-campeon',  'Campeón de Liga. Clasificado a Copa Libertadores 2027 y Supercopa Internacional 2026'],
                    ['z-liberta',  'CONMEBOL Libertadores'],
                    ['z-sudam',    'CONMEBOL Sudamericana'],
                    ['z-descenso', 'Descenso'],
                ]); ?>
            </section>

            <!-- PROMEDIOS -->
            <section class="tab-panel" id="tab-promedios">
                <?php renderTabla('Promedios - Relegation', $cabeceraPromedio, $promedios, 'zonaPromedio', [['z-descenso', 'Descenso']]); ?>
            </section>

        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        // Cambiar entre Clausura / Tabla Anual / Promedios
        const botones = document.querySelectorAll('.tab-btn');
        const paneles = document.querySelectorAll('.tab-panel');

        botones.forEach(btn => {
            btn.addEventListener('click', () => {
                botones.forEach(b => b.classList.remove('active'));
                paneles.forEach(p => p.classList.remove('active'));
                btn.classList.add('active');
                document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
            });
        });
    </script>

</body>
</html>