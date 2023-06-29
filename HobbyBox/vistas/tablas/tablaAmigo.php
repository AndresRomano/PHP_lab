<?php
$name = $_SESSION["idUser"];
?>
<div class="contenedor1">
    <?php 
    include ("./persistencia/connect.php");
    $con = new Conexion();?>
    <table class="table table-striped table-bordered">
      <tr>
          <th>idusuario</th>
          <th>nombre</th>
          <th>imagen</th>
          <th></th>
      </tr>
    <?php
    $sql1 ="SELECT * from amigo inner join usuario on amigo.usuario2 = usuario.idusuario where usuario1 = '".$name."'";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
     
    <td><?php echo $row['nombre'] ?></td>
    <td><?php echo $row['imagen'] ?></td>
    
    </button> </a> </td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>
 