<?php require __DIR__ . '/tracker.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Punto de Encuentro | Biblioteca de Historia</title>
    <link rel="icon" type="image/png" href="data:image/png;base64,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">
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
            --danger: #ef4444;
            --success: #10b981;
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
        /* --- BARRA LATERAL --- */
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
        .sidebar-brand span {
            color: var(--accent);
        }
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
        .sidebar-link span.icon {
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
        .top-header h2 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #fff;
        }
        .content-container {
            padding: 35px 40px;
            display: flex;
            flex-direction: column;
            gap: 25px;
            width: 100%;
            max-width: 100%;
            margin: 0;
            flex: 1;
        }
        .hero-section {
            background: linear-gradient(135deg, var(--bg-surface) 0%, #121926 100%);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 35px;
            text-align: center;
            box-shadow: var(--shadow);
            width: 100%;
        }
        .creator-tag {
            display: inline-block;
            padding: 5px 16px;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 20px;
            font-size: 0.75rem;
            color: var(--accent);
            font-weight: 700;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }
        .hero-section h1 {
            font-size: 2.1rem;
            font-weight: 800;
            margin-bottom: 8px;
            color: #fff;
        }
        .hero-section h1 span {
            color: var(--accent);
        }
        .hero-section p {
            color: var(--text-muted);
            font-size: 0.95rem;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.5;
        }
        .seccion-titulo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 1.3rem;
            font-weight: 800;
            color: #fff;
            margin-bottom: 4px;
        }
        .seccion-titulo .barra {
            width: 5px;
            height: 26px;
            background: var(--accent);
            border-radius: 4px;
        }
        /* --- BOTÓN SUBIR --- */
        .subir-libro {
            align-self: flex-start;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.15) 0%, rgba(16, 185, 129, 0.05) 100%);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: #34d399;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        .subir-libro:hover {
            background: rgba(16, 185, 129, 0.25);
            transform: translateY(-2px);
        }
        /* --- GRILLA DE LIBROS --- */
        .biblioteca-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 22px;
            width: 100%;
        }
        .libro-card {
            background: var(--bg-surface);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: var(--shadow);
            display: flex;
            flex-direction: column;
            transition: transform 0.2s ease, border-color 0.2s ease;
            position: relative;
        }
        .libro-card:hover {
            transform: translateY(-5px);
            border-color: rgba(245, 158, 11, 0.4);
        }
        .libro-portada {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3.6rem;
            background: linear-gradient(135deg, rgba(0, 50, 160, 0.35) 0%, rgba(245, 158, 11, 0.18) 100%);
            border-bottom: 1px solid var(--border);
        }
        .libro-info {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }
        .libro-cat {
            align-self: flex-start;
            background: var(--accent-glow);
            border: 1px solid rgba(245, 158, 11, 0.3);
            color: var(--accent);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .libro-titulo {
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
            line-height: 1.3;
        }
        .libro-autor {
            color: var(--text-muted);
            font-size: 0.82rem;
            font-style: italic;
            margin: 0 !important;
        }
        .libro-desc {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.5;
            flex: 1;
        }
        /* --- BOTONES DE ACCIÓN --- */
        .libro-botones {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            margin-top: 12px;
        }
        .btn-descargar, .btn-copiar, .btn-borrar {
            padding: 9px 12px;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 600;
            text-decoration: none;
            text-align: center;
            cursor: pointer;
            border: none;
            transition: 0.2s;
        }
        .btn-descargar {
            background: var(--accent);
            color: #000;
        }
        .btn-descargar:hover {
            background: #fbbf24;
        }
        .btn-copiar {
            background: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        .btn-copiar:hover {
            background: rgba(59, 130, 246, 0.25);
        }
        .btn-copiar.copiado {
            background: rgba(16, 185, 129, 0.15);
            color: #34d399;
            border-color: rgba(16, 185, 129, 0.3);
        }
        .btn-borrar {
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.25);
        }
        .btn-borrar:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }
        /* --- FOOTER --- */
        .footer {
            text-align: center;
            padding: 25px 40px;
            color: var(--text-muted);
            font-size: 0.82rem;
            border-top: 1px solid var(--border);
            margin-top: auto;
        }
        /* --- FONDO ANIMADO --- */
        .bg-animado {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            opacity: 0;
            animation: flotar linear infinite;
        }
        @keyframes flotar {
            0% { opacity: 0; transform: translateY(100vh) scale(0); }
            10% { opacity: 0.6; }
            90% { opacity: 0.6; }
            100% { opacity: 0; transform: translateY(-10vh) scale(1); }
        }
        .flash {
            position: absolute;
            width: 6px; height: 6px;
            border-radius: 50%;
            opacity: 0;
            background: #fff;
            animation: destello 4s ease-in-out infinite;
        }
        @keyframes destello {
            0% { opacity: 0; transform: scale(0.5); }
            5% { opacity: 0.9; transform: scale(2.5); box-shadow: 0 0 20px 8px rgba(255,255,255,0.5); }
            10% { opacity: 0; transform: scale(0.5); }
            100% { opacity: 0; }
        }
        .sidebar, .main-wrapper {
            position: relative;
            z-index: 1;
        }
        /* --- RESPONSIVE --- */
        @media (max-width: 850px) {
            body { flex-direction: column; }
            .sidebar { position: relative; width: 100%; height: auto; }
            .main-wrapper { margin-left: 0; width: 100%; }
            .biblioteca-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<!-- FONDO ANIMADO -->
<div class="bg-animado">
    <div class="particle" style="left:5%;  width:8px; height:8px; background:#0055A0; animation-duration:14s; animation-delay:0s;"></div>
    <div class="particle" style="left:12%; width:5px; height:5px; background:#F5B301; animation-duration:18s; animation-delay:2s;"></div>
    <div class="particle" style="left:22%; width:10px;height:10px;background:#0055A0; animation-duration:16s; animation-delay:4s;"></div>
    <div class="particle" style="left:30%; width:6px; height:6px; background:#F5B301; animation-duration:20s; animation-delay:1s;"></div>
    <div class="particle" style="left:38%; width:9px; height:9px; background:#0055A0; animation-duration:15s; animation-delay:6s;"></div>
    <div class="particle" style="left:48%; width:4px; height:4px; background:#F5B301; animation-duration:22s; animation-delay:3s;"></div>
    <div class="particle" style="left:55%; width:7px; height:7px; background:#0055A0; animation-duration:17s; animation-delay:5s;"></div>
    <div class="particle" style="left:63%; width:11px;height:11px;background:#F5B301; animation-duration:13s; animation-delay:7s;"></div>
    <div class="particle" style="left:70%; width:5px; height:5px; background:#0055A0; animation-duration:19s; animation-delay:2s;"></div>
    <div class="particle" style="left:78%; width:8px; height:8px; background:#F5B301; animation-duration:16s; animation-delay:4s;"></div>
    <div class="particle" style="left:85%; width:6px; height:6px; background:#0055A0; animation-duration:21s; animation-delay:1s;"></div>
    <div class="particle" style="left:92%; width:9px; height:9px; background:#F5B301; animation-duration:14s; animation-delay:6s;"></div>
    <div class="flash" style="left:10%; top:20%; animation-delay:0s;"></div>
    <div class="flash" style="left:25%; top:45%; animation-delay:0.8s;"></div>
    <div class="flash" style="left:45%; top:15%; animation-delay:1.6s;"></div>
    <div class="flash" style="left:60%; top:65%; animation-delay:2.4s;"></div>
    <div class="flash" style="left:80%; top:30%; animation-delay:3.2s;"></div>
</div>
<!-- BARRA LATERAL -->
<aside class="sidebar">
    <a href="index.php" class="sidebar-brand">⚡ <span>PUNTO DE ENCUENTRO</span></a>
    <div class="sidebar-menu">
        <div class="menu-label">Menú Principal</div>
        <a href="index.php" class="sidebar-link">
            <span class="icon">🏠</span> Inicio
        </a>
        <a href="podio.php" class="sidebar-link">
            <span class="icon">🏆</span> Podio de Jugadores
        </a>
        <a href="estadisticas.php" class="sidebar-link">
            <span class="icon">📊</span> Estadísticas
        </a>
        <a href="foro.php" class="sidebar-link">
            <span class="icon">💬</span> Foro y Debates
        </a>
        <a href="plantel.php" class="sidebar-link">
            <span class="icon">👥</span> Plantel Actual
        </a>
        <a href="noticias.php" class="sidebar-link">
            <span class="icon">📰</span> Noticias
        </a>
        <div class="sidebar-divider"></div>
        <div class="menu-label">Archivo Histórico</div>
        <a href="historia.php" class="sidebar-link active">
            <span class="icon">📜</span> Sección de Historia
        </a>
    </div>
    <div class="sidebar-footer">
        <div class="menu-label" style="padding-left:0; margin-bottom: 2px;">Redes Oficiales</div>
        <div class="sidebar-socials">
            <a href="https://www.youtube.com/@PuntoDeEncuentroYT" target="_blank" rel="noopener" class="social-pill youtube">YouTube</a>
            <a href="https://www.tiktok.com/@michaelnovoa16" target="_blank" rel="noopener" class="social-pill tiktok">TikTok</a>
        </div>
    </div>
</aside>
<!-- CONTENIDO PRINCIPAL -->
<div class="main-wrapper">
    <header class="top-header">
        <h2>📜 Biblioteca de Historia Mundial</h2>
        <span style="font-size: 0.85rem; color: var(--text-muted);">Creado por Michael Novoa</span>
    </header>
    <main class="content-container">
        <!-- Presentación -->
        <div class="hero-section">
            <span class="creator-tag">Archivo Histórico</span>
            <h1>Mi <span>Biblioteca</span> Personal</h1>
            <p>Una colección de libros, textos y documentos sobre la historia del mundo. Un espacio para leer, consultar y guardar el conocimiento que me interesa compartir.</p>
        </div>
        <!-- Título + Botón Subir -->
        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            <div class="seccion-titulo"><span class="barra"></span> Libros y Textos</div>
            <button class="subir-libro" id="btnSubir">
                📤 Subir nuevo PDF
            </button>
        </div>
        <!-- GRILLA DE LIBROS -->
        <div class="biblioteca-grid" id="gridLibros">
            <!-- === LIBRO 1 === -->
            <div class="libro-card" data-id="1">
                <div class="libro-portada">🏺</div>
                <div class="libro-info">
                    <span class="libro-cat">Historia Universal</span>
                    <h3 class="libro-titulo">Breve historia del mundo</h3>
                    <p class="libro-autor">E. H. Gombrich</p>
                    <p class="libro-desc">Un recorrido ameno por la historia de la humanidad, pensado para entender el pasado de forma simple y clara.</p>
                    <div class="libro-botones">
                        <a href="archivos-pdf/breve-historia.pdf" class="btn-descargar" download>📥 Descargar</a>
                        <button class="btn-copiar" data-link="archivos-pdf/breve-historia.pdf">🔗 Copiar Enlace</button>
                    </div>
                    <button class="btn-borrar" style="margin-top: 8px; width: 100%;">🗑️ Borrar</button>
                </div>
            </div>
            <!-- === LIBRO 2 === -->
            <div class="libro-card" data-id="2">
                <div class="libro-portada">⚔️</div>
                <div class="libro-info">
                    <span class="libro-cat">Antigüedad</span>
                    <h3 class="libro-titulo">Historia de Grecia</h3>
                    <p class="libro-autor">Herodoto</p>
                    <p class="libro-desc">Los orígenes de la cultura occidental: guerras, mitos y la vida de las primeras ciudades-estado.</p>
                    <div class="libro-botones">
                        <a href="archivos-pdf/historia-grecia.pdf" class="btn-descargar" download>📥 Descargar</a>
                        <button class="btn-copiar" data-link="archivos-pdf/historia-grecia.pdf">🔗 Copiar Enlace</button>
                    </div>
                    <button class="btn-borrar" style="margin-top: 8px; width: 100%;">🗑️ Borrar</button>
                </div>
            </div>
            <!-- === Historia Argentina - Ternavasio === -->
           <div class="libro-card" data-id="ternavasio">
               <div class="libro-portada">🇦🇷</div>
               <div class="libro-info">
        <span class="libro-cat">Historia Argentina</span>
        <h3 class="libro-titulo">Historia de Argentina</h3>
        <p class="libro-autor">Marcela Ternavasio</p>
        <p class="libro-desc">Análisis y reflexión sobre la historia argentina contemporánea.</p>
        <div class="libro-botones">
            <a href="archivos-pdf/historia-argentina.pdf" class="btn-descargar" download>📥 Descargar</a>
            <button class="btn-copiar" data-ruta="archivos-pdf/historia-argentina.pdf">🔗 Copiar Enlace</button>
        </div>
    </div>
</div>
            <!-- === LIBRO 4 === -->
            <div class="libro-card" data-id="4">
                <div class="libro-portada">🏰</div>
                <div class="libro-info">
                    <span class="libro-cat">Edad Media</span>
                    <h3 class="libro-titulo">El otoño de la Edad Media</h3>
                    <p class="libro-autor">Johan Huizinga</p>
                    <p class="libro-desc">La vida, el arte y el pensamiento en los últimos siglos del mundo medieval europeo.</p>
                    <div class="libro-botones">
                        <a href="archivos-pdf/edad-media.pdf" class="btn-descargar" download>📥 Descargar</a>
                        <button class="btn-copiar" data-link="archivos-pdf/edad-media.pdf">🔗 Copiar Enlace</button>
                    </div>
                    <button class="btn-borrar" style="margin-top: 8px; width: 100%;">🗑️ Borrar</button>
                </div>
            </div>
            <!-- === LIBRO 5 === -->
            <div class="libro-card" data-id="5">
                <div class="libro-portada">🌍</div>
                <div class="libro-info">
                    <span class="libro-cat">Modernidad</span>
                    <h3 class="libro-titulo">Las venas abiertas de América Latina</h3>
                    <p class="libro-autor">Eduardo Galeano</p>
                    <p class="libro-desc">Una mirada crítica sobre la historia económica y política del continente americano.</p>
                    <div class="libro-botones">
                        <a href="archivos-pdf/venas-abiertas.pdf" class="btn-descargar" download>📥 Descargar</a>
                        <button class="btn-copiar" data-link="archivos-pdf/venas-abiertas.pdf">🔗 Copiar Enlace</button>
                    </div>
                    <button class="btn-borrar" style="margin-top: 8px; width: 100%;">🗑️ Borrar</button>
                </div>
            </div>
            <!-- === LIBRO 6 === -->
            <div class="libro-card" data-id="6">
                <div class="libro-portada">⚙️</div>
                <div class="libro-info">
                    <span class="libro-cat">Siglo XX</span>
                    <h3 class="libro-titulo">Historia del siglo XX</h3>
                    <p class="libro-autor">Eric Hobsbawm</p>
                    <p class="libro-desc">Guerras mundiales, revoluciones y los grandes cambios que dieron forma al mundo actual.</p>
                    <div class="libro-botones">
                        <a href="archivos-pdf/siglo-xx.pdf" class="btn-descargar" download>📥 Descargar</a>
                        <button class="btn-copiar" data-link="archivos-pdf/siglo-xx.pdf">🔗 Copiar Enlace</button>
                    </div>
                    <button class="btn-borrar" style="margin-top: 8px; width: 100%;">🗑️ Borrar</button>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer -->
    <div class="footer">
        &copy; 2026 El Punto de Encuentro — Biblioteca de Historia Mundial. Creado por Michael Novoa.
    </div>
</div>
<!-- JAVASCRIPT para los botones -->
<script>
    // Copiar enlace
    document.querySelectorAll('.btn-copiar').forEach(btn => {
        btn.addEventListener('click', function() {
            const enlace = window.location.origin + '/' + this.getAttribute('data-link');
            navigator.clipboard.writeText(enlace).then(() => {
                const textoOriginal = this.innerText;
                this.innerText = '✅ ¡Copiado!';
                this.classList.add('copiado');
                setTimeout(() => {
                    this.innerText = textoOriginal;
                    this.classList.remove('copiado');
                }, 2500);
            });
        });
    });
    // Borrar tarjeta
    document.querySelectorAll('.btn-borrar').forEach(btn => {
        btn.addEventListener('click', function() {
            if (confirm('¿Seguro que querés borrar este libro?')) {
                this.closest('.libro-card').style.opacity = '0';
                this.closest('.libro-card').style.transform = 'scale(0.8)';
                setTimeout(() => {
                    this.closest('.libro-card').remove();
                }, 300);
            }
        });
    });
    // Subir PDF
    document.getElementById('btnSubir').addEventListener('click', function() {
        alert('📤 Funcionalidad de subida en preparación.\n\nEn la siguiente etapa se conectará para guardar el PDF y aparecerá automáticamente en la biblioteca.');
    });
</script>
</body>
</html>