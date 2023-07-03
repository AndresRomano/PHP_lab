<?php include './vistas/User/navBarUser.php'; ?>
<?php
// Verificar si la clave 'nombre' está presente en el array
if (isset($_SESSION["nombre"])) {
  $nombreUsuario = $_SESSION["nombre"];
} else {
  $nombreUsuario = "ERROR";
}
?>

<br>
<main class="bg-secondary d-flex justify-content-between rounded-start rounded-end ">
  
<div class="d-flex align-items-center position-relative contenedor1 flex-column"> 
  <div class="d-flex flex-row contenedor1">
    
    <div style="color: white; text-align: center;"> 
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalForm">
      <img src="<?php echo $imagePath; ?>" class="rounded-circle shadow-4" style="width: 150px; margin-right: 40px;" alt="Avatar" />
    </a>
    <br>
    <label for="nombre" class="form-label"><?php echo $nombreUsuario; ?></label>
    </div>

    <?php include './vistas/User/modalUser.php'; ?>


      <div  class=" contenedor1 d-flex justify-content-between rounded-3 p-2" style="background-color: #efefef;">
          <div>
              <p class="small text-muted mb-1">Items</p>
              <p class="mb-0">41</p>
          </div>
          <div class="px-3">
              <p class="small text-muted mb-1">Coleccion</p>
              <p class="mb-0">976</p>
          </div>
          <div>
              <p class="small text-muted mb-1">Buesquedas</p>
              <p class="mb-0">8.5</p>
          </div>
          <div>
              <p class="small text-muted mb-1">bibliotecas</p>
              <p class="mb-0">8.5</p>
          </div>
      </div>
  </div>


  <div  class="d-flex contenedor1">
    <div id="buscados" class="contenedor1 " style="height: 600px;">
        <!-- Contenido de la sección "buscados" -->
    </div>
    <div id="novedades" class="contenedor1 " style="height: 600px;">
          <!-- Contenido de la sección "Novedades" -->
    </div>
    <div id="amigos" class="contenedor1 " style="height: 600px;">
          <?php include './vistas/User/buscadosUser.php'; ?>
    </div>
    <div id="bibliotecas" class="contenedor1 ">
          <?php include './vistas/indexBiblioteca.php'; ?>
    </div>
  </div>
</div>

  <?php include './vistas/User/listaAmigos.php'; ?>

</main>
<?php include './vistas/User/scriptUser.php'; ?>





                        
                        
                        


                        

