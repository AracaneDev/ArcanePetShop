<?php

    if (isset($_REQUEST['guardar'])) {
        $nombre = mysqli_real_escape_string($db, $_REQUEST['nombre'] ?? ' ');
        $descripcion = mysqli_real_escape_string($db, $_REQUEST['descripcion'] ?? '');
        $precio = $_REQUEST['precio'];
        $existencia = $_REQUEST['existencia'];

        $respuesta = $db->actualizarProducto($nombre, $descripcion, $precio, $existencia, $id);

        if($respuesta){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto '.$nombre.' editado exitosamente" />  ';
        }else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al crear usuario <?php echo mysqli_error($db); ?>
                </div>
            <?php 
            }
        }
    $id = mysqli_real_escape_string($db,$_REQUEST['id']??'');
    $producto = $db->detalleProducto($id);
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear Producto</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="panel.php?modulo=crearProducto" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo $producto['nombre'] ?>" required="Requerido">
                                </div>
                                <div class="form-group">
                                    <label>Descripcion</label>
                                    <input type="text" name="descripcion" class="form-control" value="<?php echo $producto['Descripción'] ?>" required="Requerido">
                                </div>
                                <div class="form-group">
                                    <label>Precio</label>
                                    <input type="number" name="precio" class="form-control" value="<?php echo $producto['precio'] ?>" required="Requerido">
                                </div>
                                <div class="form-group">
                                    <label>Existencia</label>
                                    <input type="number" name="existencia" class="form-control" value="<?php echo $producto['existencia'] ?>" required="Requerido">
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
                                    <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->