<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
  <li class="nav-item">
    <input type="button" name="Login" id="openLog" value="Iniciar sesión">
  </li>
  <li class="nav-item">
    <a class="nav-link" href="./vistas/signup.php">Registrarse</a>
  </li>
</ul>

<div class="login-box" id="popUpLog" style="display:none;">
    <div class="bg-dark text-light p-4 rounded">
    <div><a href="#" id="CloseLog">X</a></div>
    <h1>Iniciar sesión</h1>
    <form action="../controladora/iniciarSesion.php" method="post">
      <div class="mb-3">
        <label for="email" class="form-label">Correo</label>
        <input type="email" class="form-control" id="email" name="fEmail" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="password" class="form-control" id="password" name="fPassword" required>
      </div>
      <div class="d-grid gap-1 container-fluid" style="margin-top: 5%">
      <button type="submit" class="btn btn-primary">Acceder</button>
      </div>
    </form>
    <p>No tienes una cuenta? <a href="signup.php">Regístrate aquí</a></p>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#openLog").on("click", function () {
        $("#popUpLog").fadeIn("slow");
      });
      $("#CloseLog").on("click", function () {
        $("#popUpLog").fadeOut("slow");
      });
    });
  </script>