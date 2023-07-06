<?php
session_start();

// Incluir el archivo de conexión a la base de datos
require_once './persistencia/connect.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $friendId = $_POST['friendId'];
    $userId = $_SESSION["idUser"];

    // Verificar si ya sigues al amigo
    $query = "SELECT * FROM amigo WHERE usuario1='$userId' AND usuario2='$friendId'";
    $result = $con->ejecutarSQL($query);
    $isFollowing = $result && mysqli_num_rows($result) > 0;

    if ($isFollowing) {
        // Si ya sigues al amigo, eliminar la relación de amistad
        $query = "DELETE FROM amigo WHERE usuario1='$userId' AND usuario2='$friendId'";
        $con->ejecutarSQL($query);
        $success = true;
        $message = 'Dejaste de seguir al amigo.';
    } else {
        // Si no sigues al amigo, agregar una nueva relación de amistad
        $query = "INSERT INTO amigo (usuario1, usuario2) VALUES ('$userId', '$friendId')";
        $con->ejecutarSQL($query);
        $success = true;
        $message = 'Ahora estás siguiendo al amigo.';
    }

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode(array('success' => $success, 'isFollowing' => !$isFollowing, 'message' => $message));
    exit();
}
?>

