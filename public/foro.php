<?php require __DIR__ . '/tracker.php'; ?>
<?php

$actualizado = '20/09/2026';
function h($v): string { return htmlspecialchars((string)$v); }
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
        .sidebar-divider { height: 1px; background: var(--border); margin: 12px 0; }
        
        .sidebar-footer { padding-top: 15px; border-top: 1px solid var(--border); }
        .sidebar-socials { display: flex; gap: 8px; margin-top: 8px; }
        .social-pill { flex: 1; padding: 8px; border-radius: 8px; font-size: 0.78rem; font-weight: 600; text-align: center; text-decoration: none; background: var(--bg-base); color: var(--text-main); border: 1px solid var(--border); transition: 0.2s; }
        .social-pill.youtube:hover { background: #cc0000; border-color: #cc0000; color: #fff; }
        .social-pill.tiktok:hover { background: #ff0050; border-color: #ff0050; color: #fff; }

        /* --- CONTENEDOR PRINCIPAL --- */
        .main-wrapper { margin-left: 270px; flex: 1; display: flex; flex-direction: column; min-height: 100vh; width: calc(100% - 270px); }
        .top-header { padding: 20px 40px; border-bottom: 1px solid var(--border); background: rgba(7, 9, 14, 0.85); backdrop-filter: blur(10px); display: flex; justify-content: space-between; align-items: center; position: sticky; top: 0; z-index: 999; }
        .top-header h2 { font-size: 1.15rem; font-weight: 700; color: #fff; }
        .content-container { padding: 35px 40px; display: flex; flex-direction: column; gap: 25px; width: 100%; flex: 1; max-width: 1100px; margin: 0 auto; }

        .hero-section { background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%); border: 1px solid var(--border); border-radius: 16px; padding: 30px; text-align: center; box-shadow: var(--shadow); }
        .hero-section h1 { font-size: 1.9rem; font-weight: 800; margin-bottom: 8px; color: #fff; }
        .hero-section h1 span { color: var(--accent); }
        .hero-section p { color: var(--text-muted); font-size: 0.95rem; max-width: 700px; margin: 0 auto; line-height: 1.5; }


        /* --- ESTILOS DEL FORO --- */
        .foro-grid { display: grid; grid-template-columns: 1fr 350px; gap: 25px; }
        @media(max-width: 950px) { .foro-grid { grid-template-columns: 1fr; } }

        .card { background: var(--bg-surface); border: 1px solid var(--border); border-radius: 16px; padding: 25px; box-shadow: var(--shadow); }
        .card-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin-bottom: 15px; display: flex; align-items: center; gap: 8px; }

        /* Formulario de comentarios */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 0.82rem; font-weight: 600; color: var(--text-muted); margin-bottom: 6px; }
        .form-control { width: 100%; background: var(--bg-base); border: 1px solid var(--border); border-radius: 10px; padding: 12px; color: var(--text-main); font-size: 0.9rem; outline: none; transition: border-color 0.2s; }
        .form-control:focus { border-color: var(--accent); }
        textarea.form-control { resize: vertical; min-height: 100px; }

        .btn-enviar { background: var(--accent); color: #000; border: none; padding: 12px 20px; border-radius: 10px; font-weight: 700; cursor: pointer; width: 100%; transition: transform 0.2s, background 0.2s; }
        .btn-enviar:hover { background: #fbbf24; transform: translateY(-1px); }

        /* Lista de opiniones */
        .comentarios-list { display: flex; flex-direction: column; gap: 15px; max-height: 600px; overflow-y: auto; padding-right: 5px; }
        .comentario-item { background: var(--bg-base); border: 1px solid var(--border); border-radius: 12px; padding: 15px; display: flex; flex-direction: column; gap: 8px; }
        .comentario-header { display: flex; justify-content: space-between; align-items: center; }
        .comentario-autor { font-weight: 700; color: var(--accent); font-size: 0.9rem; display: flex; align-items: center; gap: 6px; }
        .comentario-fecha { font-size: 0.72rem; color: var(--text-muted); }
        .comentario-texto { font-size: 0.88rem; color: var(--text-main); line-height: 1.4; }

        /* Caja lateral de Debate Destacado */
        .debate-destacado { background: linear-gradient(135deg, rgba(0, 50, 160, 0.25) 0%, rgba(245, 158, 11, 0.15) 100%); border: 1px solid rgba(245, 158, 11, 0.25); border-radius: 16px; padding: 25px; text-align: center; display: flex; flex-direction: column; gap: 12px; }
        .debate-destacado h3 { color: #fff; font-size: 1.1rem; font-weight: 800; }
        .debate-destacado p { color: var(--text-main); font-size: 0.88rem; line-height: 1.4; }

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
            <h2>Foro y Debates de la Comunidad</h2>
            <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
        </header>

        <main class="content-container">

            <div class="hero-section">
                <h1>El Rincón de la <span>Mitad + 1</span></h1>
                <p>Dejá tu opinión sobre el equipo, armá debate y leemos los mejores mensajes en los directos de YouTube y TikTok.</p>
            </div>

            <div class="foro-grid">
                
                <!-- Columna Izquierda: Escribir y ver comentarios -->
                <div style="display: flex; flex-direction: column; gap: 25px;">
                    
                    <!-- Tarjeta para dejar comentario -->
                    <div class="card">
                        <div class="card-title">✍️ Dejá tu Opinión</div>
                        <form id="formComentario">
                            <div class="form-group">
                                <label for="nombre">Tu Nombre o Apodo Hinchada</label>
                                <input type="text" id="nombre" class="form-control" placeholder="Ej: BosteroSoy99" required>
                            </div>
                            <div class="form-group">
                                <label for="mensaje">¿Qué opinas del equipo o del próximo partido?</label>
                                <textarea id="mensaje" class="form-control" placeholder="Escribí tu análisis acá..." required></textarea>
                            </div>
                            <button type="submit" class="btn-enviar">Publicar Opinión 🚀</button>
                        </form>
                    </div>

                    <!-- Tarjeta con el feed de opiniones -->
                    <div class="card">
                        <div class="card-title">🔥 Opiniones Recientes de la Tribuna</div>
                        <div class="comentarios-list" id="listaComentarios">
                            <!-- Los comentarios se cargan dinámicamente con JS -->
                        </div>
                    </div>

                    
                </div>

                <!-- Columna Derecha: Tema central de debate -->
                <div style="display: flex; flex-direction: column; gap: 20px;">
                    <div class="debate-destacado">
                        <div style="font-size: 2.5rem;">💙💛💙</div>
                        <h3>TEMA DE LA SEMANA</h3>
                        <p>¿Quién tiene que ser el 9 titular indiscutido para lo que viene del torneo? ¡Dejate el argumento en el foro!</p>
                    </div>

                    <div class="card">
                        <div class="card-title">📺 Directos y Streams</div>
                        <p style="color: var(--text-muted); font-size: 0.88rem; line-height: 1.5; margin-bottom: 15px;">
                            ¡No te olvides de suscribirte al canal de YouTube para salir en vivo analizando todas las respuestas de este foro!
                        </p>
                        <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" class="btn-enviar" style="text-decoration:none; text-align:center; display:block;">Ir al Canal de YouTube</a>
                    </div>
                </div>

            </div>

        </main>

        <footer class="footer">
            <p>&copy; 2026 EL PUNTO DE ENCUENTRO. Todos los derechos reservados.</p>
        </footer>
    </div>

    <script>
        // Sistema simple de comentarios con localStorage para interactividad inmediata
        const form = document.getElementById('formComentario');
        const lista = document.getElementById('listaComentarios');

        // Comentarios iniciales de ejemplo
        let comentarios = JSON.parse(localStorage.getItem('foro_boca')) || [
            { autor: 'Juan_Bostero', texto: 'El equipo mejoró un montón en defensa, hay que ganar los tres puntos de local sí o sí.', fecha: 'Hace 15 minutos' },
            { autor: 'Marce_Xeneize', texto: 'Totalmente de acuerdo. Para mí los pibes tienen que tener más minutos en el medio.', fecha: 'Hace 1 hora' }
        ];

        function renderComentarios() {
            lista.innerHTML = '';
            comentarios.forEach(c => {
                const item = document.createElement('div');
                item.className = 'comentario-item';
                item.innerHTML = `
                    <div class="comentario-header">
                        <span class="comentario-autor">🔵🟡 ${escapeHtml(c.autor)}</span>
                        <span class="comentario-fecha">${escapeHtml(c.fecha)}</span>
                    </div>
                    <div class="comentario-texto">${escapeHtml(c.texto)}</div>
                `;
                lista.appendChild(item);
            });
        }

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const autor = document.getElementById('nombre').value.trim();
            const texto = document.getElementById('mensaje').value.trim();

            if(autor && texto) {
                const nuevoComentario = {
                    autor: autor,
                    texto: texto,
                    fecha: 'Recién publicado'
                };
                comentarios.unshift(nuevoComentorrio = nuevoComentario); // Agregar al principio
                localStorage.setItem('foro_boca', JSON.stringify(comentarios));
                
                renderComentarios();
                form.reset();
            }
        });

        function escapeHtml(text) {
            return text.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;");
        }

        // Cargar al iniciar
        renderComentarios();
    </script>

</body>
</html>