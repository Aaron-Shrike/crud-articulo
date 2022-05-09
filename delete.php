<?php 
    include("database/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "DELETE FROM articulo WHERE codigo = $id;";
        $resultado = mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>