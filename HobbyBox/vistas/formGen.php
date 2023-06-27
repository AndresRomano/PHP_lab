<?php

    $cat = "SELECT idGenero FROM genero";
    $idGen = $con->ejecutarSQL($cat);
?>
<div style="color: white;">
        <form action="./controladora/ctrlGenero.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                        <label for="genero" class="form-label">Nombre del Genero:</label>
                        <input type="text" class="form-control" id="genero" name="fGenero" required>
                      </div>
            <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="EnviarAdm">Alta</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>

        <form action="./controladora/ctrlGenero.php" method="post" enctype="multipart/form-data">
                      <div class="mb-3">
                      <label for="genero" class="form-label">Id del Genero:</label>
                      <select class="form-select" aria-label="Default select example" name="fIdGen">
                        <?php while ($fila = mysqli_fetch_assoc($idGen)) { ?>
                        <option value="<?php echo $fila['idGenero']; ?>"><?php echo $fila['idGenero']; ?></option>
                        <?php } ?>
                        </select>
                        <label for="genero" class="form-label">Nombre del Genero:</label>
                        <input type="text" class="form-control" id="genero" name="fGenero">
                      </div>
            <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="Modificardatos">Modificar</button>
                  <button type="submit" class="btn btn-primary" name="Eliminardatos">Eliminar</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form>
</div>