<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Login</title>
        <link rel="stylesheet" href="../style/login.css" />
    </head>
    <body>
        <section class="login">
            <div class="login_box">
                <div class="left">
                    <div class="top_link">
                        <a href="../index.html"
                            ><img src="../img/left.svg" alt="" />Volver a la
                            tienda</a
                        >
                    </div>
                    <div class="contact">
                        <form method="post" action="./login.php">
                            <h3>ADMIN LOGIN</h3>
                            <input type="text" placeholder="Email" name="email" />
                            <input type="password" placeholder="Contraseña" name="pass" />
                            <button class="submit">Log in</button>


                            <?php 
                                if(isset($_GET['error'])){
                                    if($_GET['error'] == 1){
                                        print("<p>Verificar nombre de usuarios/contraseña</p>");
                                    }elseif($_GET['error']==2){
                                        print("<p>Debe iniciar sesion</p>");
                                    }
                                }
                            ?>

                        </form>
                    </div>
                </div>
                <div class="right">
<!--                     <div class="right_text">
                        <h2>Arcane Pet Shop</h2>
                        <h5>La mejor tienda Sex Shop de la loma</h5>
                    </div> -->
                    <div class="right_inductor">
                        <img src="../img/logo-removebg-preview.png" alt="" />
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
