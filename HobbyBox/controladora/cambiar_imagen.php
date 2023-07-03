<?php
    session_start();
    include ("../persistencia/connect.php");
    $con = new Conexion();
    $nombrearchivo = $_FILES['fArchivo']['name'];
    $rutaDestino ="../imagenes/";
    $rutaArchivo = $rutaDestino.$nombrearchivo;
    $usuarioId = $_SESSION["idUser"];

     if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['Enviar'])) {       
        // Verificar si se envió un archivo
            if (!empty($_FILES['fArchivo']['name'])) {
                $nombreArchivo = $_FILES['fArchivo']['name'];
                $rutaArchivo = $rutaDestino.$nombrearchivo;
        
                // Mover el archivo a la ubicación deseada
                if (move_uploaded_file($_FILES['fArchivo']['tmp_name'], $rutaArchivo)) {
                    $sql = "UPDATE usuario SET imagen = '$nombrearchivo' AND idusuario = '$usuarioId'";
                    $con->ejecutarSQL($sql);
                    header("location: ../indexUser.php");
                    exit;
                } else {
                    echo "Error al mover el archivo";
                }
            } 
    }

    