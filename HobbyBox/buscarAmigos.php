<?php
session_start();

// Incluir el archivo de conexión a la base de datos
require_once './persistencia/connect.php';
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['fSearch2'];
    $userId = $_SESSION["idUser"];

    // Realizar la búsqueda en la base de datos y obtener los resultados
    $sql = "SELECT * FROM usuario WHERE nombre LIKE '%$searchTerm%' AND idusuario != '$userId'";
    $resultado = $con->ejecutarSQL($sql);

    // Crear un array para almacenar los resultados de búsqueda
    $searchResults = array();

    while ($row = $resultado->fetch_assoc()) {
        $id = $row['idusuario'];
        $nombre = $row['nombre'];
        $imagen = $row['imagen'];

        if (isset($imagen) && !empty($imagen)) {
            $imagePath = "./imagenes/" . $imagen;
        } else {
            $imagePath = "./imagenes/no-image.jpg";
        }

        // Verificar si el amigo ya está siendo seguido
        $query = "SELECT * FROM amigo WHERE usuario1='$userId' AND usuario2='$id'";
        $result = $con->ejecutarSQL($query);
        $siguiendo = $result && mysqli_num_rows($result) > 0;

        // Agregar los datos del amigo al array de resultados de búsqueda
        $searchResults[] = array(
            'id' => $id,
            'nombre' => $nombre,
            'imagen' => $imagePath,
            'siguiendo' => $siguiendo
        );
    }

    // Devolver los resultados de búsqueda como respuesta JSON
    header('Content-Type: application/json');
    echo json_encode(array('results' => $searchResults));
    exit();
}
?>

