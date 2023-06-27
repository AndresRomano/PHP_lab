<?php

    $cat = "SELECT nombreCategoria FROM categorias";
    $Cols = "SELECT idcoleccion FROM coleccion";
    $cate = "SELECT nombreCategoria FROM categorias";
    $categorias = $con->ejecutarSQL($cat);
    $idCol = $con->ejecutarSQL($Cols);
    $categ = $con->ejecutarSQL($cate);
?>
<div style="color: white;" class="popup">
        <form action="./controladora/ctrlColeccion.php" method="post" enctype="multipart/form-data" id="myForm">
                    <div class="mb-3">
                      <label for="categoria" class="form-label">Nombre de Coleccion:</label>
                      <input type="text" class="form-control" id="coleccion" name="fColeccion" required>
                    </div>
                    <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <select class="form-select" aria-label="Default select example" name="fCategoria">
                        <?php while ($fila = mysqli_fetch_assoc($categorias)) { ?>
                        <option value="<?php echo $fila['nombreCategoria']; ?>"><?php echo $fila['nombreCategoria']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="EnviarAdm">Alta</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
        </form>

        <form action="./controladora/ctrlColeccion.php" method="post" enctype="multipart/form-data" id="myForm">
                    <div class="mb-3">
                    <label for="categoria" class="form-label">idColeccion:</label>
                    <select class="form-select" aria-label="Default select example" name="fidColeccion">
                        <?php while ($fila = mysqli_fetch_assoc($idCol)) { ?>
                        <option value="<?php echo $fila['idcoleccion']; ?>"><?php echo $fila['idcoleccion']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                    <div class="mb-3">
                      <label for="categoria" class="form-label">Nombre de Coleccion:</label>
                      <input type="text" class="form-control" id="coleccion" name="fColeccion" required>
                    </div>
                    <div class="mb-3">
                    <label for="categoria" class="form-label">Categoria:</label>
                    <select class="form-select" aria-label="Default select example" name="fCategoria">
                        <?php while ($fila = mysqli_fetch_assoc($categ)) { ?>
                        <option value="<?php echo $fila['nombreCategoria']; ?>"><?php echo $fila['nombreCategoria']; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="Modificardatos">Modificar</button>
                    <button type="submit" class="btn btn-primary" name="Eliminardatos">Eliminar</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
        </form>
</div>