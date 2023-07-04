<?php
require_once './persistencia/connect.php';
$con = new Conexion();

// Realizar la consulta a la base de datos para obtener los items de la categoría y colección especificadas
$sql = "SELECT i.iditem, i.coleccion, i.titulo, i.imagen, c.categoria FROM item AS i
        INNER JOIN coleccion AS c ON i.coleccion = c.nombre
        WHERE c.categoria = '$categoria' AND i.iditem IN (SELECT item FROM `coleccion-usuario` WHERE usuario='" . $_SESSION['idUser'] . "')
        ORDER BY i.coleccion"; // Ordenar por colección
$resultado = $con->ejecutarSQL($sql);

// Verificar si se encontraron resultados
if ($resultado && $resultado->num_rows > 0) {
    echo '<div class="row">';
    $coleccionActual = null; // Variable para almacenar la colección actual

    // Recorrer los resultados y generar las cards según la categoría y colección
    while ($row = $resultado->fetch_assoc()) {
        // Obtener los valores de los atributos del item y la colección
        $id = $row['iditem'];
        $titulo = $row['titulo'];
        $imagen = $row['imagen'];
        $coleccion = $row['coleccion'];

        if (isset($imagen) && !empty($imagen)) {
            $imagePath = "./imagenes/item_cards/" . $imagen;
        } else {
            $imagePath = "./imagenes/item_cards/no-image.jpg";
        }

        // Mostrar el nombre de la colección solo cuando cambie
        if ($coleccion != $coleccionActual) {
            if ($coleccionActual !== null) {
                echo '</div>'; // Cerrar el contenedor de la colección anterior
            }
            echo '<div class="contenedor1">';
            echo '<h5 style="color: white;">Colección: ' . $coleccion . '</h5>';
            $coleccionActual = $coleccion;

            // Consulta para obtener el total de items de la colección
    $sqlTotalItems = "SELECT COUNT(*) AS total_items FROM item WHERE coleccion = '$coleccion'";
    $totalItems = $con->ejecutarSQL($sqlTotalItems)->fetch_assoc()['total_items'];

    // Consulta para obtener el total de items del usuario en la colección
    $sqlItemsUsuario = "SELECT COUNT(*) AS total_items_usuario FROM  item
        WHERE coleccion = '$coleccion' and iditem IN(SELECT item FROM `coleccion-usuario` WHERE usuario='" . $_SESSION['idUser'] . "')";
    $totalItemsUsuario = $con->ejecutarSQL($sqlItemsUsuario)->fetch_assoc()['total_items_usuario'];

    $porcentajeProgreso = ($totalItemsUsuario / $totalItems) * 100;

    echo '<div class="progress"> 
                <div class="progress-bar" role="progressbar" style="width: ' . $porcentajeProgreso . '%;" aria-valuenow="' . $porcentajeProgreso . '" aria-valuemin="0" aria-valuemax="100"></div>
            </div>';
    echo '<p style="color: white;">Porcentaje de progreso: ' . $porcentajeProgreso . '</p>';
        }

        // Generar la card dinámica según la categoría y colección
        echo '<div class="col-2">
            <div class="card" style="width: 10rem; align-items: center; color: white; background-color: rgb(61, 61, 61);">
                <img src="' . $imagePath . '" width="100" height="150" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">' . $titulo . '</h5>
                    <a href="./item.php?id=' . $id . '" class="btn btn-secondary">Ver Item</a>
                    <form action="./controladora/ctrlItemObt.php" method="POST">
                        <input type="hidden" name="itemId" value="' . $id . '">
                        <button type="submit" class="btn btn-danger" name="Eliminar">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>';
    }
    echo '</div>';

    // Cerrar el último contenedor de la colección
    echo '</div>';

} else {
    // No se encontraron resultados para la categoría y colección especificadas
    echo '<p style="color: white;">No se encontraron items en esta categoría y colección.</p>';
}
?>