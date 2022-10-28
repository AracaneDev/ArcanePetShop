  
  <?php 
    
    if(isset($_REQUEST['guardar'])){
        $email = mysqli_real_escape_string($db,$_REQUEST['email'] ??' ');
        $pass = mysqli_real_escape_string($db,$_REQUEST['pass'] ?? '');
        $nombre = mysqli_real_escape_string($db,$_REQUEST['nombre'] ?? '');
        $id = mysqli_real_escape_string($db,$_REQUEST['id'] ?? '');

        $respuesta = $db->actualizarUsuario($email,$pass,$nombre,$id);
        if($respuesta){
            echo '<meta http-equiv="refresh" content="0; url=panel.php?modulo=usuarios&mensaje=Usuario '.$nombre.' editado exitosamente" />  ';
        }else{
            ?>
                <div class="alert alert-danger" role="alert">
                    Error al crear usuario <?php echo mysqli_error($db); ?>
                </div>
            <?php 
            }
        }
        $id = mysqli_real_escape_string($db,$_REQUEST['id']??'');
        $user = $db->buscarUsuario($id);
    ?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Crear Usuario</h1>
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
                    <form action="panel.php?modulo=editarUsuario" method="post">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo $user['email'] ?>" required="Requerido">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" name="pass" class="form-control" value="<?php echo $user['pass'] ?>" required="Requerdio">
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="<?php echo $user['nombre'] ?>" required="Requerido">
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $user['id'] ?>">
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