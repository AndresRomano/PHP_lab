<?php
session_start();
// Obtener el ID del amigo a eliminar enviado desde la solicitud AJAX
$amigoID = $_POST['amigoID'];
$usuario = $_SESSION["idUser"];

require_once './persistencia/connect.php';
$con = new Conexion();

// Realizar la eliminación del amigo en la base de datos
$sql = "DELETE FROM amigo WHERE usuario1 = '$usuario' AND usuario2 = $amigoID";
$resultado = $con->ejecutarSQL($sql);

// Verificar si la eliminación fue exitosa y enviar una respuesta al cliente
if ($resultado) {
  echo "Amigo eliminado correctamente";
} else {
  echo "Error al eliminar al amigo";
}
?>