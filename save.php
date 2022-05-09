<?php 
    include("database/conexion.php");

    var_dump($_POST);
    if(isset($_POST['save'])){
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $query = "INSERT INTO articulo (nombre, descripcion, precio) VALUES ('$nombre', '$descripcion', $precio)";
        $resultado = mysqli_query($conn, $query);
        if($resultado){
            header("Location: index.php");
        }else{
            die("Fallo al registrar el artículo");
        }
    }
?>