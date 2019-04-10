<?php
require_once("../../app/controller/AdvertsingsController.php");
require_once("../../app/controller/CarouselController.php");
$adv = new AdvertsingsController();
$adv_categories = $adv->getCategories("",true);
$carouselController = new CarouselController();
$carousel = $carouselController->getCarouselImages(false);

?>
<!DOCTYPE html>
<html lang="Es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Guia23</title>
<link rel="stylesheet" type="text/css" href="../../css/master.css">
<link rel="stylesheet" type="text/css" href="../../css/color-green.css">
<link rel="stylesheet" href="../../css/swiper.min.css">
<link rel="stylesheet" href="../../css/swipper-style.css">
<link rel="shortcut icon" href="../../images/short_icon.png">
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
 <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
 <script type="text/javascript" src="../../js/google-map.js"></script>

</head>
<body>

<!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="../../images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php require "../../app/controller/Main.php"; ?>
    <?php require "../partials/header.php"; ?>
    <!-- HEADER  --> 

    <!-- Inner Banner -->
    <?php require "../partials/banner-ciudades.php" ?>
    <!-- Inner Banner -->

    <section id="banner-map">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-3 col-sm-3 col-xs-12"><a id="finddo-geolocate" class="btn btn-default" href="#"><em class="fa fa-crosshairs"></em> Geolocacion</a> <a id="finddo-target" class="btn btn-default" href="#"><em class="fa fa-bullseye"></em>Resultado</a>
                  <div class="input-group p_b20">
                    <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                <input id="finddo-location" class="form-control" name="location" value="" placeholder="Ubicacion..." autocomplete="off" type="text">
                  </div>

                    <div class="map-radius">
                                <p>Radio:</p>
                                <label><input name="finddo_radius" value="0" type="checkbox"> 1 km</label>
                                <label><input name="finddo_radius" value="5" type="checkbox"> 5 km</label>
                                <label><input name="finddo_radius" value="10" type="checkbox"> 10 km</label>
                                <label><input name="finddo_radius" value="15" type="checkbox"> 15 km</label>
                                <label><input name="finddo_radius" value="50" type="checkbox"> 50 km</label>
                  </div>

                    <div class="reset-btn">
                        <a id="finddo-reset" class="btn btn-default" href="#"><i class="fa fa-ban"></i> Reset</a>
                    </div>

                    <!-- categories and tags -->
                    <div class="panel-group" id="finddo-accordion">

                        <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapse-categories"> <em class="fa fa-list" aria-hidden="true"></em> Categoría Seleccionada </a> </h4>
                            </div>
                            <div id="collapse-categories" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Add checked="checked" to show the markers of this filter on page loading -->
                                    <?php
                                        foreach($adv_categories as $category)
                                        {
                                            if($category->advertsings_categories_id == $_GET['cat_id'])
                                            echo '<input type="checkbox" disabled name="marker_type[]" value="resturent_02_03" checked="checked">'.$category->name.'<br>';
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
              </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div id="finddo-wrapper">
                        <!-- Places panel (auto removable) -->
                        <div id="finddo-places" class="hidden-xs">
                            <div id="finddo-results-num"></div>
                        </div>
                        <!-- Map wrapper -->
                        <div id="finddo-canvas"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Footer -->
<?php require "../partials/footer.php"?>
<!-- Footer -->

    <!-- Popups -->

    <!-- Popups -->

<script src="../../js/jquery.2.2.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.fancybox.min.js"></script>
<script src="../../js/bootsnav.js"></script>
<script src="../../js/zelect.js"></script>
<script src="../../js/parallax.min.js"></script>
<script src="../../js/map/jquery-finddo.js"></script>
<script src="../../js/map/markercluster.min.js"></script>
<script src="../../js/map/custom-map.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCjJIxi33Avc9y0wcvky9HUR8Q6VsT_YlY"></script>
<script src="../../js/modernizr.custom.26633.js"></script>
<script src="../../js/jquery.gridrotator.js"></script>
<script src="../../js/functions.js"></script>
</body>
</html>
