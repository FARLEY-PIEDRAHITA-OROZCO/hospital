<?php include('../templates/header.php'); ?>

    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="validate_login.php" method="post">
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label><br>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label><br>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
        </form>
        <div class="form-text">
            <p>¿No tienes una cuenta? <a href="../src/register.php">Regístrate</a></p>
        </div>
    </div>
