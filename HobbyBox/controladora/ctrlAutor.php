<?php
include ("../persistencia/connect.php");
    $con = new Conexion();
    $autor = $_POST ["fAutor"];
    $id = $_POST ["fIdAu"];

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])){
    $sql ="INSERT INTO autores(nombre) VALUES ('$autor')";
    $con->ejecutarSQL($sql);
    header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
    $sql = "UPDATE autores SET nombre = '$autor' WHERE idAutor = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
    $sql = "DELETE from autores where idAutor = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");

}
?>