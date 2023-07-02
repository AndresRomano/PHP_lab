<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();

$itemId = $_POST['itemId'];
$comentario = $_POST['fComentario'];
$usuario = $_SESSION["idUser"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
    $sql = "INSERT INTO comentario (usuario, item, mensaje) VALUES ('$usuario', '$itemId', '$comentario')";
    $resultado = $con->ejecutarSQL($sql);

}

header("Location: ../item.php?id=" . $itemId);
?>