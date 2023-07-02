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
  <title>Admin</title>
</head>

<body class="img" style="background-image: url(./imagenes/bg.png);">
  
  <?php include './vistas/header.php'; ?>

  <div class="contenedor1">

    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Amigos</button>
      </li>
      <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Buscar Nuevos Amigos</button>
      </li>
    </ul>  

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
      <div style="color: white;">
      <?php include './vistas/tablas/tablaAmigo.php'; ?>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
    
    <form class="d-flex ms-auto mb-2 mb-lg-0" action="buscarAmigos.php" method="post">
    <input class="form-control me-2" type="search" name ="fSearch2" placeholder="Buscar Amigos..." aria-label="Search">
     <button class="btn btn-outline-secondary" type="submit">Buscar</button>
  </form>
    <?php include './buscarAmigos.php'; ?>

    </div>
    </div>
  </div>
  
  



</body>
<br>
<?php include './vistas/footer.php'; ?>
 
</html>
