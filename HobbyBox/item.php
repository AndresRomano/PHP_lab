<?php
include("./persistencia/connect.php");
$con = new Conexion();
// Obtener el ID del item desde la URL
$idItem = $_GET['id'];

// Realizar consulta para obtener los datos del item
$sql = "SELECT * FROM item WHERE iditem = '$idItem'";
$resultado = $con->ejecutarSQL($sql);

if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Obtener los valores de los atributos del item
    $titulo = $row['titulo'];
    $imagen = $row['imagen'];
    $descripcion = $row['descripcion'];
    $coleccion = $row['coleccion'];
    $genero = $row['genero'];
    $autor = $row['autor'];
    $año = $row['año'];
    $puntaje = $row['puntaje'];
    $fechaIngreso = $row['fechaIngreso'];
    // Obtener más atributos del item según tus necesidades

    // Mostrar los datos del item
    echo '<h1>' . $titulo . '</h1>';
    echo '<img src="./imagenes/item_cards/' . $imagen . '" alt="' . $titulo . '" height="384">';
    echo '<p>Descripcion: ' . $descripcion . '</p>';
    echo '<p>Colección: ' . $coleccion . '</p>';
    echo '<p>Género: ' . $genero . '</p>';
    echo '<p>Autor: ' . $autor . '</p>';
    echo '<p>Año: ' . $año . '</p>';
    echo '<p>Puntaje: ' . $puntaje . '</p>';
    echo '<p>Fecha de Ingreso: ' . $fechaIngreso . '</p>';
    // Mostrar más atributos del item según tus necesidades
} else {
    echo '<p>No se encontró el item.</p>';
}
?>

