<?php
    $aut = "SELECT idAutor FROM autores";
    $autores = $con->ejecutarSQL($aut);
?>
<div style="color: white;">
        <form action="./controladora/ctrlAutor.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                      <label for="autor" class="form-label">Nombre del Autor:</label>
                      <input type="text" class="form-control" id="autor" name="fAutor" required>
                    </div>
            <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="EnviarAdm">Alta</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
      </form>

      <form action="./controladora/ctrlAutor.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                    <label for="categoria" class="form-label">idAutor:</label>
                    <select class="form-select" aria-label="Default select example" name="fIdAu">
                        <?php while ($fila = mysqli_fetch_assoc($autores)) { ?>
                        <option value="<?php echo $fila['idAutor']; ?>"><?php echo $fila['idAutor']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="mb-3">
                      <label for="autor" class="form-label">Nombre del Autor:</label>
                      <input type="text" class="form-control" id="autor" name="fAutor">
                    </div>
            <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="Modificardatos">Modificar</button>
                  <button type="submit" class="btn btn-primary" name="Eliminardatos">Eliminar</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
      </form>
 </div>