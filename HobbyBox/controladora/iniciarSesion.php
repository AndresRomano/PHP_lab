<?php
// Incluir el archivo de conexión a la base de datos
include("../persistencia/connect.php");
$con = new Conexion();
// Iniciar la sesión
session_start();

// Obtener los datos de inicio de sesión del formulario
$correo = $_POST["fCorreo"];
$contrasenia = md5($_POST["fContrasena"]);

// Validar los datos de inicio de sesión
$sql = "SELECT * FROM usuario WHERE correo = '$correo' AND password = '$contrasenia'";
$resultado = $con->ejecutarSQL($sql);

// Comprobar si se encontró un usuario válido
if ($resultado->num_rows == 1) {
  // Obtener el rol del usuario desde la base de datos
  $sql3 = "SELECT permisos FROM usuario WHERE correo = '$correo'";
  $rol = $con->ejecutarSQL($sql3)->fetch_assoc()["permisos"];
  // Guardar el rol en una variable de sesión
  $_SESSION["rol"] = $rol;
  $_SESSION["correo"]=$correo;
  $_SESSION["contrasenia"]=$contrasenia;
  // Redirigir según el rol del usuario
  if ($rol == "administrador") {
    header("Location: ../indexAdmin.php");
  } elseif ($rol == "usuario") {
    header("Location: ../indexUser.php");
  } else {
    // Rol desconocido, credenciales incorrectas
    header("Location: error.php");
  }
}

?>


