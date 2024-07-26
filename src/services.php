<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios - Clínica Securitas</title>
    <link rel="stylesheet" href="../public/css/services.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
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
            <h1>Nuestros Servicios</h1>
        </div>
        <h2 class="services-title">Especialidades</h2>
        <div class="service-container">
            <div class="service-item">
                <img src="../public/img/services1.jpeg" alt="Consulta Médica">
                <div class="service-info">
                    <h3>Médico general</h3>
                    <p>En nuestra clínica, los médicos generales son el primer punto de contacto para cualquier problema
                        de salud. Ofrecemos diagnósticos precisos y tratamientos efectivos para una amplia gama de
                        condiciones, asegurando que reciba el cuidado adecuado desde el primer momento.</p>
                </div>
            </div>
            <div class="service-item">
                <img src="../public/img/services2.jpeg" alt="Medicamentos">
                <div class="service-info">
                    <h3>Pediatria</h3>
                    <p>Nuestros pediatras son expertos en la salud infantil, dedicados a ofrecer un entorno cálido y
                        acogedor para sus hijos. Desde chequeos de rutina hasta la gestión de enfermedades, nos
                        aseguramos de que cada niño crezca sano y feliz.</p>
                </div>
            </div>
            <div class="service-item">
                <img src="../public/img/services3.jpeg" alt="Urgencias">
                <div class="service-info">
                    <h3>Odontologia</h3>
                    <p>Nuestra especialidad en odontología se centra en brindar cuidados dentales excepcionales.
                        Ofrecemos una amplia gama de servicios, desde limpiezas y revisiones hasta tratamientos
                        especializados, asegurando que su sonrisa esté siempre radiante y saludable.</p>
                </div>
            </div>
            <div class="service-item">
                <img src="../public/img/services4.jpeg" alt="Exámenes Médicos">
                <div class="service-info">
                    <h3>Psicología</h3>
                    <p>Entendemos la importancia de la salud mental. Nuestros psicólogos están aquí para ayudarle a
                        superar desafíos emocionales y psicológicos, proporcionando apoyo y terapias adaptadas a sus
                        necesidades individuales.</p>
                </div>
            </div>
            <div class="service-item">
                <img src="../public/img/services5.jpeg" alt="Exámenes Médicos">
                <div class="service-info">
                    <h3>Optometria</h3>
                    <p>La salud visual es fundamental para una vida plena. Nuestros optometristas se especializan en la
                        evaluación y corrección de problemas de visión, ayudándole a ver el mundo con claridad y
                        comodidad.</p>
                </div>
            </div>
            <div class="service-item">
                <img src="../public/img/services6.jpg" alt="Exámenes Médicos">
                <div class="service-info">
                    <h3>Cardiologia</h3>
                    <p>Nuestro equipo de cardiólogos está dedicado a la prevención, diagnóstico y tratamiento de
                        enfermedades del corazón. Utilizamos tecnología de punta para asegurar que su corazón reciba el
                        mejor cuidado posible.</p>
                </div>
            </div>
        </div>
        <div class="text_end">
            <p>Para terminar la pagina: Visítenos y descubra cómo nuestro equipo de especialistas está aquí para cuidar
                de usted y su familia, con profesionalismo y dedicación. ¡Su salud es nuestra misión!</p>
        </div>
    </main>

    <footer>
        <p>&copy; Clínica Securitas. Todos los derechos reservados.</p>
    </footer>

    <script src="script.js"></script>
</body>

</html>