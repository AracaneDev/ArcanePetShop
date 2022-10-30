<?php
$id = mysqli_real_escape_string($db, $_REQUEST['id'] ?? '');
$detalleProducto = $db->detalleProducto($id);


?>

<!-- Default box -->
<div class="container">
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?php echo $detalleProducto['nombre'] ?></h3>
                    <?php
                    $detalleProductoImgP = $db->detalleProductoImg($id);
                    $imgP = mysqli_fetch_assoc($detalleProductoImgP)
                    ?>
                    <div class="col-12">
                        <img src="<?php echo $imgP['web_path'] ?>" class="product-image" alt="Product Image" id="primerImagen">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <?php
                        $detalleProductoImg = $db->detalleProductoImg($id);
                        while ($rowImg = mysqli_fetch_assoc($detalleProductoImg)) {
                        ?>

                            <div class="product-image-thumb"><img src="<?php echo $rowImg['web_path'] ?>" alt="Product Image" onclick="changeImage(this)"></div>

                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?php echo $detalleProducto['nombre'] ?></h3>
                    <p><?php echo $detalleProducto['Descripción'] ?></p>
                    <hr>
                    <h4>Existencias: <?php echo $detalleProducto['existencia'] ?></h4>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            $<?php echo number_format($detalleProducto['precio'], ...array(2, ',', '.'));  ?>
                        </h2>
                        <!-- <h4 class="mt-0">
                            <small>Ex Tax: $<?php echo $detalleProducto['precio'] ?> </small>
                        </h4> -->
                    </div>

                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2"></i>
                            Add to Cart
                        </div>

                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?php echo $detalleProducto['Descripción'] ?></div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                        <nav class="navbar navbar-light navbar-expand-md">

                        </nav>


                        <div class="container">



                            <div class="col-md-6 pane">
                                <div class="col-md-4">
                                    <div class="alert alert-light"></div>
                                </div>
                                <div id="result">




                                </div>

                                <div class="col-md-8">
                                    <form>
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" type="text" id="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Comentario</label>
                                            <textarea id="comment" class="form-control"></textarea></label>
                                        </div>
                                        <button type="button" class="btn btn-primary" onclick="commentBox();">Enviar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>

        <script type="text/javascript">
            function changeImage(x) {
                document.getElementById('primerImagen').src = x.src;
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        <script src="assets/js/script.js"></script>
        <!-- /.card -->