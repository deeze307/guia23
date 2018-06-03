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
<script type="text/javascript" src="../../js/neary-by-place.js"></script>

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
<section id="inner-banner">
	<div class="container">
    	<div class="inner_banner_detail">
        	<h2 align="center">Resultado: <a href="#">Geolocalizacion</a></h2>
            <p><a href="index.html"> Inicio </a><i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="#"></a></p>
        </div>
    </div>
</section>
<!-- Inner Banner -->

<!-- Banner -->
<section id="listing-2">

<div class="container-fluid">

	<div class="col-md-7 col-sm-7 col-xs-12">
    
    	<div class="row">
        	<div class="col-md-12">
            	<div class="form-group">

                    <div class="input-group p_b20">
                        <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <input id="finddo-location" class="form-control" name="location" value="" placeholder="Ubicacion..." autocomplete="off" type="text">
                    </div>
                    
                    <div class="map-radius">
                        <p>Radio:</p>
                        <label><input name="finddo_radius" value="0" type="checkbox">1 km</label>
                        <label><input name="finddo_radius" value="5" type="checkbox"> 5 km</label>
                        <label><input name="finddo_radius" value="10" type="checkbox"> 10 km</label>
                        <label><input name="finddo_radius" value="15" type="checkbox"> 15 km</label>
                        <label><input name="finddo_radius" value="50" type="checkbox"> 50 km</label>
                    </div>
                
                </div>
            </div>
        </div>
    
    	<div class="row">
        	<div class="col-md-12">
        		<div class="sort-by">
                  <div class="sort-category"> <span>Categorias:</span>
                  
                    <div class="single-query form-group">
                      <div class="intro">
                        <select>
                          <option class="active">Hoteles</option>
                         <!-- <option>Hoteles</option>
                          <option>Turismo</option>
                          <option>Deportes</option>
                          <option>Profesionales</option>
                          <option>hogar</option>
                          <option>Salud-Belleza</option>
                          <option>Enseñanza</option>
                          <option>Vehiculos</option>
                          <option>Otros Servicios</option>-->
                        </select>
                      </div>
                    </div>
                    
                    <ul class="nav nav-tabs sort-listing" role="tablist">
                      <li class="active"><a href="#"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-th-large" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
                    </ul>
                    
                  </div>
                </div>
        	</div>
        </div>
        
		<div class="row">
        
        	<div class="col-md-6 col-sm-6 co-xs-12" data-navigation=".property-type-slide-nav">
            	<div class="popular-listing-box" data-type="apartement">
                
                  <div class="popular-listing-img">
                    <figure class="effect-ming"> <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/guia23/images/Museos/museorg1.jpg" alt="image">
                      <figcaption>
                        <ul>
                          <li><a data-toggle="#"  href="<?php $_SERVER['DOCUMENT_ROOT']?>/guia23/views/listing-details-1.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                        </ul>
                      </figcaption>
                    </figure>
                  </div>
                  
                  <div class="popular-listing-detail">
                    <h3><a href="#">Museo de Arte Virginia Choquintel </a></h3>
                    <span>Categoria: <a href="#">Museos</a></span>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Av. Manuel Belgrano , Rio Grande, Tierra del Fuego</p>
                  </div>
                  
                  <ul class="place-listing-add"> 
                    <li>(45 Visitas) </li><li><img src="../../images/stars.png" alt="image"></li> <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                  </ul>
                  
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 co-xs-12" data-navigation=".property-type-slide-nav">
            	<div class="popular-listing-box" data-type="apartement">
                
                  <div class="popular-listing-img">
                    <figure class="effect-ming"> <img src="../../images/Museos/Museo2.jpg" width="370" height="190" alt="image">
                      <figcaption>
                        <ul>
                          <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                        </ul>
                      </figcaption>
                    </figure>
                  </div>
                  
                  <div class="popular-listing-detail">
                    <h3><a href="#">Museo de la Legislatura</a></h3>
                    <span>Categoria: <a href="#">Museos</a></span>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> Maipu 346, Ushuaia, TDF</p>
                    
                  </div>
                  
                  <ul class="place-listing-add"> 
                    <li>(45 Visitas) </li><li><img src="../../images/stars.png" alt="image"></li> <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                  </ul>
                  
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 co-xs-12" data-navigation=".property-type-slide-nav">
            	<div class="popular-listing-box" data-type="apartement">
                
              
                  <div class="popular-listing-img">
                    <figure class="effect-ming"> <img src="images/Museos/Museo3.jpg" width="370" height="190" alt="image">
                      <figcaption>
                        <ul>
                          <li><a data-toggle="modal" data-target="#myModal1" href="#"><em class="fa fa-sign-in" aria-hidden="true"></em></a></li>
                        </ul>
                      </figcaption>
                    </figure>
                  </div>
                  
                  <div class="popular-listing-detail">
                    <h3><a href="#">Museo del Peesidio</a></h3>
                    <span>Categoria: <a href="#">Museos</a></span>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i>Yaganes y Gdor. Felix Paz, Ushuaia, Tierra del Fuego</p>
                  </div>
                  
                  <ul class="place-listing-add"> 
                    <li>(45 Visitas) </li><li><img src="../../images/stars.png" alt="image"></li> <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                  </ul>
                  
                </div>
            </div>
            
            <div class="col-md-6 col-sm-6 co-xs-12" data-navigation=".property-type-slide-nav">
            	<div class="popular-listing-box" data-type="apartement">
                
                  <div class="popular-listing-img">
                    <figure class="effect-ming"> <img src="../../images/Museos/museo1.jpg" alt="image">
                      <figcaption>
                        <ul>
                          <li><a data-toggle="modal" data-target="#myModal1" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i></a></li>
                        </ul>
                      </figcaption>
                    </figure>
                  </div>
                  
                  <div class="popular-listing-detail">
                    <h3><a href="#">Museo del fin del Mundo</a></h3>
                    <span>Categoria: <a href="#">Museos</a></span>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> AV. Maipu 173,  Ushuaia Tierra del Fuego</p>
                  </div>
                  
                  <ul class="place-listing-add"> 
                    <li>(45 Visitas) </li><li><img src="../../images/stars.png" alt="image"></li> <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li> <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a></li>
                  </ul>
                  
                </div>
            </div>
            
        </div>
    </div>
    
    <div class="col-md-5 col-sm-5 col-xs-12 map-container">
		<div id="page-container">

            <div id="maps" class="header-margin-color-line">
                <div class="loading-container">
                    <div class="spinner"></div>
                    <div class="text"><span>Cargando Mapa</span>espere por favor.</div>
                </div><!-- ./loading-container -->
                <div class="find-result"></div>
                <div class="map map-home" id="map-canvas"></div><!-- ./#map-canvas Google maps -->
            </div>
            
        </div>
    </div>
    
</div>
    
</section>
<!-- Banner --> 


<!-- Footer -->
<?php require "../partials/footer.php"; ?>
    <!-- Footer -->

    <!-- Popups -->

  
    <!-- Popups -->

<script src="../../js/jquery.2.2.3.min.js"></script>
<script	src="../../js/home-map/jquery-ui.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.fancybox.min.js"></script>
<script src="../../js/bootsnav.js"></script>
<script src="../../js/zelect.js"></script>
<script src="../../js/parallax.min.js"></script>
<script src="../../js/modernizr.custom.26633.js"></script>
<script src="../../js/jquery.gridrotator.js"></script>
<script	src="../../js/home-map/vendor/mmenu/mmenu.min.all.js"></script>
<script src="../../js/home-map/vendor/labelauty/labelauty.min.js"></script>
<script	src="../../js/home-map/vendor/parallax/parallax.min.js"></script>
<script	src="../../js/home-map/vendor/easydropdown/jquery.easydropdown.min.js"></script>
<script	src="../../js/home-map/vendor/carousel/responsiveCarousel.min.js"></script>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjJIxi33Avc9y0wcvky9HUR8Q6VsT_YlY&callback=myMap"></script>
 <script src="../../js/home-map/vendor/maps/infobox.js"></script>
<script	src="../../js/home-map/vendor/maps/home-maps.js"></script>
<script	src="../../js/home-map/vendor/maps/markerclusterer.js"></script>
<script	src="../../js/home-map/custom.js"></script>
<script src="../../js/functions.js"></script>
</body>
</html>
