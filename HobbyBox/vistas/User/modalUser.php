<div class="modal fade " id="modalForm" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content bg-dark" style="color: white";>
        <div class="modal-header">
          <h5 class="modal-title" id="modalFormLabel">Cambiar Imagen:</h5>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
        <div class="modal-body">
          <form action="./controladora/cambiar_imagen.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nuevaImagen">Nueva Imagen</label>
              <br>
              <input type="file" class="form-control-file" id="nuevaImagen" name="fArchivo" accept="image/*" required>
            </div>
            <br>
            <div class=" d-flex w-100 align-items-center justify-content-between" style="color: white;">
              <button type="submit" name="Enviar" class="btn btn-outline-primary me-1 flex-grow-1">Guardar Cambios</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>