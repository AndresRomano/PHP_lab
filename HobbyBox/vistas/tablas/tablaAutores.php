<div class="contenedor1">
    <table class="table table-striped table-bordered">
      <tr>
          <th>idAutor</th>
          <th>nombre</th>
      </tr>
    <?php
    $sql1 ="SELECT * from autores";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['idAutor']  ?></td>
    <td><?php echo $row['nombre'] ?></td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>