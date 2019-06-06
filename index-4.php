<?php
require_once("app/controller/AdvertsingsController.php");
require_once("app/controller/CarouselController.php");
// SI no hay ciudad seleccionada se redirecciona al index

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
	<meta name="description" content="Puntos de interes turistico, negocios, comercios, ofertas, publicidad">
	<meta charset="utf-8">
    <meta name="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>Guía23-Inicio</title>
	<link rel="stylesheet" type="text/css" href="css/master.css">
	<link rel="stylesheet" type="text/css" href="css/color-green.css">
	<link rel="shortcut icon" href="images/short_icon.png">
	<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

    <style>
.youtube-player {position: relative;padding-bottom:56.23%;height:0;overflow:hidden;max-width:100%;background:#000;margin:8px 0 8px 0;}
.youtube-player iframe {position:absolute;top: 0;left:0;width:100%;height:100%;z-index:100;background: transparent;}
.youtube-player img {bottom:0;display:block;left:0;margin:auto;max-width:100%;width:100%;position:absolute;right:0;top: 0;border:none;height:auto;cursor:pointer;-webkit-transition: .4s all;-moz-transition: .4s all;transition: .4s all;}
.youtube-player img:hover {-webkit-filter:brightness(75%);}
.youtube-player .play {height:72px;width:72px;left:50%;top:50%;margin-left:-36px;margin-top:-36px;position:absolute;background: url("//i.imgur.com/TxzC70f.png") no-repeat;}
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

	<!-- Banner -->
	<section id="banner-2" class="banner-2-bg">

		<div class="container">
			<div class="inner-text-3">
               
                <section id="call-to-action" class="parallax-window" data-parallax="scroll" data-image-src="images/call-to-action-bg.jpg">
				  <div class="container">
				      <div class="row">
				          <div class="col-md-12 text-center">
                              <div class="call-to-action">
				              	<div class="banner-text-3">
							     <h2><span>Bienvenidos a Guía23</span></h2>
							      <h3>Todo lo que necesitas saber está al alcance de tu mano y de una manera facil</h3>
						           </div>
				                    
				                    <div class="call-to-action-btn">
				                    <a href="<?php __URL__ ?>/views/Ayuda.php">Nescesita Ayuda?</a>
				                  </div>
				              </div>
				          </div>

				      </div>
				  </div>
                 </section>
		

				<div class="row">
					<div class="col-md-12 text-center p_t70">
						<div class="banner-text-3">
							<h2><span>ESTAMOS EN ESTAS CIUDADES</span></h2>
							<h3><span>Explore las mejores atracciones, actividades y más</span></h3>
							
							<img src="images/banner-arrow.png" alt="image">
						</div>
					</div>

				</div>

			</div>

		</div>
      
	</section>
	<!-- Banner -->

	<!-- Directory Category -->
	<section id="directory-category-3" class="p_b70">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

					<div class="directory-category-box3">
						<span><i class="fa fa-home" aria-hidden="true"></i></span>
						<a href="#"><h3>Tierra del Fuego</h3></a>
						<p>152,546</p>
						<div class="directory-category-overlay"></div>
					</div>

					<div class="directory-category-box3">
						<span><i class="fa fa-home" aria-hidden="true"></i></span>
						<a href="#"><h3>Santa Cruz</h3></a>
						<p>152,546</p>
						<div class="directory-category-overlay"></div>
					</div>

					<div class="directory-category-box3">
						<span><i class="fa fa-home" aria-hidden="true"></i></span>
						<a href="#"><h3>Chubut</h3></a>
						<p>1,546</p>
						<div class="directory-category-overlay"></div>
					</div>

					<div class="directory-category-box3">
						<span><i class="fa fa-home" aria-hidden="true"></i></span>
						<a href="#"><h3>Río Negro</h3></a>

						<p>2, 34, 546</p>
						<div class="directory-category-overlay"></div>
					</div>

					<div class="directory-category-box3">
						<span><i class="fa fa-home" aria-hidden="true"></i></span>
						<a href="shoping.html"><h3>Neuquen</h3></a>
						<p>2,546</p>
						<div class="directory-category-overlay"></div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<!-- Directory Category -->
   


    <!-- How to find -->
	<div id="how-to-find" class="p_b70 p_t70">

		<div class="container over-hide">

			<div class="row">
				<div class="col-md-12 text-center heading">
					<h2><span>Trabajamos para Usted</span></h2>
				
					<p style="text-align: justify;">Guía23 incluye información turística del entorno, geolocalización, atrayendo al usuario a consultar el contenido, tus publicidades u ofertas, llegaran directamente al punto de demanda, sin invertir en formatos complementarios, sin que el cliente tenga que desplazarse a un lugar concreto para acceder a ellas, tu producto o servicio al alcance de todos, queremos que ofrezcas lo mejor a tus clientes dentro y fuera de tu negocio, a través de Guía23 proyectaras una imagen moderna y colaboraras con la eliminación de miles de folletos impresos en papel.</p>
				   
				</div>

			</div>

			<div class="row">

				<div class="col-md-4 col-sm-4 col-xs-12 text-center">
					<div class="how-to-find-box">
						<img src="images/how-to-find2.png" alt="img">
						<h3>CONTACTENOS</h3>
						<div class="footer-links">
						 <ul>
	                      <li><a href="#"><span><i class="fa fa-phone" aria-hidden="true"></i></span> <span>+(54) 2901 - 487488</span></a>
	                      </li>
	                      <li><a href="#"><span><i class="fa fa-envelope" aria-hidden="true"></i></span> <span>info@guia23.com.ar</span></a>
	                      </li>
	                      <li><a href="#"><span><i class="fa fa-globe" aria-hidden="true"></i></span> <span>wwww.guia23.com.ar</span></a>
	                      </li>
	                      <li><a href="#"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span><span>Guía23-Patagonia 55<br><br> Ushuaia,Tierra del Fuego</span></a>
	                      </li>
	                      <div class="social-icons text-center">
                            <ul>
                            <li><a href="https://www.facebook.com/guia23arg/"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="https://aboutme.google.com/b/108041901462566142472/"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="https://twitter.com/Guia232"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="https://www.instagram.com/guia23.com.ar/"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                            <li><a href="https://www.youtube.com/channel/UCaFEUeKyFwlCCfMxcGJp-fw/featured?view_as=subscriber"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                            <li><a href="https://api.whatsapp.com/send?phone=542901487488&text=Hola%20necesito%20más%20información"><i class="fa fa-whatsapp" aria-hidden="true"></i></a> </li>
                            </ul>
                          </div>
                        </ul>
                      </div>
					</div>
				</div>

				<div class="col-md-4 col-sm-4 col-xs-12 text-center">
					<div class="how-to-find-box">
						<img src="images/how-to-find1.png" alt="img">
						<h3>PUBLIQUE</h3>
						<!-- reproductor-->
						<iframe width="350" height="230" align="" src="https://www.youtube.com/embed/PGcIQdaysSg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					    <!-- reproductor--> 
					</div>
				</div>
          
				
                   <div class="col-md-4 col-sm-4 col-xs-12 text-center" >
				    <div class="right-bar">
				        <h4><span>PARTICIPE DE LOS SORTEOS</span></h4>
				            <h4><span>INGRESE AHORA</span></h4>
				             <form class="form-right">
				                <div class="form-group">
				                   <input type="text" class="form-control" placeholder="Nombre" name="name">
				                    </div>
				                      <div class="form-group">
				                          <input type="email" class="form-control" placeholder="E-mail" name="email">
				                      </div>
				                      <div class="form-group">
				                          <input type="password" class="form-control" placeholder="Password" name="password">
				                      </div>
				                      <div class="form-group">
				                          <label>
				                           <input type="checkbox" name="name"> Estoy de acuerdo con los Terminos y Condiciones</label>
				                      </div>
				                      <div class="form-group">
				                        <button>Enviar</button>
				                 </div>
				             </form>
				     </div>
				  
				  </div>
			
							
			</div>

		</div>

	</div>
	<!-- How to find -->

	<!-- Call to Action -->
	<section id="call-to-action" class="parallax-window" data-parallax="scroll" data-image-src="images/call-to-action-bg.jpg">
  <div class="container">
      <div class="row">
          <div class="col-md-12 text-center">
              <div class="call-to-action">
                  <h2>PROMOCIONE SU COMERCIO GRATIS!!</h2>
                  <p>Convierta su publicidad en una de las mas efectivas del mercado aumentando las probabilidades de exito.</p>
                  <div class="call-to-action-btn">
                      <a href="#">CONOZCANOS</a>
                  </div>
              </div>
          </div>

      </div>
  </div>
</section>

	<div id="call-to-action2">

		<div class="container">

			<div class="row">

				<div class="col-md-10 col-sm-9 col-xs-12 call-to-action-text">

					<p></p>

				</div>

				<div class="col-md-2 col-sm-3 col-xs-12 call-to-action-bttn">

					<a href="#directory-category-3"></a>

				</div>

			</div>

		</div>

	</div>
	<!-- Cal to Action-->

	
	

	

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