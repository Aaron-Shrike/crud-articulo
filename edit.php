<?php 
    include("database/conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT nombre, descripcion, precio FROM articulo WHERE codigo = $id;";
        $resultado = mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado) == 1){
            $registro = mysqli_fetch_array($resultado);
            $nombre = $registro['nombre'];
            $descripcion = $registro['descripcion'];
            $precio = $registro['precio'];
        }
    }

    //actualizar
    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];

        $query = "UPDATE articulo SET nombre = $nombre, descripcion = $descripcion, precio = $precio WHERE codigo = $id;";
        $resultado = mysqli_query($conn, $query);
        header("Location: index.php");
    }
?>
<?php 
    include("includes/header.php")
?>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <a href="" class="navbar-brand">Artículos</a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-body">
                    <form action="edit.php?id=<?php echo $dato['codigo']; ?>" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Artículo" value="<?php echo $nombre ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Descripción del Artículo"><?php echo $descripcion; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="precio" id="" class="form-control" value="<?php echo $precio; ?>">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="update" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php 
    include("includes/footer.php")
?>