
<div class="contenedor1">
    <?php 
    include ("./persistencia/connect.php");
    $con = new Conexion();?>
    <table class="table table-striped table-bordered">
      <tr>
          <th>idusuario</th>
          <th>nombre</th>
          <th>correo</th>
          <th>password</th>
          <th>fecha</th>
          <th>permisos</th>
          <th>imagen</th>
          <th></th>
      </tr>
    <?php
    $sql1 ="SELECT * from usuario";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['idusuario']  ?></td>
    <td><?php echo $row['nombre'] ?></td>
    <td><?php echo $row['correo'] ?></td>
    <td><?php echo $row['password'] ?></td>
    <td><?php echo $row['fecha'] ?></td>
    <td><?php echo $row['permisos'] ?></td>
    <td><?php echo $row['imagen'] ?></td>
    <td>  <a href="./vistas/tablas/eliminarUsuario.php?id=<?php echo $row['idusuario']; ?>"><input type="hidden" name="id" value="idusuario"> <button type="submit" class="btn btn-secondary" name="Eliminardatos">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
    </svg>
    </button> </a> </td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>
 