<?php require __DIR__ . '/tracker.php'; ?>
<?php
/*
 * PLANTEL ACTUAL
 * --------------------------------------------------------------
 * Los datos salen de la tabla oficial del plantel. Cada jugador tiene:
 *   nombre, grupo (Arquero/Defensor/Mediocampista/Delantero), rol (puesto
 *   específico), nacimiento (AAAA-MM-DD), altura (en metros),
 *   numero (null si todavía no lo cargamos) y foto (vacío = iniciales).
 * La edad se calcula sola a partir de la fecha de nacimiento.
 */
$entrenador = ['nombre' => 'Rodolfo Arruabarrena', 'rol' => 'Entrenador', 'nacimiento' => '1975-07-20', 'altura' => '1.75', 'numero' => null, 'foto' => ''];

$jugadores = [
    // ---- ARQUEROS ----
    ['nombre' => 'Agustín Marchesín',   'grupo' => 'Arquero', 'rol' => 'Arquero', 'nacimiento' => '1988-03-16', 'altura' => '1.88', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Álvaro Montero',      'grupo' => 'Arquero', 'rol' => 'Arquero', 'nacimiento' => '1995-03-29', 'altura' => '2.01', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Leandro Brey',        'grupo' => 'Arquero', 'rol' => 'Arquero', 'nacimiento' => '2002-09-21', 'altura' => '1.91', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Javier García',       'grupo' => 'Arquero', 'rol' => 'Arquero', 'nacimiento' => '1987-01-29', 'altura' => '1.80', 'numero' => null, 'foto' => ''],

    // ---- DEFENSORES ----
    ['nombre' => 'Lautaro Di Lollo',    'grupo' => 'Defensor', 'rol' => 'Defensa Central',           'nacimiento' => '2004-03-10', 'altura' => '1.87', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Lautaro Blanco',      'grupo' => 'Defensor', 'rol' => 'Defensa Lateral Izquierdo', 'nacimiento' => '1999-02-19', 'altura' => '1.76', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Nicolás Figal',       'grupo' => 'Defensor', 'rol' => 'Defensa Central',           'nacimiento' => '1994-04-03', 'altura' => '1.80', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Leandro Lozano',      'grupo' => 'Defensor', 'rol' => 'Defensa Lateral Derecho',   'nacimiento' => '1998-12-19', 'altura' => '1.70', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Dylan Gorosito',      'grupo' => 'Defensor', 'rol' => 'Defensa Lateral Derecho',   'nacimiento' => '2006-02-03', 'altura' => '1.73', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Marco Pellegrino',    'grupo' => 'Defensor', 'rol' => 'Defensa Central',           'nacimiento' => '2002-07-18', 'altura' => '1.84', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Malcom Braida',       'grupo' => 'Defensor', 'rol' => 'Defensa Lateral Izquierdo', 'nacimiento' => '1997-05-17', 'altura' => '1.75', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Ayrton Costa',        'grupo' => 'Defensor', 'rol' => 'Defensa Central',           'nacimiento' => '1999-07-12', 'altura' => '1.79', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Facundo Herrera',     'grupo' => 'Defensor', 'rol' => 'Defensa Central',           'nacimiento' => '2006-07-11', 'altura' => '1.80', 'numero' => null, 'foto' => ''],

    // ---- MEDIOCAMPISTAS ----
    ['nombre' => 'Juan Ramírez',        'grupo' => 'Mediocampista', 'rol' => 'Mediocampista Central',    'nacimiento' => '1993-05-25', 'altura' => '1.74', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Leandro Paredes',     'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '1994-06-29', 'altura' => '1.82', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Rodrigo Battaglia',   'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '1991-07-12', 'altura' => '1.87', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Carlos Palacios',     'grupo' => 'Mediocampista', 'rol' => 'Mediocampista Ofensivo',   'nacimiento' => '2000-07-20', 'altura' => '1.80', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Tomás Aranda',        'grupo' => 'Mediocampista', 'rol' => 'Mediocampista Ofensivo',   'nacimiento' => '2007-05-09', 'altura' => '1.72', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Williams Alarcón',    'grupo' => 'Mediocampista', 'rol' => 'Mediocampista Central',    'nacimiento' => '2000-11-29', 'altura' => '1.82', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Milton Delgado',      'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '2005-06-16', 'altura' => '1.66', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Camilo Rey Domenech', 'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '2006-03-10', 'altura' => '1.78', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Santiago Ascacibar',  'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '1997-02-25', 'altura' => '1.69', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Tomás Belmonte',      'grupo' => 'Mediocampista', 'rol' => 'Centrocampista defensivo', 'nacimiento' => '1998-05-27', 'altura' => '1.81', 'numero' => null, 'foto' => ''],

    // ---- DELANTEROS ----
    ['nombre' => 'Milton Giménez',      'grupo' => 'Delantero', 'rol' => 'Centro Delantero',     'nacimiento' => '1996-08-12', 'altura' => '1.84', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Ángel Romero',        'grupo' => 'Delantero', 'rol' => 'Delantero Derecho',    'nacimiento' => '1992-07-04', 'altura' => '1.76', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Enner Valencia',      'grupo' => 'Delantero', 'rol' => 'Centro Delantero',     'nacimiento' => '1989-11-04', 'altura' => '1.77', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Miguel Merentiel',    'grupo' => 'Delantero', 'rol' => 'Centro Delantero',     'nacimiento' => '1996-02-24', 'altura' => '1.76', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Leonel Flores',       'grupo' => 'Delantero', 'rol' => 'Delantero Derecho',    'nacimiento' => '2007-02-06', 'altura' => '1.77', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Alan Velasco',        'grupo' => 'Delantero', 'rol' => 'Delantero Izquierdo',  'nacimiento' => '2002-07-27', 'altura' => '1.67', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Sebastián Villa',     'grupo' => 'Delantero', 'rol' => 'Delantero Izquierdo',  'nacimiento' => '1996-05-19', 'altura' => '1.79', 'numero' => null, 'foto' => ''],
    ['nombre' => 'Adam Bareiro',        'grupo' => 'Delantero', 'rol' => 'Centro Delantero',     'nacimiento' => '1996-07-26', 'altura' => '1.80', 'numero' => null, 'foto' => ''],
];

$orden = ['Arquero' => 'Arqueros', 'Defensor' => 'Defensores', 'Mediocampista' => 'Mediocampistas', 'Delantero' => 'Delanteros'];

$porPosicion = [];
foreach ($orden as $clave => $titulo) {
    $porPosicion[$clave] = array_values(array_filter($jugadores, fn($j) => $j['grupo'] === $clave));
}

function iniciales(string $nombre): string {
    $partes = preg_split('/\s+/', trim($nombre));
    $ini = '';
    foreach (array_slice($partes, 0, 2) as $p) {
        $ini .= mb_strtoupper(mb_substr($p, 0, 1));
    }
    return $ini;
}

function calcularEdad(string $nacimiento): int {
    return (new DateTime($nacimiento))->diff(new DateTime('today'))->y;
}

function tarjetaJugador(array $j): void { ?>
    <article class="jugador-card">
        <?php if (!empty($j['numero'])): ?>
            <span class="jugador-numero">#<?= (int) $j['numero'] ?></span>
        <?php endif; ?>

        <div class="jugador-avatar">
            <?php if (!empty($j['foto'])): ?>
                <img src="<?= htmlspecialchars($j['foto']) ?>" alt="<?= htmlspecialchars($j['nombre']) ?>">
            <?php else: ?>
                <?= htmlspecialchars(iniciales($j['nombre'])) ?>
            <?php endif; ?>
        </div>

        <div class="jugador-nombre"><?= htmlspecialchars($j['nombre']) ?></div>
        <div class="jugador-rol"><?= htmlspecialchars($j['rol']) ?></div>
        <div class="jugador-meta"><?= calcularEdad($j['nacimiento']) ?> años • <?= htmlspecialchars($j['altura']) ?> m</div>
    </article>
<?php }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantel Actual | El Punto de Encuentro</title>
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

        /* --- CAJA MERCADO PAGO EN EL NAVBAR --- */
        .mp-box { margin-top: 14px; background: linear-gradient(135deg, rgba(0,158,227,0.18), rgba(245,158,11,0.10)); border: 1px solid rgba(0,158,227,0.35); border-radius: 12px; padding: 12px; }
        .mp-box .mp-title { font-size: 0.72rem; font-weight: 800; color: #35c2ff; letter-spacing: 0.5px; display: flex; align-items: center; gap: 6px; margin-bottom: 8px; }
        .mp-row { font-size: 0.74rem; color: var(--text-muted); margin-bottom: 4px; }
        .mp-row b { color: var(--text-main); font-weight: 700; }
        .mp-alias { display: flex; align-items: center; justify-content: space-between; gap: 8px; background: var(--bg-base); border: 1px solid var(--border); border-radius: 8px; padding: 7px 10px; margin-top: 6px; }
        .mp-alias code { color: var(--accent); font-weight: 800; font-size: 0.82rem; }
        .mp-copy { background: var(--accent); color: #000; border: none; border-radius: 6px; padding: 4px 9px; font-size: 0.68rem; font-weight: 800; cursor: pointer; }
        .mp-copy:hover { background: #fbbf24; }

        /* --- CONTENEDOR PRINCIPAL --- */
        .main-wrapper { margin-left: 270px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; width: calc(100% - 270px); }
        .top-header { padding: 20px 40px; border-bottom: 1px solid var(--border); background: rgba(7, 9, 14, 0.85); backdrop-filter: blur(10px); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 999; }
        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }
        .content-container { padding: 35px 40px; display: flex; flex-direction: column; gap: 25px; width: 100%; flex: 1; }

        .hero-section { background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%); border: 1px solid var(--border); border-radius: 16px; padding: 30px; text-align: center; box-shadow: var(--shadow); }
        .hero-section h1 { font-size: 1.9rem; font-weight: 800; margin-bottom: 8px; color: #fff; }
        .hero-section h1 span { color: var(--accent); }
        .hero-section p { color: var(--text-muted); font-size: 0.95rem; max-width: 700px; margin: 0 auto; line-height: 1.5; }

        /* --- FILTROS --- */
        .filtros { display: flex; flex-wrap: wrap; gap: 8px; }
        .filtro-btn { background: var(--bg-surface); color: var(--text-main); border: 1px solid var(--border); padding: 9px 16px; border-radius: 999px; font-size: 0.82rem; font-weight: 600; cursor: pointer; transition: 0.2s; }
        .filtro-btn:hover { background: var(--bg-surface-hover); }
        .filtro-btn.active { background: var(--accent); color: #000; border-color: var(--accent); }

        /* --- SECCIONES POR POSICIÓN --- */
        .grupo { display: flex; flex-direction: column; gap: 14px; }
        .grupo-titulo { font-size: 1.05rem; font-weight: 700; color: #fff; display: flex; align-items: center; gap: 10px; }
        .grupo-titulo .contador { background: var(--accent-glow); color: var(--accent); font-size: 0.72rem; font-weight: 700; padding: 3px 9px; border-radius: 999px; }

        .jugadores-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(190px, 1fr)); gap: 16px; }

        .jugador-card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 16px; padding: 20px 16px; text-align: center; box-shadow: var(--shadow); transition: transform 0.2s, border-color 0.2s; position: relative; }
        .jugador-card:hover { transform: translateY(-4px); border-color: rgba(245, 158, 11, 0.4); }

        .jugador-numero { position: absolute; top: 10px; left: 12px; font-weight: 800; font-size: 0.95rem; color: var(--accent); }

        .jugador-avatar { width: 84px; height: 84px; border-radius: 50%; margin: 6px auto 12px; overflow: hidden; background: linear-gradient(135deg, rgba(0, 50, 160, 0.4), rgba(245, 158, 11, 0.25)); border: 2px solid rgba(245, 158, 11, 0.35); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.5rem; color: #fff; }
        .jugador-avatar img { width: 100%; height: 100%; object-fit: cover; }

        .jugador-nombre { font-size: 0.98rem; font-weight: 700; color: #fff; margin-bottom: 4px; }
        .jugador-rol { font-size: 0.78rem; color: var(--accent); font-weight: 600; margin-bottom: 6px; }
        .jugador-meta { font-size: 0.8rem; color: var(--text-muted); }

        .vacio { color: var(--text-muted); font-size: 0.88rem; }

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
            <a href="foro.php" class="sidebar-link"><span class="icon">💬</span> Foro y Debates</a>
            <a href="plantel.php" class="sidebar-link active"><span class="icon">👥</span> Plantel Actual</a>

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

            <!-- CAJA MERCADO PAGO -->
            <div class="mp-box">
                <div class="mp-title">💳 APOYÁ AL CANAL · MERCADO PAGO</div>
                <div class="mp-row">Titular: <b>Michael Novoa y Gonzalez</b></div>
                <div class="mp-alias">
                    <code id="mpAlias">michael.ok.mp</code>
                    <button class="mp-copy" type="button" onclick="copiarAlias()">Copiar</button>
                </div>
            </div>
        </div>
    </aside>

    <!-- CONTENIDO -->
    <div class="main-wrapper">

        <header class="top-header">
            <h2>Plantel Actual</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <div class="hero-section">
                <h1>Plantel <span>Actual</span></h1>
                <p>El cuerpo técnico y todos los jugadores que integran el plantel de Boca Juniors, ordenados por posición.</p>
            </div>

            <!-- Filtros -->
            <div class="filtros">
                <button class="filtro-btn active" data-filtro="todos">Todos (<?= count($jugadores) ?>)</button>
                <?php foreach ($orden as $clave => $titulo): ?>
                    <button class="filtro-btn" data-filtro="<?= htmlspecialchars($clave) ?>">
                        <?= htmlspecialchars($titulo) ?> (<?= count($porPosicion[$clave]) ?>)
                    </button>
                <?php endforeach; ?>
            </div>

            <?php if (empty($jugadores)): ?>
                <p class="vacio">Todavía no se cargó ningún jugador.</p>
            <?php endif; ?>

            <!-- Cuerpo técnico -->
            <section class="grupo" data-grupo="Entrenador">
                <h3 class="grupo-titulo">Director Técnico</h3>
                <div class="jugadores-grid">
                    <?php tarjetaJugador($entrenador); ?>
                </div>
            </section>

            <!-- Grupos por posición -->
            <?php foreach ($orden as $clave => $titulo): ?>
                <?php if (empty($porPosicion[$clave])) continue; ?>
                <section class="grupo" data-grupo="<?= htmlspecialchars($clave) ?>">
                    <h3 class="grupo-titulo">
                        <?= htmlspecialchars($titulo) ?>
                        <span class="contador"><?= count($porPosicion[$clave]) ?></span>
                    </h3>

                    <div class="jugadores-grid">
                        <?php foreach ($porPosicion[$clave] as $j) tarjetaJugador($j); ?>
                    </div>
                </section>
            <?php endforeach; ?>

        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        function copiarAlias(){
            const alias = document.getElementById('mpAlias').textContent.trim();
            navigator.clipboard?.writeText(alias).then(() => {
                const b = document.querySelector('.mp-copy'); const o = b.textContent; b.textContent = '¡Copiado!';
                setTimeout(() => b.textContent = o, 1500);
            });
        }

        // Filtro por posición
        const botones = document.querySelectorAll('.filtro-btn');
        const grupos = document.querySelectorAll('.grupo');

        botones.forEach(btn => {
            btn.addEventListener('click', () => {
                botones.forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const filtro = btn.dataset.filtro;
                grupos.forEach(g => {
                    g.style.display = (filtro === 'todos' || g.dataset.grupo === filtro) ? '' : 'none';
                });
            });
        });
    </script>

</body>
</html>