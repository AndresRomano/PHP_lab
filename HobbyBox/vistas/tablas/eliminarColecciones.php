<?php
include ("../../persistencia/connect.php");
$con = new Conexion();
// Verificar si se recibió el ID a eliminar
if (isset($_GET['id'])) {
    // Obtener el ID del usuario
    $idC = $_GET['id'];
    $sql = "delete from coleccion where idcoleccion='$idC'";
    $con->ejecutarSQL($sql);
    header("location: ../../indexAdmin.php");
} else {
    // No se proporcionó un ID válido
    // Manejar el error o redireccionar a una página de error
    header("location: ../../indexAdmin.php");
}

?>