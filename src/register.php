<?php include('../templates/header.php'); ?>

    <div class="container">
        <h2>Iniciar Sesión</h2>
        <form action="validate_register.php" method="post">
            <div class="form-group">
                <label for="nombre_completo">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombre_completo" name="nombre_completo" required>
            </div>
            <div class="form-group">
                <label for="tipo_documento">Tipo de Documento:</label>
                <select type="text" class="form-control" placeholder="Tipo de documento" name="tipo_documento" required>
                    <option value="" disabled selected>- - -</option>
                    <option value="C.C">Cedula de ciudadania</option>
                    <option value="C.E">Cedula de extranjeria</option>
                    <option value="Pasaporte">Pasaporte</option>
                </select>
            </div>
            <div class="form-group">
                <label for="numero_documento">Número de Documento:</label>
                <input type="text" class="form-control" id="numero_documento" name="numero_documento" required>
            </div>
            <div class="form-group">
                <label for="correo_electronico">Correo Electrónico:</label>
                <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
            </div>
            <div class="for-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required>
            </div>
            <div class="form-group">
                <label for="rol">Rol:</label>
                <select class="form-control" id="rol" name="rol" required>
                    <option value="1">Admin</option>
                    <option value="2">Paciente</option>
                    <option value="3">Doctor</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
        </form>
        <div class="form-text">
            <p>¿Ya tienes una cuenta? <a href="../src/login.php">Iniciar sesión</a></p>
        </div>
    </div>