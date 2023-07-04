<?php
/*
require_once './persistencia/connect.php';
$con = new Conexion();

// Realizar la consulta a la base de datos para obtener los items de la categoría y colección especificadas
$sql = "SELECT i.iditem, i.coleccion, i.titulo, i.imagen, c.categoria FROM item AS i
        INNER JOIN coleccion AS c ON i.coleccion = c.nombre
        WHERE c.categoria = '$categoria' AND i.iditem IN (SELECT item FROM `itemdeseado-usuario` WHERE usuario='" . $_SESSION['idUser'] . "')
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
        }

        // Generar la card dinámica según la categoría y colección
        echo '<div class="col-2">
        <div class="card" style="width: 10rem; align-items: center; color: white; background-color: rgb(61, 61, 61);">
            <img src="' . $imagePath . '" width="100" height="150" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">' . $titulo . '</h5>
                <a href="./item.php?id=' . $id . '" class="btn btn-secondary">Ver Item</a>
            </div>
        </div>
    </div>';
    }
    echo '</div>';
} else {
    // No se encontraron resultados para la categoría y colección especificadas
    echo '<p style="color: white;">No se encontraron items en esta categoría y colección.</p>';
}
*/
?>