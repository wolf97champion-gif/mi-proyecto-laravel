<?php
/* ============================================================
   FORO Y DEBATES — El Punto de Encuentro
   ------------------------------------------------------------
   Sistema de foro REAL y EN VIVO:
   - Los comentarios se guardan en el SERVIDOR
     (storage/app/datos/foro.json), FUERA de public/.
   - Todos los visitantes ven los MISMOS comentarios.
   - La página se actualiza sola cada pocos segundos (fetch).
   - Botón de reinicio protegido con la contraseña de admin.

   OJO (Render plan free): al hacer un redeploy, el disco se
   borra y los comentarios vuelven a cero. Es normal del plan.
   ============================================================ */

// Carpeta de datos FUERA de public/ (privada).
$dirDatos = __DIR__ . '/../storage/app/datos';
if (!is_dir($dirDatos)) { @mkdir($dirDatos, 0775, true); }
$archForo = $dirDatos . '/foro.json';

// Misma clave que el panel admin (cambiala o usala como env en Render).
$CLAVE_ADMIN = getenv('ADMIN_CLAVE') ?: 'CambiaEstaClave2026';

function foro_leer(string $arch): array {
    if (!is_file($arch)) return [];
    $fp = fopen($arch, 'r'); if (!$fp) return [];
    $out = [];
    if (flock($fp, LOCK_SH)) {
        $c = stream_get_contents($fp);
        flock($fp, LOCK_UN);
        $d = json_decode($c ?: '[]', true) ?: [];
        $out = (isset($d['comentarios']) && is_array($d['comentarios'])) ? $d['comentarios'] : [];
    }
    fclose($fp);
    return $out;
}
function foro_guardar(string $arch, array $lista): void {
    $fp = fopen($arch, 'c+'); if (!$fp) return;
    if (flock($fp, LOCK_EX)) {
        ftruncate($fp, 0); rewind($fp);
        fwrite($fp, json_encode(['comentarios' => $lista], JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
        fflush($fp); flock($fp, LOCK_UN);
    }
    fclose($fp);
}

/* -------- API que llama el navegador con fetch() -------- */
$api = $_GET['api'] ?? null;
if ($api !== null) {
    header('Content-Type: application/json; charset=utf-8');
    $metodo = $_SERVER['REQUEST_METHOD'] ?? 'GET';

    if ($api === 'list') {
        echo json_encode(['ok' => true, 'comentarios' => foro_leer($archForo)], JSON_UNESCAPED_UNICODE);
        exit;
    }
    if ($api === 'nuevo' && $metodo === 'POST') {
        $autor = trim((string)($_POST['autor'] ?? ''));
        $texto = trim((string)($_POST['texto'] ?? ''));
        $autor = mb_substr($autor, 0, 40);
        $texto = mb_substr($texto, 0, 500);
        if ($autor === '' || $texto === '') {
            echo json_encode(['ok' => false, 'error' => 'Completá tu nombre y el mensaje.']); exit;
        }
        $lista = foro_leer($archForo);
        array_unshift($lista, ['autor' => $autor, 'texto' => $texto, 'ts' => time()]);
        $lista = array_slice($lista, 0, 200); // guardamos como máximo 200
        foro_guardar($archForo, $lista);
        echo json_encode(['ok' => true]); exit;
    }
    if ($api === 'reset' && $metodo === 'POST') {
        $clave = (string)($_POST['clave'] ?? '');
        if (!hash_equals($CLAVE_ADMIN, $clave)) {
            echo json_encode(['ok' => false, 'error' => 'Clave incorrecta.']); exit;
        }
        foro_guardar($archForo, []);
        echo json_encode(['ok' => true]); exit;
    }
    echo json_encode(['ok' => false, 'error' => 'Acción no válida.']); exit;
}

// Solo contamos la visita en la vista normal (NO en las llamadas de la API).
require __DIR__ . '/tracker.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro y Debates | El Punto de Encuentro</title>
    <style>
        :root {
            --bg-base: #07090e; --bg-surface: #0f131c; --bg-surface-hover: #161b26;
            --bg-active: rgba(245, 158, 11, 0.12); --accent: #f59e0b; --accent-glow: rgba(245, 158, 11, 0.15);
            --text-main: #f3f4f6; --text-muted: #9ca3af; --border: rgba(255, 255, 255, 0.08);
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
        .sidebar-link .badge-soon { margin-left: auto; font-size: 0.62rem; background: var(--border); color: var(--text-muted); padding: 2px 7px; border-radius: 20px; font-weight: 700; }
        .sidebar-divider { height: 1px; background: var(--border); margin: 12px 0; }

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

        /* --- CONTENEDOR PRINCIPAL (MÁS ANCHO) --- */
        .main-wrapper { margin-left: 270px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; width: calc(100% - 270px); }
        .top-header { padding: 20px 40px; border-bottom: 1px solid var(--border); background: rgba(7, 9, 14, 0.85); backdrop-filter: blur(10px); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 999; }
        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }
        .content-container { padding: 35px 45px; display: flex; flex-direction: column; gap: 25px; width: 100%; max-width: 1500px; margin: 0 auto; flex: 1; }

        .hero-section { background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%); border: 1px solid var(--border); border-radius: 16px; padding: 30px; text-align: center; box-shadow: var(--shadow); }
        .hero-section h1 { font-size: 2rem; font-weight: 800; margin-bottom: 8px; color: #fff; }
        .hero-section h1 span { color: var(--accent); }
        .hero-section p { color: var(--text-muted); font-size: 0.95rem; max-width: 760px; margin: 0 auto; line-height: 1.5; }

        /* --- FORO --- */
        .foro-grid { display: grid; grid-template-columns: 1fr 360px; gap: 25px; align-items: start; }
        @media (max-width: 950px) { .foro-grid { grid-template-columns: 1fr; } }

        .card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 16px; padding: 25px; box-shadow: var(--shadow); }
        .card-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin-bottom: 15px; display: flex; align-items: center; gap: 8px; }
        .card-title .live-dot { width: 9px; height: 9px; border-radius: 50%; background: #22c55e; display: inline-block; animation: pulse 1.5s infinite; }
        @keyframes pulse { 0%,100% { opacity: 1; } 50% { opacity: 0.3; } }
        .contador-msg { margin-left: auto; font-size: 0.75rem; color: var(--text-muted); font-weight: 600; }

        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--text-muted); margin-bottom: 6px; }
        .form-control { width: 100%; background: var(--bg-base); border: 1px solid var(--border); border-radius: 10px; padding: 12px; color: var(--text-main); font-size: 0.9rem; outline: none; transition: border-color 0.2s; }
        .form-control:focus { border-color: var(--accent); }
        textarea.form-control { resize: vertical; min-height: 100px; }
        .char-count { font-size: 0.7rem; color: var(--text-muted); text-align: right; margin-top: 4px; }

        .btn-enviar { background: var(--accent); color: #000; border: none; padding: 12px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; width: 100%; transition: transform 0.2s, background 0.2s; }
        .btn-enviar:hover { background: #fbbf24; transform: translateY(-1px); }
        .btn-enviar:disabled { opacity: 0.6; cursor: not-allowed; transform: none; }
        .form-msg { font-size: 0.8rem; margin-top: 10px; text-align: center; min-height: 18px; }
        .form-msg.err { color: #f87171; }
        .form-msg.ok { color: #22c55e; }

        .comentarios-list { display: flex; flex-direction: column; gap: 15px; max-height: 620px; overflow-y: auto; padding-right: 5px; }
        .comentario-item { background: var(--bg-base); border: 1px solid var(--border); border-radius: 12px; padding: 15px; display: flex; flex-direction: column; gap: 8px; animation: aparecer 0.3s ease; }
        @keyframes aparecer { from { opacity: 0; transform: translateY(-6px); } to { opacity: 1; transform: none; } }
        .comentario-header { display: flex; justify-content: space-between; align-items: center; gap: 10px; }
        .comentario-autor { font-weight: 700; color: var(--accent); font-size: 0.9rem; display: flex; align-items: center; gap: 6px; }
        .comentario-fecha { font-size: 0.72rem; color: var(--text-muted); white-space: nowrap; }
        .comentario-texto { font-size: 0.88rem; color: var(--text-main); line-height: 1.4; word-break: break-word; }
        .vacio { color: var(--text-muted); font-size: 0.85rem; text-align: center; padding: 30px 10px; }

        .debate-destacado { background: linear-gradient(135deg, rgba(0, 50, 160, 0.25) 0%, rgba(245, 158, 11, 0.15) 100%); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 25px; text-align: center; display: flex; flex-direction: column; gap: 12px; }
        .debate-destacado h3 { color: #fff; font-size: 1.1rem; font-weight: 800; }
        .debate-destacado p { color: var(--text-main); font-size: 0.88rem; line-height: 1.4; }

        .btn-reset { background: transparent; color: var(--text-muted); border: 1px solid var(--border); padding: 10px; border-radius: 10px; font-size: 0.8rem; font-weight: 600; cursor: pointer; width: 100%; transition: 0.2s; }
        .btn-reset:hover { border-color: #f87171; color: #f87171; }

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
            <a href="foro.php" class="sidebar-link active"><span class="icon">💬</span> Foro y Debates</a>
            <a href="plantel.php" class="sidebar-link"><span class="icon">👥</span> Plantel Actual</a>

            <div class="sidebar-divider"></div>
            <div class="menu-label">Archivo Histórico</div>
            <a href="#" class="sidebar-link"><span class="icon">📜</span> Sección de Historia <span class="badge-soon">Pronto</span></a>
        </div>

        <div class="sidebar-footer">
            <div class="menu-label" style="padding-left:0; margin-bottom: 2px;">Redes Oficiales</div>
            <div class="sidebar-socials">
                <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" rel="noopener" class="social-pill youtube">YouTube</a>
                <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" rel="noopener" class="social-pill tiktok">TikTok</a>
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
            <h2>Foro y Debates de la Comunidad</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">
            <div class="hero-section">
                <h1>El Rincón de la <span>Mitad + 1</span></h1>
                <p>Dejá tu opinión sobre el equipo, armá debate y leemos los mejores mensajes en los directos de YouTube y TikTok. ¡Acá los comentarios son en vivo y los ven todos!</p>
            </div>

            <div class="foro-grid">
                <!-- IZQUIERDA: escribir + ver -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    <div class="card">
                        <div class="card-title">✍️ Dejá tu Opinión</div>
                        <form id="formComentario">
                            <div class="form-group">
                                <label for="nombre">Tu Nombre o Apodo Hinchada</label>
                                <input type="text" id="nombre" class="form-control" placeholder="Ej: BosteroSoy99" maxlength="40" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">¿Qué opinás del equipo o del próximo partido?</label>
                                <textarea id="mensaje" class="form-control" placeholder="Escribí tu análisis acá..." maxlength="500" required></textarea>
                                <div class="char-count"><span id="charCount">0</span>/500</div>
                            </div>
                            <button type="submit" class="btn-enviar" id="btnEnviar">Publicar Opinión 🚀</button>
                            <div class="form-msg" id="formMsg"></div>
                        </form>
                    </div>

                    <div class="card">
                        <div class="card-title">
                            <span class="live-dot"></span> Opiniones de la Tribuna
                            <span class="contador-msg" id="contadorMsg">Cargando…</span>
                        </div>
                        <div class="comentarios-list" id="listaComentarios">
                            <div class="vacio">Cargando comentarios…</div>
                        </div>
                    </div>
                </div>

                <!-- DERECHA: tema + streams + reinicio -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="debate-destacado">
                        <div style="font-size: 2.5rem;">💙💛💙</div>
                        <h3>TEMA DE LA SEMANA</h3>
                        <p>¿Quién tiene que ser el 9 titular indiscutido para lo que viene del torneo? ¡Dejate el argumento en el foro!</p>
                    </div>

                    <div class="card">
                        <div class="card-title">📺 Directos y Streams</div>
                        <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5; margin-bottom: 15px;">¡No te olvides de suscribirte al canal de YouTube para salir en vivo analizando todas las respuestas de este foro!</p>
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" rel="noopener" class="btn-enviar" style="text-decoration:none; text-align:center; display:block;">Ir al Canal de YouTube</a>
                    </div>

                    <div class="card">
                        <div class="card-title">🧹 Moderación</div>
                        <p style="color: var(--text-muted); font-size: 0.82rem; line-height: 1.5; margin-bottom: 15px;">Botón solo para vos: borra TODOS los comentarios del foro. Te pide la contraseña de admin.</p>
                        <button class="btn-reset" type="button" onclick="reiniciarForo()">🗑️ Reiniciar foro (borrar todo)</button>
                    </div>
                </div>
            </div>
        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        const form = document.getElementById('formComentario');
        const lista = document.getElementById('listaComentarios');
        const btnEnviar = document.getElementById('btnEnviar');
        const formMsg = document.getElementById('formMsg');
        const contadorMsg = document.getElementById('contadorMsg');
        const inputMsg = document.getElementById('mensaje');
        const charCount = document.getElementById('charCount');

        function escapeHtml(t){ return String(t).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;'); }

        // Convierte el timestamp del servidor en "hace X"
        function tiempoRelativo(ts){
            const seg = Math.floor(Date.now()/1000) - ts;
            if (seg < 60) return 'Recién publicado';
            const min = Math.floor(seg/60);
            if (min < 60) return 'Hace ' + min + (min===1?' minuto':' minutos');
            const hs = Math.floor(min/60);
            if (hs < 24) return 'Hace ' + hs + (hs===1?' hora':' horas');
            const dias = Math.floor(hs/24);
            return 'Hace ' + dias + (dias===1?' día':' días');
        }

        function pintar(comentarios){
            if (!comentarios.length){
                lista.innerHTML = '<div class="vacio">Todavía no hay comentarios. ¡Sé el primero en opinar! 🔵🟡</div>';
                contadorMsg.textContent = '0 mensajes';
                return;
            }
            contadorMsg.textContent = comentarios.length + (comentarios.length===1?' mensaje':' mensajes');
            lista.innerHTML = comentarios.map(c => `
                <div class="comentario-item">
                    <div class="comentario-header">
                        <span class="comentario-autor">🔵🟡 ${escapeHtml(c.autor)}</span>
                        <span class="comentario-fecha">${escapeHtml(tiempoRelativo(c.ts||0))}</span>
                    </div>
                    <div class="comentario-texto">${escapeHtml(c.texto)}</div>
                </div>`).join('');
        }

        async function cargar(){
            try {
                const r = await fetch('foro.php?api=list', { cache: 'no-store' });
                const d = await r.json();
                if (d.ok) pintar(d.comentarios || []);
            } catch(e){ /* si falla, reintenta en el próximo ciclo */ }
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const autor = document.getElementById('nombre').value.trim();
            const texto = inputMsg.value.trim();
            if (!autor || !texto){ formMsg.className='form-msg err'; formMsg.textContent='Completá tu nombre y el mensaje.'; return; }
            btnEnviar.disabled = true; formMsg.className='form-msg'; formMsg.textContent='Publicando…';
            try {
                const body = new URLSearchParams({ autor, texto });
                const r = await fetch('foro.php?api=nuevo', { method:'POST', body });
                const d = await r.json();
                if (d.ok){
                    formMsg.className='form-msg ok'; formMsg.textContent='¡Publicado! 🚀';
                    form.reset(); charCount.textContent='0';
                    await cargar();
                    setTimeout(()=>{ formMsg.textContent=''; }, 2500);
                } else {
                    formMsg.className='form-msg err'; formMsg.textContent = d.error || 'No se pudo publicar.';
                }
            } catch(e){
                formMsg.className='form-msg err'; formMsg.textContent='Error de conexión. Probá de nuevo.';
            } finally { btnEnviar.disabled = false; }
        });

        async function reiniciarForo(){
            const clave = prompt('Para BORRAR TODOS los comentarios, ingresá la contraseña de admin:');
            if (clave === null || clave === '') return;
            try {
                const body = new URLSearchParams({ clave });
                const r = await fetch('foro.php?api=reset', { method:'POST', body });
                const d = await r.json();
                if (d.ok){ alert('Foro reiniciado. ✅'); cargar(); }
                else { alert(d.error || 'No se pudo reiniciar.'); }
            } catch(e){ alert('Error de conexión.'); }
        }

        function copiarAlias(){
            const alias = document.getElementById('mpAlias').textContent.trim();
            navigator.clipboard?.writeText(alias).then(()=>{
                const b = document.querySelector('.mp-copy'); const o=b.textContent; b.textContent='¡Copiado!';
                setTimeout(()=> b.textContent=o, 1500);
            });
        }

        inputMsg.addEventListener('input', ()=>{ charCount.textContent = inputMsg.value.length; });

        // Cargar al inicio y refrescar solo cada 8 segundos (en vivo).
        cargar();
        setInterval(cargar, 8000);
    </script>

</body>
</html>
