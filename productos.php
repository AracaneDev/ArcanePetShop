<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <link rel="stylesheet" href="./style/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@700&display=swap" rel="stylesheet" />
    <title>Arcane Pet Shop | Productos</title>
</head>

<body>
    <header>
        <div class="huellas">
            <figure class="fig-back">
                <img src="./img/logo-removebg-preview.png" alt="" id="logo" />
            </figure>

            <nav class="nav">
                <ul>
                    <li><a href="./index.html">Inicio</a></li>
                    <li><a href="">Empresa</a></li>
                    <li><a href="./productos.php">Productos</a></li>
                    <li><a href="./admin/index.php">Login/Sign Up</a></li>
                    <li><a href="">Contactenos</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav class="navbar navbar-expand navbar-dark">

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-3" action="./productos.php?modulo=productos">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar bg-gray" type="search" placeholder="Search" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre']?? '' ?>">
                            <input type="hidden" name="modulo" value="productos">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Right navbar links -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Brad Diesel
                                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">Call me whenever you can...</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="admin/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Nora Silvester
                                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">The subject goes here</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <div class="row mt-4">
                    <?php
                    require_once "./controladorDB.php";
                    $db = db::getDBConnection();
                    $where = " where 1=1 ";
                    $nombre = mysqli_real_escape_string($db,$_REQUEST['nombre']??'');
                    if (empty($nombre) == false){
                        $where = "and nombre like '%".$nombre."%'";
                    }
                    $totalRegistros = $db->totalProductos($where);

                    $elementosPorPagina = 6;
                    $totalPaginas = ceil($totalRegistros/$elementosPorPagina);
                    $paginaSel = $_REQUEST['pagina']??false;
                    if($paginaSel == false){
                        $inicioLimite = 0;
                        $paginaSel = 1;
                    }else{
                        $inicioLimite = ($paginaSel-1)*$elementosPorPagina;
                    }
                    $limite = " limit $inicioLimite,$elementosPorPagina ";

                    $productos = $db->getProductos($where,$limite);
                    
                    while ($producto = $productos->fetch_assoc()) {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="card border-primary">
                                <img  class="card-img-top img-thumbnail" src="<?php echo $producto['web_path']?>" alt="">
                                <div class="card-body">
                                    <h4 class="card-tittle"><?php echo $producto['nombre']?></h4>
                                    <p class="card-text"><strong>Precio: </strong><?php echo $producto['precio']?></p>
                                    <p class="card-text"><strong>Existencia: </strong><?php echo $producto['existencia']?></p>
                                    <a href="#" class="btn btn-primary">Ver</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php 
                    if($totalPaginas > 0){
                        ?>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php
                                        if($paginaSel != 1){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="./productos.php?modulo=productos&pagina= <?php echo ($paginaSel-1); ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <?php 
                                        }
                                    ?>

                                    <?php 
                                        for ($i=1;$i<=$totalPaginas;$i++){
                                    ?>
                                    <li class="page-item <?php echo ($paginaSel==$i)?" active " : " "; ?>">
                                        <a class="page-link" href="./productos.php?modulo=productos&pagina=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php 
                                        }
                                    ?>
                                    <?php 
                                        if( $paginaSel != $totalPaginas){
                                    ?>
                                    <li class="page-item">
                                        <a class="page-link" href="./productos.php?modulo=productos&pagina= <?php echo ($paginaSel+1); ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                    <?php 
                                        }
                                    ?>
                                </ul>
                            </nav>
                        <?php
                        }
                ?>
            </div>
        </div>
    </div>

    <footer>
        <div class="float-3">
            <img src="./img/logo-removebg-preview.png" class="img-f" />
            <p>
                En Arcane Pet Shop buscamos ofrecer los mejores productos llenos de
                calidad y amor para nuestros amigos peludos.
            </p>
        </div>

        <div class="float-3 contact">
            <h3>Contactenos</h3>
            <ul>
                <li>Calle 67 #53-108</li>
                <li>Medellin - Colombia</li>
                <li>(604)252 90 27</li>
                <li>Lunes - Sabado 8:00 AM - 6:00 PM</li>
            </ul>
            <a href="https://web.facebook.com/?_rdc=1&_rdr"><img src="./img/facebook.png" class="img-r face"></a>
            <a href="https://www.instagram.com/"><img src="./img/instagram.png" class="img-r insta"></a>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- daterangepicker -->
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- AdminLTE App -->
    <script src="admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/dist/js/pages/dashboard.js"></script>
</body>

</html>