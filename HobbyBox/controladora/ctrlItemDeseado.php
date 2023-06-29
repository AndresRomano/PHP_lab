<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
    // Obtener los valores del formulario
    $itemId = $_POST['itemId'];
    $usuarioId = $_SESSION["idUser"];
} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: ../item.php?id=" . $itemId);
}
?>