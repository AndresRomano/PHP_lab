<?php
// Obtener el ID del amigo a eliminar
$amigo_id = $_POST['amigo_id'];

// Realizar la operación de eliminación en la base de datos
// Incluir el archivo de conexión a la base de datos
require_once './persistencia/connect.php';
$con = new Conexion();

// Consulta para eliminar al amigo
$sql = "DELETE FROM amigo WHERE idAmigo = '$amigo_id'"; // Asegúrate de utilizar el nombre correcto de la tabla y el campo de ID

// Ejecutar la consulta
if ($con->ejecutarSQL($sql)) {
    // Éxito al eliminar al amigo
    $response = array('success' => true, 'message' => 'El amigo se eliminó correctamente.');
    
    // Consulta para obtener la lista de amigos actualizada
    $sql = "SELECT * FROM amigo";
    $resultado = $con->ejecutarSQL($sql);

    $listaAmigos = array();

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            // Agregar los datos del amigo a la lista
            $listaAmigos[] = $row;
        }
    }

    // Agregar la lista de amigos actualizada a la respuesta
    $response['amigos'] = $listaAmigos;

    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // Error al eliminar al amigo
    $errorMessage = "Error al eliminar al amigo: " . mysqli_error($con->getConexion());
    $response = array('success' => false, 'message' => $errorMessage);
    
    // Devolver la respuesta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
