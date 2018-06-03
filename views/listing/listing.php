<!DOCTYPE html>
<html lang="Es">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>Guia23</title>
<link rel="stylesheet" type="text/css" href="../../css/master.css">
<link rel="stylesheet" type="text/css" href="../../css/color-green.css">
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
    <?php include("../../app/controller/Main.php"); ?>
    <?php require "../partials/header.php"; ?>
    <!-- HEADER  --> 

    <!-- Inner Banner -->
    <?php require "../partials/banner.php"; ?>
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
                              <h4 class="panel-title"> <a data-toggle="collapse" href="#collapse-resturent"> <em class="fa fa-glass" aria-hidden="true"></em> Restaurantes </a> </h4>
                            </div>
                            <div id="collapse-resturent" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <!-- Add checked="checked" to show the markers of this filter on page loading -->
                                    <input type="checkbox" name="marker_type[]" value="rio_grande" checked="">Restaurante1<br>
                                    <input type="checkbox" name="marker_type[]" value="resturent_02" checked=""> Restaurante2
                                    <select name="marker_type[]">
                                        <option value="">Ciudades</option>
                                        <option value="rio_grande">Rio Grande</option>
                                        <option value="resturent_02">Tolhuin</option>
                                        <option value="resturent_03">Ushuaia</option>
                                    </select><br>
                                    <input type="checkbox" name="marker_type[]" value="resturent_03" checked=""> Restaurante3
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapse" data-toggle="collapse" href="#collapse-hoteles">
                                        <i class="fa fa-home" aria-hidden="true"></i> Hoteles
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-hoteles" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="realestate_01"> Hotel1<br>
                                    <input type="checkbox" name="marker_type[]" value="realestate_02"> Hotel2<br>
                                    <input type="checkbox" name="marker_type[]" value="realestate_03"> Hotel3<br>
                                    <input type="checkbox" name="marker_type[]" value="realestate_04"> Hotel4<br>
                                    <input type="checkbox" name="marker_type[]" value="realestate_05"> Hotel5<br>
                                    <input type="checkbox" name="marker_type[]" value="realestate_06"> Hotel6
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapse" data-toggle="collapse" href="#collapse-sport">
                                        <i class="fa fa-tumblr-square" aria-hidden="true"></i> Turismo
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-sport" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="sport_01"> Turismo1<br>
                                    <input type="checkbox" name="marker_type[]" value="sport_02"> Turismo2<br>
                                    <input type="checkbox" name="marker_type[]" value="sport_03"> Turismo3<br>
                                    <input type="checkbox" name="marker_type[]" value="sport_04"> Turismo4
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-beauty">
                                        <i class="fa fa-futbol-o" aria-hidden="true"></i> Deportes
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-beauty" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="beauty_01"> Deporte1
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-vehicles">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Profesionales
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-vehicles" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="vehicles_01">Estudio1
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-shoping">
                                        <i class="fa fa-home" aria-hidden="true"></i> Hogar
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-shoping" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="shoping_01">Ferreteria
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-industry">
                                        <i class="fa fa-female" aria-hidden="true"></i> Salud-Belleza
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-industry" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="industry_01"> Peluqueria1
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-dating">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Enseñanza
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-dating" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="dating_01"> Escuela xx
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapsed" data-toggle="collapse" href="#collapse-jobs">
                                        <i class="fa fa-car" aria-hidden="true"></i> Vehiculos
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-jobs" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="jobs_01"> Agenicia
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <!-- Replace "collapse" with "collapsed" in the class if the panel is closed on page loading -->
                                    <a class="collapse" data-toggle="collapse" href="#collapse-Otros-servicios">
                                        <i class="fa fa-globe" aria-hidden="true"></i> Otros Servicios
                                    </a>
                                </h4>
                            </div>
                            <!-- Remove "in" from the class to close the panel on page loading -->
                            <div id="collapse-Otros-servicios" class="panel-collapse collapse">
                              <div class="panel-body">
                                    <input type="checkbox" name="marker_type[]" value="jobs_01"> Panaderia
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjJIxi33Avc9y0wcvky9HUR8Q6VsT_YlY&callback=myMap"></script>
<script src="../../js/modernizr.custom.26633.js"></script>
<script src="../../js/jquery.gridrotator.js"></script>
<script src="../../js/functions.js"></script>
</body>
</html>
