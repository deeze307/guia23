<?php
require_once("app/controller/AdvertsingsController.php");
require_once("app/controller/CarouselController.php");
// SI no hay ciudad seleccionada se redirecciona al index
if(!isset($_SESSION['selected_city_id'])){
  header("Location: ".__URL__."/index.php");
}
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
    <meta google-site-verification: google1cee8a07c04f871a.html>
    <meta name="description" content="Puntos de Interés turistico, Tierra del Fuego, Santa Cruz, Chubut, Neuquen, Rio Negro, Argentina">
    <link rel="canonical" href="https://www.guia23.com.ar">
    <meta property="og:locale" content="es_ES" />
    <meta property="og:url"           content="https://www.guia23.com.ar/views/publicidades/publicidades.php" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Guia23" />
    <meta property="og:description"   content="Puntos de Interés turistico, Tierra del Fuego, Santa Cruz, Chubut, Neuquen, Rio Negro, Argentina" />
    <meta property="og:image"         content="https://www.guia23.com.ar/images/1@.jpg" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimal-scale = 1, initial-scale=1">
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
    <!-- Global site tag (gtag.js) - Google Analytics -->

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-138258750-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-138258750-1');
      </script>
       
    <script type="text/javascript">
    window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
    d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
    _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
    $.src="https://v2.zopim.com/?6Ws0LTdyhqiW5dpYbGb4zzdbpCzKQkNz";z.t=+new Date;$.
    type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script>

    

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
    <?php require "views/partials/index/mejores_cosas1.php"?>
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
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v3.3&appId=2490201484323362&autoLogAppEvents=1"></script>

  </body>

</html>