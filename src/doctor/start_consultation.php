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


// Obtener el ID de la cita desde el parámetro GET
$cita_id = isset($_GET['cita_id']) ? $_GET['cita_id'] : null;

if ($cita_id === null) {
    header("Location: view_appointments.php");
    exit();
}

// Obtener la información de la cita
$stmt = $pdo->prepare("
    SELECT c.*, t.nombre AS tipo_cita, u.nombre_completo AS paciente
    FROM citas c
    JOIN tipos_citas t ON c.tipo_cita_id = t.id
    JOIN usuarios u ON c.paciente_id = u.id
    WHERE c.id = ?
");
$stmt->execute([$cita_id]);
$cita = $stmt->fetch();

if (!$cita) {
    header("Location: view_appointments.php");
    exit();
}

// Obtener la lista de motivos de consulta
$stmt = $pdo->query("SELECT id, motivo FROM motivos_consulta");
$motivos = $stmt->fetchAll();

// Obtener la lista de medicinas
$stmt = $pdo->query("SELECT id, nombre, disponibilidad FROM medicinas");
$medicinas = $stmt->fetchAll();

// Manejar el envío del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $motivo_id = $_POST['motivo'];
    $nuevo_motivo = $_POST['nuevo_motivo'];
    $observaciones = $_POST['observaciones'];
    $tratamiento = $_POST['tratamiento'];
    $medicinas_formuladas = $_POST['medicinas'];
    $cantidades = $_POST['cantidades'];

    if (!empty($nuevo_motivo)) {
        // Insertar el nuevo motivo en la base de datos
        $stmt = $pdo->prepare("INSERT INTO motivos_consulta (motivo) VALUES (?)");
        $stmt->execute([$nuevo_motivo]);
        $motivo_id = $pdo->lastInsertId();
    }

    // Actualizar el estado de la cita a "atendida"
    $stmt = $pdo->prepare("UPDATE citas SET estado_id = (SELECT id FROM estado_consulta WHERE nombre = 'atendida') WHERE id = ?");
    $stmt->execute([$cita_id]);

    // Insertar los detalles de la consulta en la tabla de historial clínico
    $medicinas_y_cantidades = [];
    foreach ($medicinas_formuladas as $index => $medicina) {
        $medicinas_y_cantidades[] = $medicina . ' (Cantidad: ' . $cantidades[$index] . ')';
    }

    $stmt = $pdo->prepare("
        INSERT INTO historial_clinico (paciente_id, doctor_id, cita_id, motivo, observaciones, tratamiento, medicinas, fecha)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $cita['paciente_id'],
        $_SESSION['user_id'],
        $cita_id,
        $motivo_id,
        $observaciones,
        $tratamiento,
        implode(', ', $medicinas_y_cantidades),
        $cita['fecha']
    ]);

    // Redirigir al dashboard del doctor
    header("Location: view_appointments.php");
    exit();
}

include('../../templates/header_admind.php');

?>
<div class="info-paciente">

    <h1>Iniciar Consulta</h1>
    <h2>Paciente: <?php echo htmlspecialchars($cita['paciente']); ?></h2>
    <h3>Tipo de Cita: <?php echo htmlspecialchars($cita['tipo_cita']); ?></h3>
    <form method="POST">
        <div>
            <label for="motivo">Motivo de Consulta:</label>
            <select name="motivo" id="motivo" required>
                <?php foreach ($motivos as $motivo): ?>
                <option value="<?php echo htmlspecialchars($motivo['id']); ?>">
                    <?php echo htmlspecialchars($motivo['motivo']); ?>
                </option>
                <?php endforeach; ?>
            </select>
            <input type="text" name="nuevo_motivo" placeholder="Otro motivo (si no está en la lista)">
        </div>
        <div>
            <label for="observaciones">Observaciones:</label>
            <textarea name="observaciones" id="observaciones" required></textarea>
        </div>
        <div>
            <label for="tratamiento">Tratamiento:</label>
            <textarea name="tratamiento" id="tratamiento" required></textarea>
        </div>
        <div>
            <label for="medicinas">Medicinas Formuladas:</label>
            <div id="medicinas-container">
                <div class="medicina-item">
                    <select name="medicinas[]" required>
                        <?php foreach ($medicinas as $medicina): ?>
                        <option value="<?php echo htmlspecialchars($medicina['nombre']); ?>">
                            <?php echo htmlspecialchars($medicina['nombre']); ?> (Disponibilidad: <?php echo htmlspecialchars($medicina['disponibilidad']); ?>)
                        </option>
                        <?php endforeach; ?>
                    </select>
                    <input type="number" name="cantidades[]" placeholder="Cantidad" min="1" required>
                    <button type="button" onclick="agregarMedicina()">Agregar Medicina</button>
                </div>
            </div>
        </div>
        <br>
        <button type="submit">Finalizar Consulta</button>
    </form>
    <a href="view_appointments.php">Cancelar</a>

    <script>
        function agregarMedicina() {
            const container = document.getElementById('medicinas-container');
            const newItem = document.createElement('div');
            newItem.className = 'medicina-item';
            newItem.innerHTML = `
                <select name="medicinas[]" required>
                    <?php foreach ($medicinas as $medicina): ?>
                    <option value="<?php echo htmlspecialchars($medicina['nombre']); ?>">
                        <?php echo htmlspecialchars($medicina['nombre']); ?> (Disponibilidad: <?php echo htmlspecialchars($medicina['disponibilidad']); ?>)
                    </option>
                    <?php endforeach; ?>
                </select>
                <input type="number" name="cantidades[]" placeholder="Cantidad" min="1" required>
            `;
            container.appendChild(newItem);
        }
    </script>
</div>

<?php include('../../templates/footer_admind.php'); ?>

