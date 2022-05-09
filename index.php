<?php 
    include("includes/header.php");
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
                    <form action="save.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="Nombre del Artículo">
                        </div>
                        <div class="form-group">
                            <textarea name="descripcion" id="" cols="30" rows="10" class="form-control" placeholder="Descripción del Artículo"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" name="precio" id="" class="form-control">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save" value="Guardar">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Identificador</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            include("database/conexion.php");
                            $query = "SELECT * FROM articulo";
                            $resultado=mysqli_query($conn,$query);
                            while( $dato=mysqli_fetch_array($resultado)) { ?>
                                <tr>
                                    <th><?php echo $dato['codigo']; ?></th>
                                    <th><?php echo $dato['nombre']; ?></th>
                                    <th><?php echo $dato['descripcion']; ?></th>
                                    <th><?php echo $dato['precio']; ?></th>
                                    <th>
                                        <a href="edit.php?id=<?php echo $dato['codigo']; ?>"><i class="fas fa-edit"></i></a>
                                        <a href="delete.php?id=<?php echo $dato['codigo']; ?>"><i class="fas fa-trash"></i></a>
                                    </th>
                                </tr>                                
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php 
    include("includes/footer.php")
?>