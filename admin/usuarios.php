  
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
                                    <a href="editarUsuario.php?id=<?php echo $user['id'] ?>" style="margin-right: 100px;"><i class="fas fa-edit"></i></a>
                                    <a href="usuarios.php?idBorar=<?php echo $user['id'] ?>" class="text-danger"><i class="fas fa-trash"></i></a>
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