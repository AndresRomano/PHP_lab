<?php
session_start();
if ($_SESSION["rol"] !== "usuario") {
  header("Location: index.php");
}
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
    <title>Usuario</title>
</head>
<body class="img" style="background-image: url(./imagenes/bg.png);">
  <!-- Incluir el navbar utilizando la directiva de inclusión -->
  <?php include './vistas/header.php'; ?>
  <div class="contenedor1" style="height: 600px;">
  <br>


  <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Amigos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Mi contenido</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="category-tab" data-bs-toggle="tab" data-bs-target="#category-tab-pane" type="button" role="tab" aria-controls="category-tab-pane" aria-selected="false">Categorias</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="colection-tab" data-bs-toggle="tab" data-bs-target="#colection-tab-pane" type="button" role="tab" aria-controls="colection-tab-pane" aria-selected="false">Colecciones</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="autor-tab" data-bs-toggle="tab" data-bs-target="#autor-tab-pane" type="button" role="tab" aria-controls="autor-tab-pane" aria-selected="false">Autores</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="gender-tab" data-bs-toggle="tab" data-bs-target="#gender-tab-pane" type="button" role="tab" aria-controls="gender-tab-pane" aria-selected="false">Generos</button>
      </li>
    </ul>  

    <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div style="color: white;">

    <?php include './vistas/tablas/tablaAmigo.php'; ?>

  </div>
  </div>
  </div>
  </div>


  <?php include './vistas/footer.php'; ?>
</body>
</html>
