<?php
    $sql = "SELECT nombre FROM coleccion";
    $sql2 = "SELECT nombre FROM genero";
    $sql3 = "SELECT nombre FROM autores";
    $colecciones = $con->ejecutarSQL($sql);
    $generos = $con->ejecutarSQL($sql2);
    $autores = $con->ejecutarSQL($sql3);
?>

<div style="color: white;">
      <form action="./controladora/ctrlItem.php" method="post" enctype="multipart/form-data">

                <div class="mb-3">
                <label for="Rol" class="form-label">Seleccione coleccion: </label>
                <select class="form-select" aria-label="Default select example" name="fCol">
                <?php while ($fila = mysqli_fetch_assoc($colecciones)) { ?>
                <option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="mb-3">
                  <label for="titulo" class="form-label">Titulo:</label>
                  <input type="text" class="form-control" id="titulo" name="fTitulo" required>
                </div>

                <div class="mb-3">
                <label for="Rol" class="form-label">Seleccione genero: </label>
                <select class="form-select" aria-label="Default select example" name="fGen">
                <?php while ($fila = mysqli_fetch_assoc($generos)) { ?>
                <option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="mb-3">
                  <label for="descripcion" class="form-label">Descripcion:</label>
                  <input type="text" class="form-control" id="descripcion" name="fDescripcion" required>
                </div>

                <div class="mb-3">
                <label for="Rol" class="form-label">Seleccione Autor: </label>
                <select class="form-select" aria-label="Default select example" name="fAutor">
                <?php while ($fila = mysqli_fetch_assoc($autores)) { ?>
                <option value="<?php echo $fila['nombre']; ?>"><?php echo $fila['nombre']; ?></option>
                <?php } ?>
                </select>
                </div>

                <div class="mb-3">
                  <label for="anio" class="form-label">Año:</label>
                  <input type="number" class="form-control" id="anio" name="fAnio" min="1900" max="2099" step="1" placeholder="Ingrese un año (1900-2099)" required>
                </div>

                <div class="mb-3">
                  <label for="formFile" class="form-label">Subir Imagen:</label>
                  <input class="form-control" type="file" id="formFile" name="fArchivo">
                </div>

                <div class="mb-3">
                  <label for="fechaIngreso" class="form-label">Fecha de Ingreso:</label>
                  <input type="date" class="form-control" id="fechaIngreso" name="fFechaIngreso" required>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="EnviarAdm">Alta</button>
                  <button type="submit" class="btn btn-primary" name="Modificardatos">Modificar</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
      </form>
      </div>