<?php
/*
 * HISTORIA DE BOCA JUNIORS (línea de tiempo)
 * --------------------------------------------------------------
 * Para agregar un hito: sumá una línea nueva en $hitos (en orden cronológico).
 * Para poner una foto: copiá la imagen a public/img/historia/ y completá 'foto',
 * por ejemplo 'img/historia/1905.jpg'. Si 'foto' queda vacío, se ve un recuadro.
 *
 * Los textos están escritos con palabras propias. Revisá fechas y datos antes
 * de publicar, y usá solo fotos que tengas derecho a usar.
 */
$hitos = [
    ['anio' => '1905', 'titulo' => 'Nace una pasión',
     'texto' => 'El 3 de abril de 1905, un grupo de jóvenes del barrio de La Boca, entre ellos Esteban Baglietto, Alfredo Scarpatti, Santiago Sana y los hermanos Teodoro y Juan Antonio Farenga, fundó el club en la Plaza Solís. Baglietto fue el primer presidente y así empezó una historia que hoy recorre el mundo.',
     'foto' => ''],
    ['anio' => '1913', 'titulo' => 'El salto a Primera',
     'texto' => 'Boca llegó a la máxima categoría del fútbol argentino y desde entonces nunca más se fue. Ese camino sin descensos es parte de su identidad.',
     'foto' => ''],
    ['anio' => '1919', 'titulo' => 'El primer título',
     'texto' => 'El club levantó su primer campeonato de Primera División. Fue el primer paso de una colección de títulos que no dejó de crecer.',
     'foto' => ''],
    ['anio' => '1925', 'titulo' => 'La gira europea',
     'texto' => 'Boca cruzó el océano para jugar por Europa y mostró su fútbol lejos de casa. Aquella gira lo hizo conocido mucho más allá del Río de la Plata.',
     'foto' => ''],
    ['anio' => '1940', 'titulo' => 'Nace La Bombonera',
     'texto' => 'El 25 de mayo de 1940 se inauguró el estadio de la calle Brandsen. Con su forma inconfundible y la hinchada casi encima de la cancha, se transformó en uno de los templos del fútbol.',
     'foto' => ''],
    ['anio' => '1977', 'titulo' => 'Gloria continental',
     'texto' => 'Boca ganó su primera Copa Libertadores y ese mismo año conquistó la Copa Intercontinental. En 1978 repitió en América y confirmó que era una potencia del continente.',
     'foto' => ''],
    ['anio' => '1981', 'titulo' => 'Maradona campeón',
     'texto' => 'Con Diego Maradona como figura, Boca ganó el Metropolitano de 1981. Fue un título que la gente recordó durante años, hasta la llegada de nuevas alegrías.',
     'foto' => ''],
    ['anio' => '1992', 'titulo' => 'Un equipo maestro',
     'texto' => 'Con Oscar Tabárez como entrenador, Boca ganó el Apertura 1992 y cortó una larga sequía de campeonatos locales que venía desde 1981.',
     'foto' => ''],
    ['anio' => '1995', 'titulo' => 'Una nueva era',
     'texto' => 'Mauricio Macri asumió la presidencia y Maradona volvió al club. Empezó una etapa de modernización que cambió la estructura de la institución.',
     'foto' => ''],
    ['anio' => '2000', 'titulo' => 'La era de las copas',
     'texto' => 'Boca ganó la Copa Libertadores en 2000 y 2001, y en 2000 se quedó también con la Intercontinental frente al Real Madrid, en Tokio. Fue una de las etapas más ganadoras de su historia.',
     'foto' => ''],
    ['anio' => '2003', 'titulo' => 'De nuevo en la cima',
     'texto' => 'El club volvió a ser campeón de América y sumó otra Copa Intercontinental, esta vez ante el Milan, definida por penales.',
     'foto' => ''],
    ['anio' => '2007', 'titulo' => 'La sexta Libertadores',
     'texto' => 'Con Juan Román Riquelme como conductor, Boca ganó su sexta Copa Libertadores y se ubicó entre los clubes más ganadores de la competencia.',
     'foto' => ''],
];

$datos = [
    ['1905', 'Año de fundación'],
    ['1940', 'Inauguración de La Bombonera'],
    ['6', 'Copas Libertadores'],
    ['3', 'Copas Intercontinentales'],
];

function h($v): string { return htmlspecialchars((string) $v); }
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
            --bg-base: #07090e; --bg-surface: #0f131c; --bg-surface-hover: #161b26;
            --bg-active: rgba(245, 158, 11, 0.12); --accent: #f59e0b; --accent-glow: rgba(245, 158, 11, 0.15);
            --text-main: #f3f4f6; --text-muted: #9ca3af; --border: rgba(255, 255, 255, 0.08);
            --shadow: 0 16px 40px -12px rgba(0, 0, 0, 0.7);
            --azul: #14295a; --azul-claro: #1f3a6e; --oro: #f5b301;
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
        .content-container { display: flex; flex-direction: column; width: 100%; flex: 1; background: var(--azul-claro); }

        /* --- HERO --- */
        .historia-hero { text-align: center; padding: 70px 30px 50px; background: linear-gradient(180deg, #0c1c44 0%, var(--azul-claro) 100%); border-bottom: 1px solid rgba(255,255,255,0.15); }
        .historia-anios { display: inline-flex; align-items: center; gap: 12px; font-weight: 700; letter-spacing: 1px; color: #fff; font-size: 1.05rem; }
        .historia-anios .estrella { color: var(--oro); font-size: 1.5rem; }
        .historia-hero h1 { font-family: 'Bebas Neue', Impact, 'Arial Narrow', sans-serif; font-weight: 400; font-size: clamp(3rem, 9vw, 6.5rem); line-height: 1; color: #fff; margin-top: 10px; letter-spacing: 1px; }

        /* --- DATOS RÁPIDOS --- */
        .datos { display: grid; grid-template-columns: repeat(auto-fit, minmax(170px, 1fr)); gap: 14px; max-width: 1000px; margin: 40px auto 0; padding: 0 30px; width: 100%; }
        .dato { background: rgba(255,255,255,0.06); border: 1px solid rgba(245,179,1,0.35); border-radius: 14px; padding: 18px 12px; text-align: center; }
        .dato strong { display: block; font-family: 'Bebas Neue', Impact, sans-serif; font-weight: 400; font-size: 2.4rem; color: var(--oro); line-height: 1; }
        .dato span { font-size: 0.8rem; color: #dbe4ff; }

        /* --- LÍNEA DE TIEMPO --- */
        .timeline { position: relative; max-width: 1000px; width: 100%; margin: 40px auto 0; padding: 30px 30px 60px; }
        .timeline::before { content: ''; position: absolute; left: 50%; top: 0; bottom: 0; width: 3px; background: linear-gradient(180deg, var(--oro), rgba(245,179,1,0.15)); transform: translateX(-50%); }

        .tl-item { position: relative; display: grid; grid-template-columns: 1fr 1fr; gap: 70px; align-items: center; margin: 70px 0; opacity: 0.25; transform: translateY(24px); transition: opacity 0.7s ease, transform 0.7s ease; }
        .tl-item.visible { opacity: 1; transform: none; }
        .tl-item::after { content: '★'; position: absolute; left: 50%; top: 24px; transform: translateX(-50%); color: var(--oro); font-size: 1.5rem; line-height: 1; background: var(--azul-claro); padding: 6px 0; }

        .tl-foto { border-radius: 6px; overflow: hidden; aspect-ratio: 3 / 2; background: linear-gradient(135deg, #0f2250, #2a4d92); border: 1px solid rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center; color: rgba(255,255,255,0.35); font-size: 0.85rem; box-shadow: 0 10px 30px -10px rgba(0,0,0,0.6); }
        .tl-foto img { width: 100%; height: 100%; object-fit: cover; }

        .tl-anio { font-family: 'Bebas Neue', Impact, sans-serif; font-weight: 400; font-size: 3.2rem; line-height: 1; color: #fff; }
        .tl-titulo { font-family: 'Bebas Neue', Impact, sans-serif; font-weight: 400; font-size: 1.7rem; letter-spacing: 0.5px; color: #fff; margin: 6px 0 12px; text-transform: uppercase; }
        .tl-texto p { font-size: 0.95rem; line-height: 1.75; color: #e6ecff; }

        .tl-item:nth-child(odd)  .tl-foto  { order: 1; }
        .tl-item:nth-child(odd)  .tl-texto { order: 2; text-align: left; }
        .tl-item:nth-child(even) .tl-texto { order: 1; text-align: right; }
        .tl-item:nth-child(even) .tl-foto  { order: 2; }

        .cierre { text-align: center; padding: 10px 30px 70px; }
        .cierre strong { display: block; font-family: 'Bebas Neue', Impact, sans-serif; font-weight: 400; font-size: 2.2rem; color: var(--oro); }
        .cierre span { color: #dbe4ff; font-size: 0.95rem; }

        .footer { text-align: center; padding: 25px 40px; color: var(--text-muted); font-size: 0.82rem; border-top: 1px solid var(--border); background: var(--bg-base); }

        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .top-header { padding-left: 20px; padding-right: 20px; }
            .timeline::before { left: 22px; }
            .tl-item { grid-template-columns: 1fr; gap: 16px; padding-left: 48px; margin: 50px 0; }
            .tl-item::after { left: 22px; }
            .tl-item:nth-child(n) .tl-foto  { order: 1; }
            .tl-item:nth-child(n) .tl-texto { order: 2; text-align: left; }
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
            <h2>Historia de Boca Juniors</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <section class="historia-hero">
                <div class="historia-anios">1905 <span class="estrella">★</span> 2026</div>
                <h1>Nuestra Historia</h1>
            </section>

            <div class="datos">
                <?php foreach ($datos as [$numero, $texto]): ?>
                    <div class="dato"><strong><?= h($numero) ?></strong><span><?= h($texto) ?></span></div>
                <?php endforeach; ?>
            </div>

            <section class="timeline">
                <?php foreach ($hitos as $hito): ?>
                    <article class="tl-item">
                        <div class="tl-foto">
                            <?php if (!empty($hito['foto'])): ?>
                                <img src="<?= h($hito['foto']) ?>" alt="<?= h($hito['titulo']) ?>" loading="lazy">
                            <?php else: ?>
                                📷 Foto de <?= h($hito['anio']) ?>
                            <?php endif; ?>
                        </div>
                        <div class="tl-texto">
                            <div class="tl-anio"><?= h($hito['anio']) ?></div>
                            <div class="tl-titulo"><?= h($hito['titulo']) ?></div>
                            <p><?= h($hito['texto']) ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </section>

            <div class="cierre">
                <strong>La historia sigue</strong>
                <span>Cada temporada suma una página nueva al libro de Boca.</span>
            </div>

        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        // Cada hito aparece con un fundido cuando entra en pantalla
        const items = document.querySelectorAll('.tl-item');
        if ('IntersectionObserver' in window) {
            const obs = new IntersectionObserver((entradas) => {
                entradas.forEach(e => { if (e.isIntersecting) { e.target.classList.add('visible'); obs.unobserve(e.target); } });
            }, { threshold: 0.25 });
            items.forEach(i => obs.observe(i));
        } else {
            items.forEach(i => i.classList.add('visible'));
        }
    </script>

</body>
</html>