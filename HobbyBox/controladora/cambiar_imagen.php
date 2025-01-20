<?php
session_start();
include ("../persistencia/connect.php");
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Enviar'])) {
    $usuarioId = $_SESSION["idUser"];
    $rutaDestino = "../imagenes/";

    if (!empty($_FILES['fArchivo']['name'])) {
        $nombreArchivo = $_FILES['fArchivo']['name'];
        $rutaArchivo = $rutaDestino . $nombreArchivo;

        // Mover el archivo a la ubicación deseada
        if (move_uploaded_file($_FILES['fArchivo']['tmp_name'], $rutaArchivo)) {
            // Usar una consulta preparada para evitar inyección SQL
            $sql = "UPDATE usuario SET imagen = '$nombreArchivo' WHERE idusuario = $usuarioId";
            $con->ejecutarSQL($sql);
            $_SESSION["foto"] = $nombreArchivo;
            header("location: ../indexUser.php");
            exit;
        } else {
            echo "Error al mover el archivo";
        }
    } else {
        echo "No se seleccionó ningún archivo.";
    }
}
?>
    
