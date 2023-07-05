<?php
session_start();

// Verificar si se ha iniciado sesión
if (!isset($_SESSION['idUser'])) {
    // Redireccionar a la página de inicio de sesión u otra página
    header('Location: login.php');
    exit();
}

// Verificar si se ha enviado el formulario de seguimiento
if (isset($_POST['amigo_id'])) {
    // Obtener los datos del formulario
    $amigo_id = $_POST['amigo_id'];
    $name = $_SESSION['idUser'];

    // Realizar la inserción en la base de datos
    require_once './persistencia/connect.php';
    $con = new Conexion();

    $sql = "INSERT INTO amigo (usuario1, usuario2) VALUES ('$name', '$amigo_id')";

    if ($con->ejecutarSQL($sql)) {
        echo "Se guardó correctamente al amigo.";
    } else {
        echo "Error al guardar al amigo: " . mysqli_error($con->getConexion());
    }

    // Redireccionar a la página principal
    header('Location: indexUser.php');
    exit();
} else {
    // Si no se ha enviado el formulario correctamente, redireccionar a la página de origen o mostrar un mensaje de error
    echo "Error: Datos de seguimiento no recibidos correctamente.";
}
?>
