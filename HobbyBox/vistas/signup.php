<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/estilos.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title>Formulario</title>
</head>
<body class="img" style="background-image: url(../imagenes/bg.png);">
  <?php include 'navbar.php'; ?>
  <div class="signup-box">
    <div class="bg-dark text-light p-4 rounded">
      <h1 class="text-center">Registro</h1>

      <form action="procesar.php" method="post">
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
          <label for="correo" class="form-label">Correo:</label>
          <input type="email" class="form-control" id="correo" name="correo" required>
        </div>
        <div class="mb-3">
          <label for="contrasena" class="form-label">Contraseña:</label>
          <input type="password" class="form-control" id="contrasena" name="contrasena" required>
        </div>
        <div class="mb-3">
          <label for="fechaNacimiento" class="form-label">Fecha de nacimiento:</label>
          <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="Enviar">Enviar</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
      <p>Tienes una cuenta? <a href="login.php">Inicia sesión aquí</a></p>
    </div>
  </div>

  <!-- Bootstrap JS -->
  
</body>
</html>