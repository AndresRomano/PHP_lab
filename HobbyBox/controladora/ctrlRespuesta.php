<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();

$comentarioId = $_POST['comentarioId'];
$respuesta = $_POST['respuesta'];
$itemId = $_POST['itemId'];
$usuario = $_SESSION["idUser"];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
$sql = "INSERT INTO respuesta (comentario, usuario, mensaje) VALUES ('$comentarioId', '$usuario', '$respuesta')";
$resultado = $con->ejecutarSQL($sql);
}

header("Location: ../item.php?id=" . $itemId);
?>