<div class="contenedor1">
    <table class="table table-striped table-bordered">
      <tr>
          <th>idcoleccion</th>
          <th>nombre</th>
          <th>categoria</th>
      </tr>
    <?php
    $sql1 ="SELECT * from coleccion";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['idcoleccion']  ?></td>
    <td><?php echo $row['nombre'] ?></td>
    <td><?php echo $row['categoria'] ?></td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>