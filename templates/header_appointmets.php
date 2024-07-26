<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="../../public/css/styles_patient.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="clinic-name">
        <h1>Clínica Securitas</h1>
    </div>
    <div class="auth-buttons">
        <a href="index.html" class="login">cerrar sesión</a>
    </div>  
    <header>
        <div class="menu-toggle" onclick="toggleMenu()">
            <i class="fas fa-bars"></i>
        </div>
        <nav>
            <ul id="nav-list" class="nav-list">
                <li><a href="../../src/index.php">Inicio</a></li>
                <li><a href="../../src/about_us.php">Sobre nosotros</a></li>
                <li><a href="../../src/services.php">Servicios</a></li>
                <li><a href="../../src/contact_us.php">Contáctanos</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="hero">
            <img src="../../public/img/portada.jpg" alt="Bienvenido a Clínica Securitas" class="hero-image">
            <h1>Bienvenido <?= $paciente['nombre_completo'] ?></h1>
        </div>
        <div class="contenedor-principal">
            <nav class="menu-lateral">
              <ul>
                <li><a href="#">Cita médica</a>
                  <ul>
                    <li><a href="../../src/patient/schedule_appointment.php">Agendar cita</a></li>
                    <li><a href="../../src/patient/scheduled_appointments.php">Programadas</a></li>
                  </ul>
                </li>                
                <li><a href="../../src/patient/clinical_history.php">Historial clínico</a></li>
              </ul>
            </nav>
