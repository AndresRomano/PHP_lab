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

  <?php include './vistas/header.php'; ?>

  <div class="contenedor1">
  <h5 style="color: white;">Libros:</h5>
    <?php include './vistas/cards/CardVertical.php'; ?>
  </div>

  <div class="contenedor1">
  <h5 style="color: white;">Películas:</h5>
    <?php include './vistas/cards/CardVertical.php'; ?>
  </div>

  <div class="contenedor1">
  <h5 style="color: white;">Cómics:</h5>
    <?php include './vistas/cards/CardVertical.php'; ?>
  </div>

  <div class="contenedor1">
  <h5 style="color: white;">Manga:</h5>
    <?php include './vistas/cards/CardVertical.php'; ?>
  </div>

  <?php include './vistas/footer.php'; ?>
</body>
</html>