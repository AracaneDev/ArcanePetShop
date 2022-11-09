<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="admin/plugins/daterangepicker/daterangepicker.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/estilos.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@700&display=swap" rel="stylesheet" />
    <title>Arcane Pet Shop | Productos</title>
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <?php @include 'header.php'; ?>
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

    <?php @include '.php'; ?>
    <script src="admin/plugins/jquery/jquery.min.js"></script>
    <script src="admin/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="admin/plugins/moment/moment.min.js"></script>
    <script src="admin/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="admin/dist/js/adminlte.js"></script>
    <script src="admin/dist/js/pages/dashboard.js"></script>
    <?php @include 'footer.php'; ?>
</body>

</html>