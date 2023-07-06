<?php include './vistas/User/navBarUser.php'; ?>
<?php
// Verificar si la clave 'nombre' está presente en el array
if (isset($_SESSION["nombre"])) {
  $nombreUsuario = $_SESSION["nombre"];
} else {
  $nombreUsuario = "ERROR";
}
?>
<?php
include("./persistencia/connect.php");
$con = new Conexion();


$itUsr = "SELECT COUNT(*) FROM `coleccion-usuario` WHERE usuario='" . $_SESSION['idUser'] . "'";
$resItUsr = $con->ejecutarSQL($itUsr)->fetch_assoc()['COUNT(*)'];

$colsUsr = "SELECT COUNT(DISTINCT coleccion) AS numColecciones FROM item WHERE iditem IN(SELECT item FROM `coleccion-usuario` WHERE usuario='" . $_SESSION['idUser'] . "')";
$resColsUsr = $con->ejecutarSQL($colsUsr)->fetch_assoc()['numColecciones'];

$desUsr = "SELECT COUNT(*) FROM `itemdeseado-usuario` WHERE usuario='" . $_SESSION['idUser'] . "'";
$resDesUsr = $con->ejecutarSQL($desUsr)->fetch_assoc()['COUNT(*)'];
?>
<br>
<main class="bg-secondary d-flex justify-content-between rounded-start rounded-end ">
  
<div class="d-flex align-items-center position-relative contenedor1 flex-column"> 
  <div class="d-flex flex-row contenedor1 ">
    
  <div class=" align-items-center text-center" style="color: white;">
    <a href="#" data-bs-toggle="modal" data-bs-target="#modalForm">
      <img src="<?php echo $imagePath; ?>" class="rounded-circle shadow-4" style="width: 150px; margin-right: 40px;" alt="Avatar" />
    </a>
    <br>
    <label for="nombre" class="form-label" style="margin: 0 auto; margin-left: -45px;"><?php echo $nombreUsuario; ?></label>
    </div>

    <?php include './vistas/User/modalUser.php'; ?>


      <div  class=" contenedor1 d-flex justify-content-between rounded-3 p-2" style="background-color: #efefef;">
          <div>
              <p class="small text-muted mb-1">Items</p>
              <p class="mb-0"><?php echo $resItUsr; ?></p>
          </div>
          <div class="px-3">
              <p class="small text-muted mb-1">Colecciones</p>
              <p class="mb-0"><?php echo $resColsUsr; ?></p>
          </div>
          <div>
              <p class="small text-muted mb-1">Buscados</p>
              <p class="mb-0"><?php echo $resDesUsr; ?></p>
          </div>
      </div>
  </div>


  <div  class="d-flex contenedor1">
    <div id="buscados" class="contenedor1 ">
          <?php include './vistas/User/indexDeseados.php'; ?>
    </div>
    <div id="bibliotecas" class="contenedor1 ">
          <?php include './vistas/User/indexBiblioteca.php'; ?>
    </div>
    <div id="amigos" class="contenedor1 row" >
    
    </div>
  </div>
</div>

  <?php include './vistas/User/listaAmigos.php'; ?>
  <?php include './vistas/User/scriptBuscador.php'; ?>
  <?php include './vistas/User/scriptUser.php'; ?>
  
</main>







                        
                        
                        


                        

