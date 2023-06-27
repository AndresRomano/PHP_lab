<?php
include ("../persistencia/connect.php");
    $con = new Conexion();
    $nombCol = $_POST ["fColeccion"];
    $catCol = $_POST ["fCategoria"];
    $id = $_POST ["fidColeccion"];

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['EnviarAdm'])){
    $sql ="INSERT INTO coleccion(nombre, categoria) VALUES ('$nombCol', '$catCol')";
    $con->ejecutarSQL($sql);
    header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
    $sql = "UPDATE coleccion SET nombre = '$nombCol', categoria = '$catCol' WHERE idcoleccion = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");

}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
    $sql = "DELETE from coleccion where idcoleccion = '$id'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");
}
?>