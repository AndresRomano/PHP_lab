<?php
include ("../../persistencia/connect.php");
$con = new Conexion();
// Verificar si se recibió el ID del usuario a eliminar
if (isset($_GET['id'])) {
    // Obtener el ID del usuario
    $idUsuario = $_GET['id'];
    $sql = "delete from usuario where idusuario='$idUsuario'";
    $con->ejecutarSQL($sql);
    header("location: ../../indexAdmin.php");
} else {
    // No se proporcionó un ID válido
    // Manejar el error o redireccionar a una página de error
    header("location: ../../indexAdmin.php");
}
?>

