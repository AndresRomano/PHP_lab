<?php
include ("../../persistencia/connect.php");
$con = new Conexion();
// Verificar si se recibió el ID a eliminar
if (isset($_GET['id'])) {
    // Obtener el ID del usuario
    $idA = $_GET['id'];

    // Obtener el nombre de la tabla
    $sqlTabla = "SELECT nombre FROM autores WHERE idAutor = '$idA'";
    $resultTabla = $con->ejecutarSQL($sqlTabla);
    $rowTabla = mysqli_fetch_assoc($resultTabla);
    $nombre = $rowTabla['nombre'];



    $sql = "delete from autores where idAutor='$idA'";
    $con->ejecutarSQL($sql);

    

    $sql2 = "UPDATE item SET  autor=' ' WHERE autor = '$nombre'";            
    $con->ejecutarSQL($sql2);
    header("location: ../../indexAdmin.php");
} else {
    // No se proporcionó un ID válido
    // Manejar el error o redireccionar a una página de error
    header("location: ../../indexAdmin.php");
}



?>