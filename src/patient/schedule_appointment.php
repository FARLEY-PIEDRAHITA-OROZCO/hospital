<?php
session_start();
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 2) {
    header("Location: ../login.php");
    exit();
}
include('../../config/db.php');

// Obtener información del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nombre_completo, tipo_documento, numero_documento FROM usuarios WHERE id = ?");
$stmt->execute([$paciente_id]);
$paciente = $stmt->fetch();

// Obtener tipos de citas
$stmt = $pdo->query("SELECT * FROM tipos_citas");
$tipos_citas = $stmt->fetchAll();

// Obtener doctores
$stmt = $pdo->query("SELECT * FROM usuarios WHERE rol_id = 3");
$doctores = $stmt->fetchAll();

include('../../templates/header_appointmets.php');
?>
<div class="info-paciente">

<div>
            <h2>Agendar Cita Médica</h2>
            <form action="validate_appointment.php" method="post">
                <div class="form-text">
                    <label for="tipo_cita">Tipo de Cita:</label>
                    <select id="tipo_cita" name="tipo_cita" required>
                        <?php foreach ($tipos_citas as $tipo): ?>
                            <option value="<?= $tipo['id'] ?>"><?= $tipo['nombre'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-text">
                    <label for="doctor">Doctor:</label>
                    <select id="doctor" name="doctor" required>
                        <?php foreach ($doctores as $doctor): ?>
                            <option value="<?= $doctor['id'] ?>"><?= $doctor['nombre_completo'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div> 
                <div class="form-text">
                    <label for="fecha">Fecha:</label>
                    <input type="date" id="fecha" name="fecha" required>
                </div>       
                        
                <div class="form-text">
                    <label for="hora">Hora:</label>
                    <input type="time" id="hora" name="hora" required>
                </div> 
                    
                    
                <button type="submit" class="btn btn-primary btn-block">Agendar Cita</button>
            </form>
        </div>

        </div>

    


<?php include('../../templates/footer_patient.php'); ?>
