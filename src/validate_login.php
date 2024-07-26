<?php
session_start();
include('../config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo_electronico = $_POST['correo_electronico'];
    $contrasena = $_POST['contrasena'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE correo_electronico = ?");
    $stmt->execute([$correo_electronico]);
    $user = $stmt->fetch();

    if ($user && password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['rol_id'] = $user['rol_id'];

        switch ($user['rol_id']) {
            case 1:
                header("Location: ../src/admind/dashboard.php");
                break;
            case 2:
                header("Location: ../src/patient/dashboard.php");
                break;
            case 3:
                header("Location: ../src/doctor/view_appointments.php");
                break;
        }
        exit();
    } else {
        echo "Correo electrónico o contraseña incorrectos.";
    }
}
?>
