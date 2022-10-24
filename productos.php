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

    <?php 
        require_once "./controladorDB.php";
        $db = db::getDBConnection();

        $modulo = $_REQUEST['modulo']??'';
        if ($modulo=="productos" || $modulo == ""){
            include_once "productosT.php";
        }
        if( $modulo=="detalleProducto"){
            include_once "detalleProducto.php";
        }
    ?>



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