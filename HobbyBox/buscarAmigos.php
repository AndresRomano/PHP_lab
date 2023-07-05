<?php
session_start();
?>

<?php
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
    while ($row = $resultado->fetch_assoc()) {
        $id = $row['idusuario'];
        $nombre = $row['nombre'];
        $imagen = $row['imagen'];

        if (isset($imagen) && !empty($imagen)) {
            $imagePath = "./imagenes/" . $imagen;
        } else {
            $imagePath = "./imagenes/no-image.jpg";
        }

        ob_start(); // Iniciar almacenamiento en búfer de salida para el resultado de búsqueda
        ?>
        <div class="card mb-3" style="max-width: 540px;">
            <br>
            <div class="row g-0">
                <div class="col-md-4">
                    <?php echo $nombre; ?>
                    <div class="col-2">
                        <div class="card" style="width: 10rem; align-items: center; color: white; background-color: rgb(61, 61, 61);">
                            <img src="<?php echo $imagePath; ?>" width="100" height="150" class="card-img-top">
                        </div>
                    </div>
                    <br>

                    <?php
                    $query = "SELECT * FROM amigo WHERE usuario1='$name' AND usuario2='$id'";
                    $result = $con2->ejecutarSQL($query);

                    if ($result && mysqli_num_rows($result) == null) {
                        ?>
                        <form method="post">
                            <input type="submit" name="<?php echo $id; ?>" value="Seguir" />
                        </form>
                    <?php
                    }

                    if (isset($_POST[$id])) {
                        $sql = "INSERT INTO amigo (usuario1, usuario2) VALUES ('$name', '$id')";
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
        $searchResultHTML = ob_get_clean(); // Obtener el contenido del búfer de salida para el resultado de búsqueda
        echo $searchResultHTML; // Mostrar el resultado de búsqueda en la página
    }
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
