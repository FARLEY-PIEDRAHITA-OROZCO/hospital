<?php
session_start();

require '../includes/funciones.php';

require_once('../../config/db.php');


if (!isset($_GET['id'])) {
    header('Location: dashboard.php');
    exit();
}

$id = $_GET['id'];
$usuario = obtenerUsuarioPorId($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_completo'];
    $email = $_POST['correo_electronico'];
    $rol_id = $_POST['rol_id'];

    actualizarUsuario($id, $nombre, $email, $rol_id);
    header('Location: dashboard.php');
    exit();
}

// Obtener información del paciente
$paciente_id = $_SESSION['user_id'];
$stmt = $pdo->prepare("SELECT nombre_completo, tipo_documento, numero_documento FROM usuarios WHERE id = ?");
$stmt->execute([$paciente_id]);
$paciente = $stmt->fetch();


include('../../templates/header_admind.php');

?>
<div class="info-paciente">
        <h2>Editar Usuario</h2>
        <form method="post" action="edit_user.php?id=<?php echo $usuario['id']; ?>">
            <div class="form-text">
                <label for="nombre_completo">Nombre:</label>
                <input type="text" name="nombre_completo" id="nombre" value="<?php echo $usuario['nombre_completo']; ?>" required>
            </div>
            <div class="form-text">
                <label for="correo_electronico">Email:</label>
                <input type="email" name="correo_electronico" id="email" value="<?php echo $usuario['correo_electronico']; ?>" required>
            </div>
            <div class="form-text">
                <label for="rol_id">Rol:</label>
                <select name="rol_id" id="rol_id" required>
                    <option value="1" <?php echo $usuario['rol_id'] == 1 ? 'selected' : ''; ?>>Admin</option>
                    <option value="2" <?php echo $usuario['rol_id'] == 2 ? 'selected' : ''; ?>>Medico</option>
                    <option value="3" <?php echo $usuario['rol_id'] == 3 ? 'selected' : ''; ?>>Paciente</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
        </div>

        <?php include('../../templates/footer_admind.php'); ?>
