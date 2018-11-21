<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23-Museos</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/color-green.css">
    <link rel="shortcut icon" href="../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="../images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php require "../app/controller/Main.php"; ?>
    <?php require "partials/header.php"; ?>
    <!-- HEADER  -->

    <!-- Inner Banner -->
    <section id="inner-banner">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="inner_banner_detail">
                        <h2 align="right">Museos</h2>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <div class="inner_banner_detail">
                        <p><a href="Index-tdf.html">Inicio  </a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!-- Popular Listing -->
    <?php require "partials/popular-listing.php";?>
    <!-- Popular Listing -->

    <!-- Footer -->
    <?php require "partials/footer.php";?>
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
                            <li><a href="#">3 Ciudades,</a>
                            </li>
                            <li><a href="#">130 Publicidades,</a>
                            </li>
                            <li><a href="#">6753 Visitas</a>
                            </li>
                        </ul>
                        <img src="../images/stars-2.png" alt="image">
                    </div>
                    <div class="modal-body">

                        <div id="best-thing-slider" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="images/20160206_165440.jpg" alt="image">
                            </div>
                            <div class="item">
                                <img src="images/20160207_053613.jpg" alt="image">
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
                                        <li>Restaurantes (15)</li>
                                        <li>Hoteles (36)</li>
                                        <li>Turismo (26)</li>
                                        <li>Deportes(46)</li>
                                        <li>Profesionales (34)</li>
                                        <li>Hogar (21)</li>
                                        <li>Salud-Belleza (36)</li>
                                        <li>Enseñanza (12)</li>
                                        <li>Vehiculos (22)</li>
                                        <li>Otros Servicios (27)</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="best-thing-model-description">
                            <h4>Lo Ultimo</h4>
                            <img src="../images/stars-2.png" alt="image">
                            <p>Descripcion </p>

                            <div class="best-thing-model-btn">
                                <a href="listing/listing.php">Mas Detalles</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Popups -->

    <script src="../js/jquery.2.2.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.appear.js"></script>
    <script src="../js/jquery-countTo.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/bootsnav.js"></script>
    <script src="../js/zelect.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/modernizr.custom.26633.js"></script>
    <script src="../js/jquery.gridrotator.js"></script>
    <script src="../js/functions.js"></script>
</body>

</html>