<!DOCTYPE html>
<?php
if (!isset($_SESSION))
{ session_start(); }
?>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/master.css">
    <link rel="stylesheet" type="text/css" href="../../css/color-green.css">
    <link rel="shortcut icon" href="../../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="../../js/html5shiv.min.js"></script>
    <script src="../../js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="../../images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php include("../../app/controller/Main.php"); ?>
    <?php require "../partials/header.php"; ?>
    <!-- HEADER  -->

    <!-- Popular Listing -->
    <section id="login-register" class="p_b70 p_t70">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a>
                        </li>
                        <li role="presentation"><a href="#registerd" aria-controls="registerd" role="tab" data-toggle="tab">Registro</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Tab panes -->
        <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="login">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="login-register-bg">

                                <div class="row">

                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="heading">
                                            <h2>Login</h2>
                                        </div>
                                        <!-- LogIn -->
                                        <form class="registerd" action="../../app/core/login.php" method="post" data-ajax="false">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Usuario" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                                            </div>
                                            <?php if(isset($_SESSION["error"])){?>
                                                <div class="label-danger text-center" style="color:white;"><?php echo $_SESSION["error"]; ?></div>
                                            <?php } ?>
                                            <hr>

                                            <div class="form-group">
                                                <button input type="submit" name="login" value="login" >Enviar</button>
                                            </div>
                                            <div class="form-group">
                                                <a href="#">Olvido su contraseña</a> <a href="#">|</a> <a href="login-registerd.html">Crear nueva cuenta</a>
                                            </div>
                                        </form>
                                        <!-- /LogIn -->
                                    </div>

                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <form class="registerd" action="../../app/core/login.php" method="post" data-ajax="false">
                                            <div class="social-register-bg">

                                                <h2>Hola... </h2>

                                                <p>No tiene cuenta? Puede crear una ahora, solo le llevara unos minutos</p>

                                                <h3>Login con redes sociales</h3>

                                                <ul class="social-register-icon">
                                                    <li><button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="with_social_facebook"><i class="fa fa-facebook"></i> Facebook</button>
                                                    </li>
                                                    <li><button type="submit" class="btn btn-danger btn-lg btn-block" name="login" value="with_social_google"><i class="fa fa-google"></i> Google+</button>
                                                    </li>
                                                    <li><button type="submit" class="btn btn-info btn-flat btn-lg btn-block" name="login" value="with_social_twitter"><i class="fa fa-twitter"></i> Twitter</button>
                                                    </li>
                                                </ul>

                                            </div>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane fade" id="registerd">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="login-register-bg">

                                <div class="row">

                                    <div class="col-md-7 col-sm-7 col-xs-12">
                                        <div class="heading">
                                            <h2>Crear nueva <span>cuenta</span></h2>
                                        </div>

                                        <form class="registerd" action="../../app/core/login.php" method="post">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="username" placeholder="Usuario" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control " name="name" placeholder="Nombre" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="lastname" placeholder="Apellido" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" name="email" placeholder="Email " required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control .has-error" name="password" placeholder="Contraseña" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" name="re-password" placeholder="Confirme su Contraseña" required>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <button type="submit" name="login" value="create">Registrar Ahora</button>
                                            </div>
<!--                                            <div class="form-group">-->
<!--                                                <a href="login-registerd.html">Soy miembro  - Login</a>-->
<!--                                            </div>-->
                                        </form>
                                    </div>

                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <div class="social-register-bg">

                                            <h2> Hola... </h2>

                                            <p>No tiene Cuenta? Puede crear una ahora solo le llevara unos minutos.</p>

                                            <h3>Login con redes sociales</h3>

                                            <ul class="social-register-icon">
                                                <li><button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="with_social_facebook"><i class="fa fa-facebook"></i> Facebook</button>
                                                </li>
                                                <li><button type="submit" class="btn btn-danger btn-lg btn-block" name="login" value="with_social_google"><i class="fa fa-google"></i> Google+</button>
                                                </li>
                                                <li><button type="submit" class="btn btn-info btn-flat btn-lg btn-block" name="login" value="with_social_twitter"><i class="fa fa-twitter"></i> Twitter</button>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
    <!-- Popular Listing -->

    <!-- Footer -->
    <?php require "../partials/footer.php"?>
    <!-- Footer -->

    <!-- Popups -->
    <section id="best-thing-model">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Tierra del Fuego</h4>
                        <ul class="best-things-listing">
                            <li><a href="#">3 Ciudades</a>
                            </li>
                            <li><a href="#">130 Publicidades</a>
                            </li>
                            <li><a href="#">6753 Visitas</a>
                            </li>
                        </ul>
                        <img src="../../images/stars-2.png" alt="image">
                    </div>
                    <div class="modal-body">

                        <div id="best-thing-slider" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="images/20160206_165238.jpg" alt="image">
                            </div>
                            <div class="item">
                                <img src="images/20171008_173431.jpg" alt="image">
                            </div>
                            <div class="item">
                                <img src="images/20151107_131413.jpg" alt="image">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="best-thing-model-description">
                                    <h4>Descripcion</h4>
                                    <p>Descripcion </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="best-thing-model-feature">
                                    <h4>Categorias</h4>
                                    <ul>
                                        <li>Restaurantes (16)</li>
                                        <li>hoteles (36)</li>
                                        <li>Turismo (46)</li>
                                        <li>Deportes (26)</li>
                                        <li>Profesionales(21)</li>
                                        <li>Hogar (17)</li>
                                        <li>Salud-Belleza (36)</li>
                                        <li>Enseñanza (12)</li>
                                        <li>Vehiculos (26)</li>
                                        <li>Otros Servicios (67)</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="best-thing-model-description">
                            <h4>Lo Ultimo</h4>
                            <img src="../../images/stars-2.png" alt="image">
                            <p>Descripcion </p>

                            <div class="best-thing-model-btn">
                                <a href="listing.html">Mas Detalles</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popups -->

    <script src="../../js/jquery.2.2.3.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
<!--    <script src="../../js/jquery.appear.js"></script>-->
<!--    <script src="../../js/jquery-countTo.js"></script>-->
<!--    <script src="../../js/owl.carousel.min.js"></script>-->
<!--    <script src="../../js/jquery.fancybox.min.js"></script>-->
<!--    <script src="../../js/bootsnav.js"></script>-->
<!--    <script src="../../js/zelect.js"></script>-->
<!--    <script src="../../js/parallax.min.js"></script>-->
<!--    <script src="../../js/modernizr.custom.26633.js"></script>-->
<!--    <script src="../../js/jquery.gridrotator.js"></script>-->
    <script src="../../js/functions.js"></script>
</body>

</html>