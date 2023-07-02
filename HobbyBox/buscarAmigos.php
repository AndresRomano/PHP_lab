<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilos/estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <title>Index</title>
</head>
<body class="img" style="background-image: url(./imagenes/bg.png);">


  <div class="contenedor1">

<br>
<br>

<?php
// Incluir el archivo de conexión a la base de datos
$name = $_SESSION["idUser"];
include("./persistencia/connect.php");
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['fSearch2'];  ///CORREGIR

    // Crear una nueva instancia de la conexión a la base de datos
    

    // Realizar la búsqueda en la base de datos y obtener los resultados
    $sql = "SELECT * FROM usuario WHERE nombre LIKE '%$searchTerm%' and not idusuario='".$name."'";
    $resultado = $con->ejecutarSQL($sql);

    // Mostrar los resultados de la búsqueda
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['idusuario'];
        $nombre = $row['nombre'];
        $imagen = $row['imagen'];
  

        
        echo '<div class="card mb-3" style="max-width: 540px;">';
        echo "Usuarios";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo '<div class="row g-0">';
        echo '<div class="col-md-4">';
        echo $id;
        echo $nombre;
        echo '<div class="col-2">
        <div class="card" style="width: 10rem; align-items: center; color: white; background-color: rgb(61, 61, 61);">
                <img src="' . $imagePath . '" width="100" height="150" class="card-img-top">
              </div>
            </div>';
        ?>
            <form method="post">
            <input type="submit" name="seguir" value="seguir"/>
            </form>
        <?php
        if(isset($_POST['seguir']))
        {
          $sql = "INSERT INTO amigo (usuario1, usuario2) VALUES ('$name','$id')";
          $con->ejecutarSQL($sql);
          $name = null;
          header("location: ../hobbybox/indexUser.php");
          exit;
        }
 
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
        echo '</a>';

    }

    // Mostrar mensaje si no se encontraron resultados
    if ($resultado->num_rows === 0) {
        echo 'No se encontraron resultados.';
    }

}
?>
  </div>

</body>
</html>
