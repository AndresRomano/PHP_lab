<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();
$itemId = $_POST['itemId'];
$usuarioId = $_SESSION["idUser"];

// Verificar si el usuario ya tiene el item en su colección de coleccion-usuario
$sqlVerificarColeccion = "SELECT * FROM `coleccion-usuario` WHERE item = $itemId AND usuario = $usuarioId";
$resultadoVerificarColeccion = $con->ejecutarSQL($sqlVerificarColeccion);
$existeItemColeccion = mysqli_num_rows($resultadoVerificarColeccion) > 0;

// Verificar si el usuario ya tiene el item en su lista de deseos de itemdeseado-usuario
$sqlVerificarListaDeseos = "SELECT * FROM `itemdeseado-usuario` WHERE item = $itemId AND usuario = $usuarioId";
$resultadoVerificarListaDeseos = $con->ejecutarSQL($sqlVerificarListaDeseos);
$existeItemListaDeseos = mysqli_num_rows($resultadoVerificarListaDeseos) > 0;

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['Enviar'])) {
    if (!$existeItemColeccion && !$existeItemListaDeseos) {
        // El usuario no tiene el item en ninguna de las dos tablas, se puede realizar la inserción
        $sqlInsertar = "INSERT INTO `itemdeseado-usuario` (item, usuario) VALUES ($itemId, $usuarioId)";
        $resultadoInsertar = $con->ejecutarSQL($sqlInsertar);
        
        if ($resultadoInsertar) {
            // Inserción exitosa
            header("Location: ../item.php?id=" . $itemId);
            exit;
        } else {
            // Error en la inserción
            echo "Error al agregar el item a la colección del usuario.";
        }
    } else {
        // El usuario ya tiene el item en su colección o lista de deseos
        echo "El usuario ya tiene este item en su colección o lista de deseos.";
    }
    header("Location: ../item.php?id=" . $itemId);
    exit;
} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: ../item.php?id=" . $itemId);
    exit;
}
?>
