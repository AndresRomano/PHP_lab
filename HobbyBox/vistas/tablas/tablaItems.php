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
          <th></th>
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
    <td>  <a href="./vistas/tablas/eliminarItem.php?id=<?php echo $row['iditem']; ?>"><input type="hidden" name="id" value="iditem"> <button type="submit" class="btn btn-secondary" name="Eliminardatos">
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