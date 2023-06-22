<div>
<form action="../controladora/ctrlUsuario.php" method="post">
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
        <div class="text-center">
          <button type="submit" class="btn btn-primary" name="EnviarUsr">Enviar</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
</form>
</div>
