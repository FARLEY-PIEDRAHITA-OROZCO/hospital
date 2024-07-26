<?php
session_start();
if (!isset($_SESSION['rol_id']) || $_SESSION['rol_id'] != 1) {
    header("Location: ../login.php");
    exit();
}

require '../includes/funciones.php';
require_once('../../config/db.php');


// Obtener información del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nombre_completo, tipo_documento, numero_documento FROM usuarios WHERE id = ?");
$stmt->execute([$paciente_id]);
$paciente = $stmt->fetch();


$usuarios = obtenerUsuarios();
$citas = obtenerTodasLasCitas();

include('../../templates/header_admind.php');

?>
<div class="info-paciente">
<h1>Bienvenido, Administrador</h1>
<p>Este es tu dashboard.</p>
<div">
    <div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                    <tr>
                        <td><?php echo $usuario['id']; ?></td>
                        <td><?php echo $usuario['nombre_completo']; ?></td>
                        <td><?php echo $usuario['correo_electronico']; ?></td>
                        <td><?php echo $usuario['rol_id']; ?></td>
                        <td>
                            <button><a href="edit_user.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-warning">Editar</a></button>
                            <button><a href="delete_user.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-danger">Eliminar</a></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <section>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Paciente</th>
                            <th>Fecha</th>
                            <th>Tipo de Cita</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($citas as $cita) : ?>
                            <tr>
                                <td><?php echo $cita['id']; ?></td>
                                <td><?php echo $cita['paciente']; ?></td>
                                <td><?php echo $cita['fecha']; ?></td>
                                <td><?php echo $cita['tipos_citas']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </section>
    </div>        
    </div>
    <br>

    
            
            </div>

<a href="../logout.php">Cerrar Sesión</a>
<?php include('../../templates/footer_admind.php'); ?>
