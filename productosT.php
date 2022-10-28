<div class="container">
        <div class="row">
            <div class="col-12">

                <div class="row mt-4">
                    <?php
                    
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
                            <div class="card border-secondary">
                                <img  class="card-img-top img-thumbnail" src="<?php echo $producto['web_path']?>" alt="">
                                <div class="card-body">
                                    <h4 class="card-tittle"><?php echo $producto['nombre']?></h4>
                                    <p class="card-text"><strong>Precio: </strong><?php echo $producto['precio']?></p>
                                    <p class="card-text"><strong>Existencia: </strong><?php echo $producto['existencia']?></p>
                                    <a href="./productos.php?modulo=detalleProducto&id=<?php echo $producto['id'] ?>" class="btn bg-beige">Ver</a>
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
                                <ul class="pagination ">
                                    <?php
                                        if($paginaSel != 1){
                                    ?>
                                    <li class="page-dark">
                                        <a class="page-link text-dark" href="./productos.php?modulo=productos&pagina= <?php echo ($paginaSel-1); ?>" aria-label="Previous">
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
                                        <a class="page-link text-dark" href="./productos.php?modulo=productos&pagina= <?php echo ($paginaSel+1); ?>" aria-label="Next">
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