  

<?php 

if(isset($_REQUEST['idBorrar'])){
    $id = mysqli_real_escape_string($db,$_REQUEST['idBorrar'] ?? '');
    $res = $db->borrarUsuario($id);
    if($res){
      ?>
        <div class="alert alert-warning float-right" role="alert">
            Usuario borrado con exito.
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
            <h1>Usuarios</h1>
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
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones
                        <a href="panel.php?modulo=crearUsuario"><i class="fa fa-plus"></i></a>
                    </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        $users = $db->getUsers();
                        while($user = $users->fetch_assoc()){
                        ?>
                            <tr>
                                <td><?php echo $user['nombre'] ?></td>
                                <td><?php echo $user['email'] ?></td>
                                <td>
                                    <a href="panel.php?modulo=editarUsuario&id=<?php echo $user['id'] ?>" style="margin-right: 100px;"><i class="fas fa-edit"></i></a>
                                    <a href="panel.php?modulo=usuarios&idBorrar=<?php echo $user['id'] ?>" class="text-danger borrar"><i class="fas fa-trash"></i></a>
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