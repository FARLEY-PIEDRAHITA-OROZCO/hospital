<?php
session_start();
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 2) {
    header("Location: ../login.php");
    exit();
}
include('../../config/db.php');
include('../../templates/header.php');

// Obtener información del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nombre_completo, tipo_documento, numero_documento FROM usuarios WHERE id = ?");
$stmt->execute([$paciente_id]);
$paciente = $stmt->fetch();

// Obtener citas del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("
    SELECT c.id, c.fecha, c.hora, tc.nombre AS tipo_cita, u.nombre_completo AS doctor
    FROM citas c
    JOIN tipos_citas tc ON c.tipo_cita_id = tc.id
    JOIN usuarios u ON c.doctor_id = u.id
    WHERE c.paciente_id = ?
    ORDER BY c.fecha, c.hora
");
$stmt->execute([$paciente_id]);
$citas = $stmt->fetchAll();

include('../../templates/header_patient.php');
?>
<div class="info-paciente">
    <div class="info-header">
        <h2>Información del Paciente</h2>
    </div>
    <div class="info-contenedor">
        <div class="info-item">
            <strong>Nombre completo:</strong> <?= $paciente['nombre_completo'] ?>
        </div>
        <div class="info-item">
            <strong>Tipo de Documento:</strong> <?= $paciente['tipo_documento'] ?>
        </div>
        <div class="info-item">
            <strong>Número de Documento:</strong> <?= $paciente['numero_documento'] ?>
        </div>
    </div>
</div>
<?php include('../../templates/footer_patient.php'); ?>