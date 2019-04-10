<?php
require_once("app/controller/AdvertsingsController.php");
require_once("app/controller/CarouselController.php");
$advertsingsController = new AdvertsingsController();
$carouselController = new CarouselController();
$carousel = $carouselController->getCarouselImages(false);
$cat_counter = $advertsingsController->countAdsByCategories();
$ads_counter = $advertsingsController->countAllAds();
$categories_counter = $advertsingsController->countAllCategories();
$users_counter = $advertsingsController->countAllUsers();
$cities_counter = $advertsingsController->countAllCities();
$points_of_interest = $advertsingsController->requestAllPointsOfInterest();
$new_added = $advertsingsController->getLastAdded();
?>
<!DOCTYPE html>
<html lang="Es">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/color-green.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/swipper-style.css">
    <link rel="shortcut icon" href="images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->



  </head>

  <body>


    <!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php require "app/controller/Main.php"; ?>
    <?php require "views/partials/header.php"; ?>
    <!-- HEADER  -->

    <!-- BANNER -->
    <?php require "views/partials/banner-ciudades.php" ?>
    <!-- BANNER -->

    <!-- Directorio Categorias -->
    <?php require "views/partials/categorias_carousel.php"?>
    <!-- Directorio Categorias -->

    <!-- Populares -->
    <?php require "views/partials/index/populares.php" ?>
    <!-- Popular  -->

    <!-- Puntos de Interés -->
    <?php require "views/partials/index/puntos_de_interes.php" ?>
    <!-- /Puntos de Interés -->

    <!-- Counter Section -->
    <?php require "views/partials/index/contador.php"?>
    <!-- Counter Section -->

    <!-- Best Things -->
    <?php require "views/partials/index/mejores_cosas.php"?>
    <!-- Best Things -->

    <!-- Latest News -->
    <?php require "views/partials/index/noticias.php"?>
    <!-- Latest News -->

    <!-- User -->
    <!--<?php require "views/partials/index/usuario.php"?>-->
    <!-- Useer -->

    <!-- Footer -->
    <?php require "views/partials/footer.php" ?>
    <!-- Footer -->

    <!-- Popups -->
    <!-- <?php require "views/partials/index/popups.php"?> -->
    <!--Fin  Popups -->



    
    <script src="js/jquery.2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.appear.js"></script>
    <script src="js/jquery-countTo.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/bootsnav.js"></script>
    <script src="js/zelect.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/modernizr.custom.26633.js"></script>
    <script src="js/jquery.gridrotator.js"></script>
    <script src="js/functions.js"></script>

  </body>

</html>