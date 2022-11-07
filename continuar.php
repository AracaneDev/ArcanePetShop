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
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <?php @include 'header.php';
    include("./modal_cart.php");
    ?>

    <!-- vista B -->
    <div class="center mt-5">
        <div class="card pt-3">
            <p style="font-weight: bold; color: #0F6BB7; font-size: 22px;">Modificar mi pedido</p>
            <div class="container-fluid p-2">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Artículo</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Total</th>
                            <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody>





                        <div class="container_card">

                            <?php
                            if (isset($_SESSION['carrito'])) {
                                $total = 0;
                                for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                    if (isset($carrito_mio[$i])) {
                                        if ($carrito_mio[$i] != NULL) {
                            ?>
                                            <?php if ($carrito_mio[$i]['nombre'] != 'portes') { ?>
                                                <tr>
                                                    <th scope="row" style="vertical-align: middle;"><?php echo $i; ?></th>
                                                    <td style="vertical-align: middle;">
                                                        <form id="form2" name="form1" method="post" action="cart.php">
                                                            <input name="id" type="hidden" id="id" value="<?php print $i;   ?>" class="align-middle" />
                                                            <input name="cantidad" type="text" id="cantidad" style="width:50px;" class="align-middle text-center" value="<?php print $carrito_mio[$i]['cantidad'];   ?>" size="1" maxlength="4" />
                                                            <input type="image" name="imageField3" src="./img/actualiza.png" value="" class="btn btn-sm btn-primary btn-rounded" />
                                                        </form>
                                                    </td>



                                                    <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['nombre'] ?></td>
                                                    <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] ?>$</td>
                                                    <td style="vertical-align: middle;"><?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']; ?>$</td>
                                                    <td style="vertical-align: middle;">
                                                        <form id="form3" name="form2" method="post" action="cart.php">
                                                            <input name="id2" type="hidden" id="id2" value="<?php print $i;   ?>" />
                                                            <button type="image" name="imageField3" class="btn-lg bg-danger text-white " style="border:0px;" data-toggle="tooltip" data-placement="top" title="Remove item"><i class="fas fa-trash-alt"></i> Borrar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                            <?php
                                            $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                        }
                                    }
                                }
                            }
                            ?>

                    </tbody>
                </table>


                <li class="list-group-item d-flex justify-content-between">
                    <span style="text-align: left; color: #000000;"><strong>Total (COL)</strong></span>
                    <strong style="text-align: left; color: #000000;"><?php
                                                                        if (isset($_SESSION['carrito'])) {
                                                                            $total = 0;
                                                                            for ($i = 0; $i <= count($carrito_mio) - 1; $i++) {
                                                                                if (isset($carrito_mio[$i])) {
                                                                                    if ($carrito_mio[$i] != NULL) {
                                                                                        $total = $total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                        if (!isset($total)) {
                                                                            $total = '0';
                                                                        } else {
                                                                            $total = $total;
                                                                        }
                                                                        echo number_format($total, 2, ',', '.'); ?> $</strong>
                </li>



            </div>
        </div>

        <a type="button" class="btn btn-success my-4" href="./pago.php">Continuar pedido</a>

    </div>

    <?php @include 'footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>