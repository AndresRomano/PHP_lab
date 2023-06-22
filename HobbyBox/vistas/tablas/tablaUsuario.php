    <?php 
    include ("./persistencia/connect.php");
    $con = new Conexion();?>
    <table style="border: 1px solid; border-collapse: collapse;">
      <tr>
          <th>idusuario</th>
          <th>nombre</th>
          <th>correo</th>
          <th>password</th>
          <th>fecha</th>
          <th>permisos</th>
          <th>imagen</th>

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
    </tr>
    <?php
    }
    ?>