<?php
    include ("../persistencia/connect.php");
    $con = new Conexion();

    $coleccion = $_POST ["fCol"];
    $titulo = $_POST ["fTitulo"];
    $genero = $_POST ["fGen"];
    $desc = $_POST ["fDescripcion"];
    $autor = $_POST ["fAutor"];
    $anio = $_POST ["fAnio"];
    $fIng = $_POST ["fFechaIngreso"];
    $nombrearchivo = $_FILES['fArchivo']['name'];
    $rutaDestino ="../imagenes/item_cards/";
    $rutaArchivo = $rutaDestino.$nombrearchivo;

     if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['EnviarAdm'])) {       
        // Verificar si se envió un archivo
            if (!empty($_FILES['fArchivo']['name'])) {
                $nombreArchivo = $_FILES['fArchivo']['name'];
                $rutaArchivo = $rutaDestino.$nombrearchivo;
        
                // Mover el archivo a la ubicación deseada
                if (move_uploaded_file($_FILES['fArchivo']['tmp_name'], $rutaArchivo)) {
                    $sql = "INSERT INTO item(coleccion, titulo, genero, descripcion, autor, año, imagen, fechaIngreso) VALUES ('$coleccion','$titulo','$genero','$desc','$autor','$anio','$nombreArchivo','$fIng')";
                    $con->ejecutarSQL($sql);
                    header("location: ../indexAdmin.php");
                    exit;
                } else {
                    echo "Error al mover el archivo";
                }
            } else {
                $nombreArchivo = null;
                $sql = "INSERT INTO item(coleccion, titulo, genero, descripcion, autor, año, imagen, fechaIngreso) VALUES ('$coleccion','$titulo','$genero','$desc','$autor','$anio','$nombreArchivo','$fIng')";
                $con->ejecutarSQL($sql);
                header("location: ../indexAdmin.php");
                exit;
            }
            
           
    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Eliminardatos'])){
        $sql = "delete from item where titulo='$titulo'";
        $con->ejecutarSQL($sql);
        header("location: ../indexAdmin.php");

    }elseif($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['Modificardatos'])){
        
        if (!empty($_FILES['fArchivo']['name'])) {
            $nombreArchivo = $_FILES['fArchivo']['name'];
            $rutaArchivo = $rutaDestino.$nombrearchivo;
    
            // Mover el archivo a la ubicación deseada
            if (move_uploaded_file($_FILES['fArchivo']['tmp_name'], $rutaArchivo)) {
            $sql = "UPDATE item SET coleccion='$coleccion', genero='$genero', descripcion='$desc', autor='$autor', año='$anio', imagen='$nombreArchivo', fechaIngreso='$fIng' WHERE titulo = '$titulo'";
            $con->ejecutarSQL($sql);
            header("location: ../indexAdmin.php");
            exit;
                } else {
                    echo "Error al mover el archivo";
                }
        } else {
                $nombreArchivo = null;
                $sql = "UPDATE item SET coleccion='$coleccion', genero='$genero', descripcion='$desc', autor='$autor', año='$anio', imagen='$nombreArchivo', fechaIngreso='$fIng' WHERE titulo = '$titulo'";
                $con->ejecutarSQL($sql);
                header("location: ../indexAdmin.php");
                exit;
            }
    }
?>