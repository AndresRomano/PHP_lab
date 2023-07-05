<?php
session_start();

// Incluir el archivo de conexión a la base de datos
$name = $_SESSION["idUser"];
require_once './persistencia/connect.php';
$con = new Conexion();
$con2 = new Conexion();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $searchTerm = $_POST['fSearch2'];
    // Crear una nueva instancia de la conexión a la base de datos

    // Realizar la búsqueda en la base de datos y obtener los resultados
    $sql = "SELECT * FROM usuario WHERE nombre LIKE '%$searchTerm%' AND NOT idusuario='$name'";
    $resultado = $con->ejecutarSQL($sql);
    // Mostrar los resultados de la búsqueda
    ob_start(); // Iniciar almacenamiento en búfer de salida
    echo '<div class="row">'; // Agregar una fila para contener las tarjetas de amigo
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['idusuario'];
        $nombre = $row['nombre'];
        $imagen = $row['imagen'];

        if (isset($imagen) && !empty($imagen)) {
            $imagePath = "./imagenes/" . $imagen;
        } else {
            $imagePath = "./imagenes/no-image.jpg";
        }
        ?>

        <div class="col-md-4"> <!-- Agregar una columna para cada tarjeta de amigo -->
            <div class="card mb-4 bg-dark  align-items-center" style="max-width: 300px; color: white; text-align: center;">
                <!-- Contenido de la tarjeta de amigo -->
                <br>
                <div class="g-0">
                    <div class=" align-items-center ">
                        <?php echo $nombre; ?>
                        <br>
                        <div class="align-items-center ">
                            <img src="<?php echo $imagePath; ?>" width="100" height="150" class="card-img-top rounded-circle" alt="Avatar" style="max-width: 200px;">
                        </div>
                        <br>
                    </div>
                    <?php
                    $query = "SELECT * FROM amigo WHERE usuario1='$name' AND usuario2='$id'";
                    $result = $con2->ejecutarSQL($query);

                    if ($result && mysqli_num_rows($result) == null) {
                        ?>
                        <form method="post">
                            <input type="hidden" name="amigo_id" value="<?php echo $id; ?>">
                            <input class="btn btn-outline-primary me-1 flex-grow-1" type="submit" name="seguir" value="Seguir" />
                        </form>
                        <?php
                    }

                    if (isset($_POST['seguir']) && isset($_POST['amigo_id'])) {
                        $amigo_id = $_POST['amigo_id'];
                        $sql = "INSERT INTO amigo (usuario1, usuario2) VALUES ('$name', '$amigo_id')";
                        $con->ejecutarSQL($sql);
                        echo "<script>
                            window.location.href='./indexUser.php';
                        </script>";
                    }
                    ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    echo '</div>'; // Cerrar la fila después de mostrar todas las tarjetas de amigo
    $searchResults = ob_get_clean(); // Obtener el contenido del búfer de salida completo para todos los resultados de búsqueda

    // Mostrar mensaje si no se encontraron resultados
    if ($resultado->num_rows === 0) {
        $searchResults = 'No se encontraron resultados.';
    }

    // Devolver los resultados de búsqueda como respuesta AJAX
    header('Content-Type: application/json');
    echo json_encode($searchResults);
    exit();
}
?>

