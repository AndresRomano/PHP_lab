<?php
    include ("../persistencia/connect.php");
    $con = new Conexion();
    $nombre = $_POST ["fNombre"];
    $correo = $_POST ["fCorreo"];
    $pass = md5($_POST ["fContrasena"]);
    $fNac = $_POST ["fFechaNacimiento"];
    
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])){
        $permiso="administrador";
        $sql ="INSERT INTO usuario(nombre, correo, password, fecha, permisos) VALUES ('$nombre', '$correo', '$pass', '$fNac', '$permiso')";
        $con->ejecutarSQL($sql);
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarUsr'])){
        $permiso="usuario";
        $sql ="INSERT INTO usuario(nombre, correo, password, fecha, permisos) VALUES ('$nombre', '$correo', '$pass', '$fNac', '$permiso')";
        $con->ejecutarSQL($sql);
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
        $sql = "delete from usuario where correo='$correo'";
        $con->ejecutarSQL($sql);
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
        // $sql = "update estudiante set edad='$edad' where ci='$ci'";
        //$con->ejecutarSQL($sql);
    }
    header("location: ../index.php");

?>




