<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/estilos.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <title>Login</title>
</head>
<body class="img" style="background-image: url(../imagenes/bg.png);">
  <?php include 'navbar.php'; ?>
  <div class="login-box">
    <div class="bg-dark text-light p-4 rounded">
    <h1>Iniciar sesión</h1>
    <form action="../controladora/iniciarSesion.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" class="form-control" id="correo" name="fCorreo" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="contrasena" name="fContrasena" required>
      </div>

      <?php
        if (isset($_GET['error'])) {
          echo '<label for="genero" class="form-label" style="color:red">Credenciales incorrectas. Por favor, ingrese los datos nuevamente.</label>';
        }
        ?>

      <div class="d-grid gap-1 container-fluid" style="margin-top: 5%">
      <button type="submit" class="btn btn-primary">Acceder</button>
      </div>
    </form>
    <p>No tienes una cuenta? <a href="signup.php">Regístrate aquí</a></p>
  </div>
</body>
</html>
