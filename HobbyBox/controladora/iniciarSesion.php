<?php
// Iniciar la sesión
session_start();
// Incluir el archivo de conexión a la base de datos
include("../persistencia/connect.php");
$con = new Conexion();

// Obtener los datos de inicio de sesión del formulario
$correo = $_POST["fCorreo"];
$contrasenia = md5($_POST["fContrasena"]);

// Obtener el valor del checkbox "Remember Me"
$rememberMe = isset($_POST['rememberMe']) && $_POST['rememberMe'] === 'on';

// Validar los datos de inicio de sesión
$sql = "SELECT * FROM usuario WHERE correo = '$correo' AND password = '$contrasenia'";
$resultado = $con->ejecutarSQL($sql);

$sql3 = "SELECT permisos FROM usuario WHERE correo = '$correo'";
$sql4 = "SELECT idUsuario FROM usuario WHERE correo = '$correo'";
$sql5 = "SELECT imagen FROM usuario WHERE correo = '$correo'";
$sql6 = "SELECT nombre FROM usuario WHERE correo = '$correo'";
// Comprobar si se encontró un usuario válido
if ($resultado->num_rows == 1) {
  // Obtener el rol del usuario desde la base de datos
  $rol = $con->ejecutarSQL($sql3)->fetch_assoc()["permisos"];
  // obtener id de usuario
  $id = $con->ejecutarSQL($sql4)->fetch_assoc()["idUsuario"];
  // obtener imagen de usuario
  $foto = $con->ejecutarSQL($sql5)->fetch_assoc()["imagen"];
  // obtener nombre de usuario
  $nombre = $con->ejecutarSQL($sql6)->fetch_assoc()["nombre"];

  // Guardar el rol en una variable de sesión
  $_SESSION["idUser"]=$id;
  $_SESSION["foto"]=$foto;
  $_SESSION["nombre"]=$nombre;
  $_SESSION["rol"] = $rol;
  $_SESSION["correo"]=$correo;
  $_SESSION["contrasenia"]=$contrasenia;

  // Establecer una cookie para recordar al usuario si "Remember Me" está marcado
  if ($rememberMe) {
    setcookie('rememberMe', 'true', time() + 86400 * 30); //30 días de validez
  } else {
    // Si no está marcado, eliminar la cookie si existe
    if (isset($_COOKIE['rememberMe'])) {
      setcookie('rememberMe', '', time() - 3600);
    }
  }

  // Redirigir según el rol del usuario
  if ($rol == "administrador") {
    header("Location: ../indexAdmin.php");
  } elseif ($rol == "usuario") {
    header("Location: ../indexUser.php");
  } else {
    // Rol desconocido, credenciales incorrectas
    
    header("Location: ../vistas/login.php");
  }
}
else {
  //  credenciales incorrecta
  header("Location: ../vistas/login.php?error=true");
}

?>