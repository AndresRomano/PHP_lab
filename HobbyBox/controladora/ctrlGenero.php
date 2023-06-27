<?php
include ("../persistencia/connect.php");
    $con = new Conexion();
    $genero = $_POST ["fGenero"];
    $id = $_POST ["fIdGen"];

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])){
    $sql ="INSERT INTO genero(nombre) VALUES ('$genero')";
    $con->ejecutarSQL($sql);
    header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
    $sql = "UPDATE genero SET nombre = '$genero' WHERE idGenero = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
    $sql = "DELETE from genero where idGenero = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");

}
?>