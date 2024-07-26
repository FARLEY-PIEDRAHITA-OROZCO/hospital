<?php
session_start();
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 3) {
    header("Location: ../login.php");
    exit();
}

require_once('../../config/db.php');

// Obtener información del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nombre_completo, tipo_documento, numero_documento FROM usuarios WHERE id = ?");
$stmt->execute([$paciente_id]);
$paciente = $stmt->fetch();

// Obtener el ID del doctor
$doctor_id = $_SESSION['user_id'];

// Obtener las citas agendadas para el doctor
$stmt = $pdo->prepare("
    SELECT c.*, t.nombre AS tipo_cita, u.nombre_completo AS paciente, e.nombre AS estado
    FROM citas c
    JOIN tipos_citas t ON c.tipo_cita_id = t.id
    JOIN usuarios u ON c.paciente_id = u.id
    JOIN estado_consulta e ON c.estado_id = e.id
    WHERE c.doctor_id = ?
");
$stmt->execute([$doctor_id]);
$citas = $stmt->fetchAll();

include('../../templates/header_admind.php');

?>
<div class="info-paciente">
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
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($citas) > 0): ?>
                <?php foreach ($citas as $cita): ?>
                <tr>
                    <td><?php echo htmlspecialchars($cita['fecha']); ?></td>
                    <td><?php echo htmlspecialchars($cita['hora']); ?></td>
                    <td><?php echo htmlspecialchars($cita['tipo_cita']); ?></td>
                    <td><?php echo htmlspecialchars($cita['paciente']); ?></td>
                    <td><?php echo htmlspecialchars($cita['estado']); ?></td>
                    <td>
                        <?php if ($cita['estado'] == 'pendiente de atender'): ?>
                            <button><a href="start_consultation.php?cita_id=<?php echo $cita['id']; ?>">Iniciar Consulta</a></button>
                        
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">No hay citas agendadas.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="../../public/index.php">Volver al inicio</a>
    </div>

<?php include('../../templates/footer_admind.php'); ?>
