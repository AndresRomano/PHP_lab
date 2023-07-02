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
            <img src="' . $imagePath . '" alt="' . $titulo . '" height="384" class="img-fluid">
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
            </form><br> 
            <div class="btn-group">
              <form action="./controladora/ctrlItemObt.php" method="POST">
                <input type="hidden" name="itemId" value="' . $id . '">
                <button type="submit" class="btn btn-dark" name="Enviar">Lo tengo!</button>
              </form>

              <form action="./controladora/ctrlItemDeseado.php" method="POST">
                <input type="hidden" name="itemId" value="' . $id . '">
                <button type="submit" class="btn btn-dark" name="Enviar">Lo quiero!</button>
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

<div class="contenedor1" style="color:white;">
  <h3>Foro: Comentarios</h3>

  <form action="./controladora/ctrlComentario.php" method="POST">
    <input type="hidden" name="itemId" value="<?php echo $id; ?>">
    <div class="form-group">
      <textarea class="form-control" name="fComentario" placeholder="Escribe tu comentario"></textarea>
    </div>
    <button type="submit" class="btn btn-dark" name="Enviar">Comentar</button>
  </form>
  
  <div class="row">
    <div class="col">
      <?php
      // Obtener los comentarios del item de la base de datos
      $sql = "SELECT * FROM comentario WHERE item = $id";
      $resultado = $con->ejecutarSQL($sql);

      // Mostrar los comentarios existentes
      while ($row = mysqli_fetch_assoc($resultado)) {
        $comentarioId = $row['idcomentario'];
        $usuario = $row['usuario'];
        $mensaje = $row['mensaje'];

        $sqlUserComent = "SELECT * FROM usuario WHERE idusuario = $usuario";
        $resultUserComent = $con->ejecutarSQL($sqlUserComent);
        while ($rowUsr = mysqli_fetch_assoc($resultUserComent)) {
          $usr = $rowUsr['nombre'];
          $img = $rowUsr['imagen'];

          if (isset($img) && !empty($img)) {
            $imagePath = "./imagenes/" . $img;
          } else {
            $imagePath = "./imagenes/no-image.jpg";
          }

          // Mostrar el comentario
          echo '
          <div class="comentario">
            <div class="d-flex flex-start">
              <img class="rounded-circle shadow-1-strong me-3" src="' . $imagePath . '" alt="avatar" width="65" height="65" />
              <div class="flex-grow-1 flex-shrink-1">
                <div>
                  <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1">' . $usr . '</p>
                  </div>
                  <p class="small mb-0">' . $mensaje . '</p>
                </div>
                <form action="./controladora/ctrlRespuesta.php" method="POST">
                  <input type="hidden" name="comentarioId" value="' . $comentarioId . '">
                  <input type="hidden" name="itemId" value="' . $id . '">
                  <textarea class="form-control" name="respuesta" placeholder="Escribe tu respuesta"></textarea>
                  <button type="submit" class="btn btn-dark">Responder</button>
                </form>
              </div>
            </div>';

          // Mostrar respuestas al comentario (si las hay)
          $sqlRespuestas = "SELECT * FROM respuesta WHERE comentario = $comentarioId";
          $resultadoRespuestas = $con->ejecutarSQL($sqlRespuestas);

          while ($rowRespuesta = mysqli_fetch_assoc($resultadoRespuestas)) {
            $usuarioRespuesta = $rowRespuesta['usuario'];
            $mensajeRespuesta = $rowRespuesta['mensaje'];

            $sqlUsuario = "SELECT * FROM usuario WHERE idusuario = $usuarioRespuesta";
            $resultadoUsuario = $con->ejecutarSQL($sqlUsuario);

            while ($row = mysqli_fetch_assoc($resultadoUsuario)) {
              $nombreUsuario = $row['nombre'];
              $imgUsuario = $row['imagen'];

              if (isset($imgUsuario) && !empty($imgUsuario)) {
                $imagePath = "./imagenes/item_cards/" . $imgUsuario;
              } else {
                $imagePath = "./imagenes/item_cards/no-image.jpg";
              }

              // Mostrar la respuesta
              echo '
              <div class="contenedor1" style="color:white;">
              <div class="respuesta">
                <div class="d-flex flex-start">
                  <a class="me-3" href="#">
                    <img class="rounded-circle shadow-1-strong" src="' . $imagePath . '" alt="avatar" width="65" height="65" />
                  </a>
                  <div class="flex-grow-1 flex-shrink-1">
                    <div>
                      <div class="d-flex justify-content-between align-items-center">
                        <p class="mb-1">' . $nombreUsuario . '</p>
                      </div>
                      <p class="small mb-0">' . $mensajeRespuesta . '</p>
                    </div>
                  </div>
                </div>
              </div>
              </div>';
            }
          }

          echo '</div>'; // Cerrar el div del comentario
        }
      }
      ?>
    </div>
  </div>
</div>


<?php include './vistas/footer.php'; ?>
</body>
</html>



