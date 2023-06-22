<?php
    include ("../persistencia/connect.php");
    $con = new Conexion();
    $nombre = $_POST ["fNombre"];
    $correo = $_POST ["fCorreo"];
    $pass = md5($_POST ["fContrasena"]);
    $fNac = $_POST ["fFechaNacimiento"];
    $rol = $_POST ["fRol"];
    $nombrearchivo = $_FILES['fArchivo']['name'];
    $rutaDestino ="../imagenes/";
    $rutaArchivo = $rutaDestino.$nombrearchivo;
    if (move_uploaded_file($_FILES['fArchivo']['tmp_name'], $rutaArchivo) and $_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])) {
    // if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])){
        $sql ="INSERT INTO usuario(nombre, correo, password, fecha, permisos, imagen) VALUES ('$nombre', '$correo', '$pass', '$fNac', '$rol', '$nombrearchivo')";
        $con->ejecutarSQL($sql);
        header("location: ../indexAdmin.php");
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarUsr'])){
        $permiso="usuario";
        $sql ="INSERT INTO usuario(nombre, correo, password, fecha, permisos) VALUES ('$nombre', '$correo', '$pass', '$fNac', '$permiso')";
        $con->ejecutarSQL($sql);
        header("location: ../index.php");
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
        $sql = "delete from usuario where correo='$correo'";
        $con->ejecutarSQL($sql);
        header("location: ../indexAdmin.php");
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
        // $sql = "update estudiante set edad='$edad' where ci='$ci'";
        //$con->ejecutarSQL($sql);
        header("location: ../index.php");
    }
?>