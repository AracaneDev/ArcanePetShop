  <?php

    if (isset($_REQUEST['guardar'])) {
        $nombre = mysqli_real_escape_string($db, $_REQUEST['nombre'] ?? ' ');
        $descripcion = mysqli_real_escape_string($db, $_REQUEST['descripcion'] ?? '');
        $precio = $_REQUEST['precio'];
        $existencia = $_REQUEST['existencia'];

        $respuesta = $db->crearProducto($nombre, $descripcion, $precio, $existencia);

        if ($respuesta) {
            foreach ($_FILES['imagenes']['tmp_name'] as $key => $tmp_name) {

               $respuestaFile = $db->crearFiles($_FILES['imagenes']['name'][$key], $_FILES['imagenes']['size'][$key]);

                 if ($respuestaFile) {

                    if ($_FILES['imagenes']['name'][$key]) {

                        $id = $db->getIdFile();
                        $filename =$id['id'];
                        $temporal = $_FILES['imagenes']['tmp_name'][$key];

                        $directorio = "../upload/";

                        if (!file_exists($directorio)) {
                            mkdir($directorio, 0777);
                        }

                        $destino = $directorio.'/'.$filename.".jpg";
                        $ruta = $_FILES['imagenes']['tmp_name'][$key];

                        move_uploaded_file($temporal, $destino);

                    }
                }else {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            Error al crear producto <?php echo mysqli_error($db); ?>
                        </div>
                    <?php
                } 
                $otraTabla = $db->crearRelacion();               
            }
        }

        if ($respuesta) {
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=productos&mensaje=Producto creado exitosamente" />  ';
        } else {
        ?>
          <div class="alert alert-danger" role="alert">
              Error al crear producto <?php echo mysqli_error($db); ?>
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
                                      <input type="text" name="nombre" class="form-control" required="Requerido">
                                  </div>
                                  <div class="form-group">
                                      <label>Descripcion</label>
                                      <input type="text" name="descripcion" class="form-control" required="Requerido">
                                  </div>
                                  <div class="form-group">
                                      <label>Precio</label>
                                      <input type="number" name="precio" class="form-control" required="Requerido">
                                  </div>
                                  <div class="form-group">
                                      <label>Existencia</label>
                                      <input type="number" name="existencia" class="form-control" required="Requerido">
                                  </div>
                                  <div class="form-group">
                                      <label>Imagenes</label>
                                      <input type="file" name="imagenes[]" class="form-control" multiple="" required="Requerido">
                                  </div>
                                  <div class="form-group">
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