<?php
// Obtener el ID del usuario que inició sesión
$name = $_SESSION["idUser"];

// Incluir el archivo de conexión a la base de datos
require_once './persistencia/connect.php';
$con = new Conexion();

// Consulta para obtener la lista de amigos
$sql = "SELECT * FROM usuario INNER JOIN amigo ON usuario.idusuario = amigo.usuario2 WHERE amigo.usuario1 = '$name'";
$resultado = $con->ejecutarSQL($sql);

// Mostrar los amigos en el HTML
ob_start(); // Iniciar almacenamiento en búfer de salida

while ($row = $resultado->fetch_assoc()) {
    $nombre = $row['nombre'];
    $imagen = $row['imagen'];

    if (isset($imagen) && !empty($imagen)) {
        $imagePath = "./imagenes/" . $imagen;
    } else {
        $imagePath = "./imagenes/no-image.jpg";
    }
    // Mostrar la información del amigo
    ?>
    <a href="#" class="bg-dark list-group-item list-group-item-action py-3 lh-sm">
        <div class="d-flex w-100 align-items-center justify-content-between">
            <img src="<?php echo $imagePath; ?>" alt="Avatar" class="img-fluid" style="width: 180px; border-radius: 10px;">
        </div>
        <div class="flex-grow-1 ms-3">
            <h5 class="mb-1" style="color: white;"><?php echo $nombre; ?></h5>
            <div class="d-flex w-100 align-items-center justify-content-between btn btn-outline-secondary">
                <button type="button" class="btn btn-danger me-1 flex-grow-1 eliminar-btn" data-amigo-id="<?php echo $row['idusuario']; ?>">Dejar de seguir</button>
            </div>
        </div>
    </a>
    <?php
}

$amigosHTML = ob_get_clean(); // Obtener el contenido del búfer de salida completo para todos los amigos

// Mostrar mensaje si no se encontraron amigos
if ($resultado->num_rows === 0) {
    $amigosHTML = '<p>No se encontraron amigos.</p>';
}
?>

<section style="padding-right: 12px; margin-top: 1%;" class="d-flex" id="lista-amigos">
    <aside class="bg-dark d-flex flex-column align-items-stretch flex-shrink-0 float-end rounded-start rounded-end" style="width: 380px;">
        <div class="bg-body-tertiary d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom float-end rounded-start">
            <span class="fs-5 fw-semibold">Mis Amigos</span>
        </div>
        <div class="list-group list-group-flush border-bottom scrollarea form input d-flex">
            <?php echo $amigosHTML; ?>
        </div>
    </aside>
</section>

<?php include './vistas/User/scriptEliminarAmigo.php'; ?>
