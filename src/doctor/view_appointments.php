<?php
session_start();
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 3) {
    header("Location: ../login.php");
    exit();
}

require_once('../../config/db.php');

$doctor_id = $_SESSION['user_id'];

// Obtener las citas agendadas con el doctor
$stmt = $pdo->prepare("
    SELECT c.id, c.fecha, c.hora, t.nombre AS tipo_cita, u.nombre_completo AS paciente, c.estado
    FROM citas c
    JOIN tipos_citas t ON c.tipo_cita_id = t.id
    JOIN usuarios u ON c.paciente_id = u.id
    WHERE c.doctor_id = ?
    ORDER BY c.fecha, c.hora
");
$stmt->execute([$doctor_id]);
$citas = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Doctor</title>
    <link rel="stylesheet" href="../../public/styles.css">
</head>
<body>
    <h1>Dashboard Doctor</h1>
    <h2>Citas Agendadas</h2>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Tipo de Cita</th>
                <th>Paciente</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($citas as $cita): ?>
            <tr>
                <td><?php echo htmlspecialchars($cita['fecha']); ?></td>
                <td><?php echo htmlspecialchars($cita['hora']); ?></td>
                <td><?php echo htmlspecialchars($cita['tipo_cita']); ?></td>
                <td><?php echo htmlspecialchars($cita['paciente']); ?></td>
                <td><?php echo htmlspecialchars($cita['estado']); ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../../public/index.php">Volver al inicio</a>
</body>
</html>