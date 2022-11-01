  
<?php 

if(isset($_REQUEST['idBorrar'])){
    $id = mysqli_real_escape_string($db,$_REQUEST['idBorrar'] ?? '');
    $res = $db->borrarProducto($id);
    if($res){
      ?>
        <div class="alert alert-warning float-right" role="alert">
            Producto borrado con exito.
        </div>
      <?php
    }else{
      ?>
      <div class="alert alert-danger float-right" role="alert">
          Error al borrar <?php echo mysqli_error($db); ?>
      </div>
    <?php
    }
  }

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Productos</h1>
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
                <div class="botones">
                  <a href="panel.php?modulo=crearProducto" class="btn btn-success mb-2">Nuevo</a>
                </div>
                <table id="tablaProductos" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencia</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                        $productos = $db->getAllProductos();
                        while($producto = $productos->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $producto['nombre'] ?></td>
                                <td><?php echo $producto['precio'] ?></td>
                                <td><?php echo $producto['existencia'] ?></td>
                                <td><?php echo $producto['Descripción'] ?></td>
                                <td>
                                    <a href="panel.php?modulo=editarProducto&id=<?php echo $producto['id'] ?>" style="margin-right: 100px;"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                  </tbody>


                </table>
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