<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
    // Obtener los valores del formulario
    $itemId = $_POST['itemId'];
    $puntaje = $_POST['puntaje'];
    $usuarioId = $_SESSION["idUser"];

    // Verificar si el usuario ya ha puntuado este item
    $selectQuery = "SELECT * FROM puntaje WHERE item = '$itemId' AND usuario = '$usuarioId'";
    $resultadoSelect = $con->ejecutarSQL($selectQuery);
    if ($resultadoSelect && $resultadoSelect->num_rows > 0) {
        // El usuario ya ha puntuado este item, actualizar el puntaje existente
        $updateQuery = "UPDATE puntaje SET nota = '$puntaje' WHERE item = '$itemId' AND usuario = '$usuarioId'";
        $resultadoUpdate = $con->ejecutarSQL($updateQuery);
        header("Location: ../item.php?id=" . $itemId);
    } else {
        // El usuario no ha puntuado este item, realizar la inserción del puntaje
        $insertQuery = "INSERT INTO puntaje (item, usuario, nota) VALUES ('$itemId', '$usuarioId', '$puntaje')";
        $resultadoInsert = $con->ejecutarSQL($insertQuery);
        header("Location: ../item.php?id=" . $itemId);
    }
    $updateItem = "UPDATE item SET puntaje = (SELECT AVG(nota) FROM puntaje WHERE item = '$itemId') WHERE iditem = '$itemId'";
    $resultadoUpdateItem = $con->ejecutarSQL($updateItem);
    header("Location: ../item.php?id=" . $itemId);
} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: ../item.php?id=" . $itemId);
}
?>