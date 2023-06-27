
<div class="contenedor1">
    <table class="table table-striped table-bordered">
      <tr>
          <th>idCategoria</th>
          <th>nombreCategoria</th>
      </tr>
    <?php
    $sql1 ="SELECT * from categorias";
    foreach ($con->ejecutarSQL($sql1) as $row){
    ?> 
    <tr>
    <td><?php echo $row['idcategorias']  ?></td>
    <td><?php echo $row['nombreCategoria'] ?></td>
    </tr>
    <?php
    }
    ?>
     </table>
</div>