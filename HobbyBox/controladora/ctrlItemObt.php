<?php
session_start();
include("../persistencia/connect.php");
$con = new Conexion();
$itemId = $_POST['itemId'];
$usuarioId = $_SESSION["idUser"];

// Verificar si el usuario ya tiene el item en su colección
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
        // El usuario no tiene el item en ninguna de las dos tablas, se puede realizar la inserción en coleccion-usuario
        $sqlInsertarColeccion = "INSERT INTO `coleccion-usuario` (item, usuario) VALUES ($itemId, $usuarioId)";
        $resultadoInsertarColeccion = $con->ejecutarSQL($sqlInsertarColeccion);
        
        if ($resultadoInsertarColeccion) {
            // Inserción exitosa en coleccion-usuario
            header("Location: ../item.php?id=" . $itemId);
            exit;
        } else {
            // Error en la inserción en coleccion-usuario
            echo "Error al agregar el item a la colección del usuario.";
        }
    } elseif ($existeItemListaDeseos) {
        // El usuario ya tiene el item en su lista de deseos, eliminarlo de itemdeseado-usuario y realizar la inserción en coleccion-usuario
        $sqlEliminarListaDeseos = "DELETE FROM `itemdeseado-usuario` WHERE item = $itemId AND usuario = $usuarioId";
        $resultadoEliminarListaDeseos = $con->ejecutarSQL($sqlEliminarListaDeseos);
        
        if ($resultadoEliminarListaDeseos) {
            // Eliminación exitosa de itemdeseado-usuario
            $sqlInsertarColeccion = "INSERT INTO `coleccion-usuario` (item, usuario) VALUES ($itemId, $usuarioId)";
            $resultadoInsertarColeccion = $con->ejecutarSQL($sqlInsertarColeccion);
            
            if ($resultadoInsertarColeccion) {
                // Inserción exitosa en coleccion-usuario
                header("Location: ../item.php?id=" . $itemId);
                exit;
            } else {
                // Error en la inserción en coleccion-usuario
                echo "Error al agregar el item a la colección del usuario.";
            }
        } else {
            // Error al eliminar de itemdeseado-usuario
            echo "Error al eliminar el item de la lista de deseos del usuario.";
        }
    } else {
        // El usuario ya tiene el item en su colección
        echo "El usuario ya tiene este item en su colección.";
    }
    header("Location: ../item.php?id=" . $itemId);
    exit;
}elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminar'])){
    $sql = "DELETE FROM `coleccion-usuario` WHERE item = '$itemId' AND usuario = $usuarioId";
            $con->ejecutarSQL($sql);
            header("location: ../indexUser.php");

} else {
    // Redireccionar si no se ha enviado el formulario
    header("Location: ../item.php?id=" . $itemId);
    exit;
}
?>
