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
  <title>Busqueda</title>
</head>
<body class="img" style="background-image: url(./imagenes/bg.png);">

  <?php include './vistas/header.php'; ?>

  <div class="contenedor1">
<?php
// Incluir el archivo de conexión a la base de datos
include("./persistencia/connect.php");
$con = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['fSearch'];

    // Crear una nueva instancia de la conexión a la base de datos
    

    // Realizar la búsqueda en la base de datos y obtener los resultados
    $sql = "SELECT * FROM item WHERE titulo LIKE '%$searchTerm%' OR coleccion LIKE '%$searchTerm%' OR autor LIKE '%$searchTerm%'";
    $resultado = $con->ejecutarSQL($sql);

    // Mostrar los resultados de la búsqueda
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['iditem'];
        $titulo = $row['titulo'];
        $imagen = $row['imagen'];
        $descripcion = $row['descripcion'];
        $puntaje = $row['puntaje'];

        if (isset($imagen) && !empty($imagen)) {
          $imagePath = "./imagenes/item_cards/".$imagen;
        } else {
          $imagePath = "./imagenes/item_cards/no-image.jpg";
        }

        echo '<a href="./item.php?id=' . $id . '" style="text-decoration: none;">';
        echo '<div class="card mb-3 bg-dark text-white" style="max-width: 540px;">';
        echo '<div class="row g-0">';
        echo '<div class="col-md-4">';
        echo '<img src="' . $imagePath . '" class="img-fluid rounded-start" alt="' . $titulo . '">';
        echo '</div>';
        echo '<div class="col-md-8">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $titulo . '</h5>';
        echo '<p class="card-text">' . $descripcion . '</p>';
        echo '<p class="card-text">Puntaje: ' . $puntaje . '</p>';
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

<?php include './vistas/footer.php'; ?>
</body>
</html>
