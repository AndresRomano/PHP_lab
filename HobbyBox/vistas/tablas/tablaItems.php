<div class="contenedor1">
    <table class="table table-striped table-bordered">
      <tr>
          <th>iditem</th>
          <th>coleccion</th>
          <th>titulo</th>
          <th>genero</th>
          <th>descripcion</th>
          <th>autor</th>
          <th>año</th>
          <th>puntaje</th>
          <th>imagen</th>
          <th>fechaIngreso</th>
      </tr>
    <?php
    $sql1 ="SELECT * from item";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['iditem']  ?></td>
    <td><?php echo $row['coleccion'] ?></td>
    <td><?php echo $row['titulo']  ?></td>
    <td><?php echo $row['genero'] ?></td>
    <td><?php echo $row['descripcion']  ?></td>
    <td><?php echo $row['autor'] ?></td>
    <td><?php echo $row['año']  ?></td>
    <td><?php echo $row['puntaje'] ?></td>
    <td><?php echo $row['imagen']  ?></td>
    <td><?php echo $row['fechaIngreso'] ?></td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>