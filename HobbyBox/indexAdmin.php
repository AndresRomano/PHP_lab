<?php
session_start();
if ($_SESSION["rol"] !== "administrador") {
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
  <!-- Incluir el navbar utilizando la directiva de inclusión -->
  <?php include './vistas/header.php'; ?>

  <div class="contenedor1">

     <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item" role="presentation">
      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Usuarios</button>
      </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Items</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Otros</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#disabled-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" disabled>Disabled</button>
    </li>

    </ul>   
    <div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
  <div style="color: white;">

  <?php include './vistas/tablas/tablaUsuario.php'; ?>

    <form action="./controladora/ctrlUsuario.php" method="post" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="fNombre" required>
          </div>
          <div class="mb-3">
            <label for="correo" class="form-label">Correo:</label>
            <input type="email" class="form-control" id="correo" name="fCorreo" required>
          </div>
          <div class="mb-3">
            <label for="contrasena" class="form-label">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" name="fContrasena" required>
          </div>
          <div class="mb-3">
            <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fFechaNacimiento" required>
          </div>
          <div class="mb-3">
            <label for="Rol" class="form-label">Seleccione Rol:</label>
            <select class="form-select" aria-label="Default select example" name="fRol">
                <option value="administrador">administrador</option>
                <option value="usuario">usuario</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label">Subir foto</label>
            <input class="form-control" type="file" id="formFile" name="fArchivo">

          </div>
          <div class="text-center">
            <button type="submit" class="btn btn-primary" name="EnviarAdm">Alta</button>
            <button type="submit" class="btn btn-primary" name="Modificardatos">Modificar</button>
            <button type="submit" class="btn btn-primary" name="Eliminardatos">Eliminar</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
    </form>
  </div>
  </div>
  <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">BBBB</div>
  <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">VCCCC</div>
  <div class="tab-pane fade" id="disabled-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">DDDDDD</div>
  </div>
  </div>
  </div>
  



</body>
<br>
<?php include './vistas/footer.php'; ?>
 
</html>
