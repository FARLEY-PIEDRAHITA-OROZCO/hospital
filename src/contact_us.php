<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinica Securitas</title>
    <link rel="stylesheet" href="../public/css/contact_us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="clinic-name">
        <h1>Clínica Securitas</h1>
    </div>
    <div class="auth-buttons">
        <a href="../src/login.php" class="login">Iniciar sesión</a>
        <a href="../src/register.php" class="register">Registrarse</a>
    </div>  
    <header>
        <div class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <nav>
            <ul id="nav-list" class="nav-list">
                <li><a href="../src/index.php">Inicio</a></li>
                <li><a href="../src/about_us.php">Sobre nosotros</a></li>
                <li><a href="../src/services.php">Servicios</a></li>
                <li><a href="../src/contact_us.php">Contáctanos</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="hero">
            <img src="../public/img/portada.jpg" alt="Bienvenido a Clínica Securitas" class="hero-image">
            <h1>lineas de atención</h1>
        </div>
        <h2>Contáctanos</h2>
        <section class="contact-options">
            <div class="contact-item">
                <i class="fas fa-comments"></i>
                <h3>Chat Bot</h3>
                <p>Asistencia inmediata a través de nuestro chat en línea.</p>
            </div>
            <div class="contact-item">
                <i class="fab fa-whatsapp"></i>
                <h3>WhatsApp</h3>
                <p>Comunícate fácilmente mediante WhatsApp.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-globe"></i>
                <h3>Página Web</h3>
                <p>Visita nuestro sitio web para más información.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-sms"></i>
                <h3>SMS Masivos</h3>
                <p>Recibe notificaciones y actualizaciones por SMS.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-phone"></i>
                <h3>Líneas Telefónicas</h3>
                <p>Contáctanos a través de nuestras líneas telefónicas.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-envelope"></i>
                <h3>Correo Electrónico</h3>
                <p>Envíanos un correo para consultas y más.</p>
            </div>
            <div class="contact-item">
                <i class="fab fa-facebook"></i>
                <h3>Redes Sociales</h3>
                <p>Síguenos en nuestras redes sociales.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-mobile-alt"></i>
                <h3>App Móvil</h3>
                <p>Descarga nuestra app para una mejor experiencia.</p>
            </div>
            <div class="contact-item">
                <i class="fas fa-building"></i>
                <h3>Oficinas</h3>
                <p>Visítanos en nuestras oficinas.</p>
            </div>
        </section>
    </main>

</body>
<footer>
    <p>&copy; Clínica Securitas. Todos los derechos reservados.</p>
</footer>

<script src="script.js"></script>
</body>
</html>
