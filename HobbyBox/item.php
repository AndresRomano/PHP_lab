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
  <title>Item</title>
</head>
<body class="img" style="background-image: url(./imagenes/bg.png);">

  <?php include './vistas/header.php'; ?>

  <div class="contenedor1" style="color:white;">
<?php
include("./persistencia/connect.php");
$con = new Conexion();
// Obtener el ID del item desde la URL
$idItem = $_GET['id'];

// Realizar consulta para obtener los datos del item
$sql = "SELECT * FROM item WHERE iditem = '$idItem'";
$resultado = $con->ejecutarSQL($sql);

if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Obtener los valores de los atributos del item
    $id = $row['iditem'];
    $titulo = $row['titulo'];
    $imagen = $row['imagen'];
    $descripcion = $row['descripcion'];
    $coleccion = $row['coleccion'];
    $genero = $row['genero'];
    $autor = $row['autor'];
    $anio = $row['año'];
    $puntaje = $row['puntaje'];
    $fechaIngreso = $row['fechaIngreso'];
    // Obtener más atributos del item según tus necesidades

    if (isset($imagen) && !empty($imagen)) {
      $imagePath = "./imagenes/item_cards/".$imagen;
    } else {
      $imagePath = "./imagenes/item_cards/no-image.jpg";
    }


    // Mostrar los datos del item
    echo '
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <img src="' . $imagePath . '" alt="' . $titulo . '" height="384">
          </div>
          <div class="col-md-6">
            <h2>' . $titulo . '</h2>
            <p>' . $descripcion . '</p>
            <p><strong>Autor:</strong> ' . $autor . '</p>
            <p><strong>Año:</strong> ' . $anio . '</p>
            <p><strong>Puntaje:</strong> ' . $puntaje . '</p>
            <p><strong>Fecha de Ingreso:</strong> ' . $fechaIngreso . '</p>
            
            <form action="./controladora/ctrlPuntaje.php" method="POST">
              <input type="hidden" name="itemId" value="' . $id . '">
              <label for="puntaje">Puntuar:</label>
              <select name="puntaje" id="puntaje">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <button type="submit" class="btn btn-dark" name="Enviar">Enviar</button>
            </form>

            <div class="btn-group">
              <form action="./controladora/ctrlItemObt.php" method="POST">
                <input type="hidden" name="itemId" value="' . $id . '">
                <button type="submit" name="loTengo" class="btn btn-dark">Lo tengo!</button>
              </form>

              <form action="./controladora/ctrlItemDeseado.php" method="POST">
                <input type="hidden" name="itemId" value="' . $id . '">
                <button type="submit" name="loQuiero" class="btn btn-dark">Lo quiero!</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    ';
} else {
  echo '<p>No se encontró el item.</p>';
}
?>

</div>

<?php include './vistas/footer.php'; ?>
</body>
</html>

