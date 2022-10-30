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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/estilos.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@700&display=swap" rel="stylesheet" />
    <title>Arcane Pet Shop | Productos</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-nav">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./img/logo-removebg-preview.png" alt="" width="130" height="70">
                </a>
            </div>
            <div class="container-fluid">
                </button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./index.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./empresa.php">Empresa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="./admin/index.php">Login</a>
                    </li>
                </ul>
                <form class="form-inline ml-3" action="./productos.php?modulo=productos">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar bg-light" type="search" placeholder="Buscar" aria-label="Search" name="nombre" value="<?php echo $_REQUEST['nombre'] ?? '' ?>">
                        <input type="hidden" name="modulo" value="productos">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
    </header>

    <div class="clear"></div>
    <?php
    require_once "./controladorDB.php";
    $db = db::getDBConnection();

    $modulo = $_REQUEST['modulo'] ?? '';
    if ($modulo == "productos" || $modulo == "") {
        include_once "productosT.php";
    }
    if ($modulo == "detalleProducto") {
        include_once "detalleProducto.php";
    }
    ?>


    <div class="clear"></div>

    <footer class="bg-beige text-center text-lg-start text-dark">
        <!-- Grid container -->
        <div class="container p-4">
            <!--Grid row-->
            <div class="row my-4">
                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">

                    <div class="rounded-circle bg-white shadow-1-strong d-flex align-items-center justify-content-center mb-4 mx-auto" style="width: 150px; height: 150px;">
                        <img src="./img/logo-removebg-preview.png" height="70" alt="" loading="lazy" />
                    </div>

                    <p class="text-center">En Arcane Pet Shop buscamos ofrecer los mejores productos llenos de
                        calidad y amor para nuestros amigos peludos.</p>

                    <ul class="list-unstyled d-flex flex-row justify-content-center">
                        <li>
                            <a class="text-dark px-2" href="#!">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark px-2" href="#!">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark ps-2" href="#!">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    </ul>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Tenemos</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Productos de Aseo</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Ropa</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Medicamentos</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Desparacitantes</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Alimento</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Golosinas</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Juguetes y demás accesorios</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Acerca de nosotros</h5>

                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <a href="./empresa.php" class="text-dark"><i class="fa fa-paw pe-3"></i>Información General</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Nuestros Clientes</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Trabaja con Nosotros</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Trabajadores</a>
                        </li>
                        <li class="mb-2">
                            <a href="#!" class="text-dark"><i class="fa fa-paw pe-3"></i>Contactanos</a>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase mb-4">Contacto</h5>

                    <ul class="list-unstyled">
                        <li>
                            <p><i class="fa fa-map-marker-alt pe-2"></i>Carrera 99 # 45 - 26, Medellin</p>
                        </li>
                        <li>
                            <p><i class="fa fa-phone pe-2"></i>+ 57 234 567 89</p>
                        </li>
                        <li>
                            <p><i class="fa fa-envelope pe-2 mb-0"></i>Arcanepetshop@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->
            </div>
            <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2022 Copyright:
        </div>
        <!-- Copyright -->
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