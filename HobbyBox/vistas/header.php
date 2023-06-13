<?php 
if(isset($_SESSION["usuario"])){//si existe..
            $btn="./vistas/botones/botonesLogged.php";
        }else{
          $btn="./vistas/botones/botones.php";
        } 
?>

<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
            <a class="navbar-brand" href="index.php"> <img src="./imagenes/hobby box.png" alt="Logo" height="60">HobbyBox</a>
              <form class="d-flex ms-auto mb-2 mb-lg-0" style="width: 70rem;">
                <input class="form-control me-2" type="search" placeholder="Buscar: películas, cómics, libros; Por autor, saga, editorial..." aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
              </form>
              <?php include $btn; ?>
            </div>
</nav>
</header>