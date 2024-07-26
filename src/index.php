<?php
include('../templates/header_landing.php');
?>
    <main>
        <div class="hero">
            <img src="../public/img/portada.jpg" alt="Bienvenido a Clínica Securitas" class="hero-image">
            <h1>Bienvenido a Clínica Securitas</h1>
        </div>
        <div class="services-title">
            <h3>servicios especializados</h3>
        </div>
        <section class="services">
            <div class="services-item_1">
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-heart"></i>
                    <h3>Cita Médica</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-pills"></i>
                    <h3>Medicamentos</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/atention.php'">
                    <i class="fas fa-user-md"></i>
                    <h3>Atención Especializada</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/emergencies.php'">
                    <i class="fas fa-hospital"></i>
                    <h3>Urgencias</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-file-medical"></i>
                    <h3>Exámenes Médicos</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-syringe"></i>
                    <h3>Vacunación</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-certificate"></i>
                    <h3>Certificados</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-check-circle"></i>
                    <h3>Autorizaciones</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-flask"></i>
                    <h3>Laboratorios</h3>
                </div>
                <div class="service-item" onclick="location.href='../src/login.php'">
                    <i class="fas fa-calendar-check"></i>
                    <h3>Agendamiento</h3>
            </div>
        </section>
    </main>

<?php include('../templates/footer.php'); ?>
