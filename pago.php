<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="./style/estilos.css" />
    <link rel="stylesheet" href="./style/continuar.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:wght@700&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Arcane Pet Shop</title>
    <script type="text/javascript" src="./assets/js/validar.js"></script>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php @include 'header.php';
    include("./modal_cart.php");

    require_once "./controladorDB.php";
    $db = db::getDBConnection();

    if (isset($_REQUEST['guardar'])) {
        $nombre = mysqli_real_escape_string($db, $_REQUEST['nombre'] ?? '');
        $apellido = mysqli_real_escape_string($db, $_REQUEST['apellido'] ?? '');
        $direccion = mysqli_real_escape_string($db, $_REQUEST['direccion'] ?? '');
        $telefono = mysqli_real_escape_string($db, $_REQUEST['telefono'] ?? '');
        $detalles_user = $db->detalles_user($nombre, $apellido, $direccion, $telefono); ?>
        <div class="alert alert-success">
            <strong>Realizado!</strong> Su compra se ha realizado satisfactoriamente
        </div>
    <?php
    }
    ?>

    <!-- datos cliente -->
    <div class="container p-5">
        <form class="row g-3 needs-validation" action="pago.php" method="POST" novalidate>

            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Datos de envío</p>

            <input type="hidden" name="dato" value="insertar">
            <div class="col-md-6">
                <label for="validationCustom01" class="form-label">Nombre</label>
                <input type="text" class="form-control text-secondary" id="validationCustom01" name="nombre" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Por favor, inserte su nombre.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom02" class="form-label">Apellido</label>
                <input type="text" class="form-control text-secondary" id="validationCustom02" name="apellido" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Por favor, inserte sus apellidos.
                </div>
            </div>

            <div class="col-md-6">
                <label for="validationCustom03" class="form-label">Dirección</label>
                <input type="text" class="form-control text-secondary" id="validationCustom03" name="direccion" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Por favor, inserte su dirección.
                </div>
            </div>
            <div class="col-md-6">
                <label for="validationCustom04" class="form-label">Teléfono</label>
                <input type="text" class="form-control text-secondary" id="validationCustom04" name="telefono" required>
                <div class="valid-feedback">
                    Correcto!
                </div>
                <div class="invalid-feedback">
                    Por favor, inserte su teléfono.
                </div>
            </div>

            <button class="btn btn-secondary mb-4" type="submit" name="guardar">Pagar y finalizar</button>
            
        </form>
    </div>
    <?php @include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>