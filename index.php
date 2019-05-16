<?php
require_once("app/controller/AdvertsingsController.php");
$advertsingsController = new AdvertsingsController();
$cities = $advertsingsController->getCities(false);
?>
<!DOCTYPE html>
<html lang="Es">

  <head>
    <meta google-site-verification: google1cee8a07c04f871a.html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="css/master.css">
    <link rel="stylesheet" type="text/css" href="css/color-green.css">
    <link rel="shortcut icon" href="images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.min.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
<style>
    body{
        background-image: url("images/BG.png");
    }
</style>

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
    <!-- HEADER  -->

    <!-- BANNER -->
    <div class="banner-text-index center-screen">
        <h2><span>Bienvenido a Guía23</span></h2>
        <p>Seleccione la ciudad que desea visitar</p>
        <?php
        foreach ($cities as $city)
        {
            echo '<a href="app/controller/Main.php?city_id='.$city->city_id.'&city_name='.$city->name.'&city_class='.$city->class.'&province_id='.$city->province_id.'">'.$city->name.'</a>';
        }
        ?>
    </div>
    <!-- BANNER -->


    <script src="js/jquery.2.2.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/functions.js"></script>

  </body>

</html>