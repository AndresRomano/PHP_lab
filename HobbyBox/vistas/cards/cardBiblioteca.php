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
            echo '<div class="contenedor1 row ">';
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
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
        echo '<div class="card" style="width: 100%; height: 400px; align-items: center; color: white; background-color: rgb(61, 61, 61);">';
        echo '<div style="height: 200px; overflow: hidden;">'; // Altura fija para la imagen
        echo '<img src="' . $imagePath . '" class="card-img-top" style="width: 100%; height: 100%; object-fit: cover;">'; // Ajuste de imagen con object-fit
        echo '</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $titulo . '</h5>';
        echo '<a href="./item.php?id=' . $id . '" class="btn btn-secondary">Ver Item</a>';
        echo '<form action="./controladora/ctrlItemObt.php" method="POST">';
        echo '<input type="hidden" name="itemId" value="' . $id . '">';
        echo '<button type="submit" class="btn btn-danger" name="Eliminar">Eliminar</button>';
        echo '</form>';
        echo '</div>';
        echo '</div>';
        echo '</div>';


}
echo '</div>';

    // Cerrar el último contenedor de la colección
    echo '</div>';

} else {
    // No se encontraron resultados para la categoría y colección especificadas
    echo '<p style="color: white;">No se encontraron items en esta categoría y colección.</p>';
}
?>