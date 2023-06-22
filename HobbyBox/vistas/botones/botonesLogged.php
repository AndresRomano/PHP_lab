<?php
if ($_SESSION["rol"] == "administrador") {
  $perfil='./indexAdmin.php';
}elseif ($_SESSION["rol"] == "usuario") {
  $perfil='./indexUser.php';
}
?>
<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="./controladora/cerrarSesion.php">Cerrar Sesión</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo $perfil; ?>">
                  <img src="./imagenes/item_cards/no-image.jpg" width="50" height="50" style="border-radius:25px;">
                  </a>
                </li>
            </ul>