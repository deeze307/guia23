<?php
if (!isset($_SESSION))
{ session_start(); }
?>
<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23 - Contacto</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/color-green.css">
    <link rel="shortcut icon" href="../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

</head>

<body>

    <?php
    if(isset($_SESSION["message"]))
    {
        echo "<div class='label-success text-center' style='color:white;'>". $_SESSION['message']."</div>";
        unset($_SESSION["message"]);
    }
    elseif(isset($_SESSION["error"]))
    {
        echo "<div class='label-danger text-center' style='color:white;'>". $_SESSION['error']."</div>";
        unset($_SESSION["error"]);
    }
    ?>

    <!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="../images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php include("../app/controller/Main.php"); ?>
    <?php require "partials/header.php"; ?>
    <!-- HEADER  -->

    <!-- Inner Banner -->
    <section id="inner-banner-2">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <div class="inner_banner_2_detail">
                        <p><a href="../Index-tdf.html">Inicio  </a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> </p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!-- Contacto-->
    <section id="contact-us" class="p_b70 p_t70">

        <div class="container">

            <div class="row">

                <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">

                    <div class="contact-bg">

                        <div class="heading">
                            <h2><span>Pongase en Contacto con Nosotros</span></h2>
                        </div>

                        <form class="contact-form" action="../app/controller/ContactController.php" method="post">
                            <div class="row">

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
										<input type="text" name="name" class="form-control" placeholder="Nombre  *" maxlength="50" required >
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <input type="text" name="lastname" class="form-control" placeholder="Apellido  *" maxlength="50" required >
                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail   *" required>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="content" class="form-control" placeholder="*  Su Consulta" required ></textarea>
                                    </div>
                                </div> 
                            </div>

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                       <div class="g-recaptcha" data-sitekey="6LeFHjgUAAAAAHUcAHVMlrsCArRr4AhABCx4u5sY"></div>
                                        <!--<img src="images/contact.jpg" alt="image">-->
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" value="enviar" name="submit">Enviar</button>
                                    </div>
                                </div>

                            </div>

                        </form>


                    </div>

                    <div class="row">

                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                            <div class="address-box">
                                <p><i class="fa fa-phone" aria-hidden="true"></i>
                                </p>
                                <h4>Telefono</h4>
                                <p><?php echo $head->phone ?></p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                            <div class="address-box">
                                <p><i class="fa fa-envelope" aria-hidden="true"></i>
                                </p>
                                <h4>E-Mail</h4>
                                <p><a href="#"><?php echo $head->mail ?></a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                            <div class="address-box">
                                <p><i class="fa fa-globe" aria-hidden="true"></i>
                                </p>
                                <h4>Sitio Web</h4>
                                <p><a href="https://www.guia23.com.ar">www.guia23.com.ar</a>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-3 col-sm-3 col-xs-12 text-center">
                            <div class="address-box">
                                <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                                </p>
                                <h4>Direccion</h4>
                                <p>Patagonia 55 piso 1
                                    <br>Ushuaia - Tierra del Fuego</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Contacto -->

    <!-- Footer -->
    <?php require("partials/footer.php"); ?>
    <!-- Footer -->


    <script src="../js/jquery.2.2.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.appear.js"></script>
    <script src="../js/bootsnav.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/modernizr.custom.26633.js"></script>
    <script src="../js/functions.js"></script>
</body>

</html>