<div class="contenedor1">
    <table class="table table-striped table-bordered">
      <tr>
          <th>idGenero</th>
          <th>nombre</th>
      </tr>
    <?php
    $sql1 ="SELECT * from genero";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['idGenero']  ?></td>
    <td><?php echo $row['nombre'] ?></td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>