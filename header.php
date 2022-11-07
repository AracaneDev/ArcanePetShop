<?php
    session_start();
    include("./admin/conexion.php")
?>
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
                        <a class="nav-link active" aria-current="page" href="./index.php">Inicio</a>
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
                <?php 
            include("./nav_cart.php");
            include("./modal_cart.php");
        ?>
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