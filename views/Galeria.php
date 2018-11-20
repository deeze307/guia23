<!DOCTYPE html>
<html lang="Es">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <title>Guia23</title>
        <link rel="stylesheet" type="text/css" href="../css/master.css">
        <link rel="stylesheet" type="text/css" href="../css/color-green.css">
        <link href="../css.min.css" rel="stylesheet" />
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

        <!-- Galeria-->
        <section id="least">
            
            <!-- Fullscreen  -->
            <div class="least-preview"></div>
            
             <!-- Thumbnails -->
              <ul class="least-gallery">
                <!-- 1 || data-caption ||-->
                <li>
                    <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/images/Paisajes/20171017_192752_001.jpg" title="Ushuaia" data-subtitle="Ver Imagen" data-caption="<strong>Rio Olivia - Ushuaia</strong><a href='listing.html' target='_blank'><span>  Mas Detalles</span></a>">
                        <img src="<?php $_SERVER['DOCUMENT_ROOT']?>/images/Paisajes/20171017_192752_001.jpg" alt="Alt Image Text" /></a>
                </li>
                       
                <!-- 2 || data-caption as href-++ ||--> 
                <li>
                    <a href="images/20151107_131413.jpg" title="Lago Fagnano" data-subtitle="Ver Imagen" data-caption="<strong>Lago Fagnano</strong> <a href='listing.html' target='_blank'> Mas Detalles</a>">
                        <img src="images/20151107_131413.jpg" alt="Alt Image Text" /></a>               
                </li>
                
                <!-- 3 --> 
                <li>
                    <a href="images/20171008_173430_001.jpg" title="Rio Olivia" data-subtitle="Ver Imagen" data-caption="<strong>Rio Olivia - Ushuaia</strong><a href='listing.html' target='_blank'> Mas Detalles</a>">
                        <img src="images/20171008_173430_001.jpg" ></a>                
				</li>

                <li>
                    <a href="images/20171017_192758.jpg" title="Rio Pipo" data-subtitle="Ver Imagen" data-caption=" <strong>Rio Pipo</strong><a href='listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="images/20171017_192758.jpg" alt="Alt Image Text" /></a>               
                </li>

                <!-- 5 -->
                <li>
                    <a href="#" title="Lago Fagnano" data-subtitle="Ver Imagen" data-caption=" <strong>lago x</strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>                        
               </li>

                <!-- 6 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>                        
                 </li>

                <!-- 7 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               
                 </li>

                <!-- 8 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               

                </li>

                <!-- 9 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               
                </li>

                <!-- 10 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               
                </li>
                                        <!-- 11 -->
                <li>
                     <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>  
				</li>             
                                  <!-- 12 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               

                </li>
                                        <!-- 13 -->
                <li>
                    <a href="" title="Titulo" data-subtitle="Ver Imagen" data-caption=" <strong>Descrip </strong><a href='Listing.html' target='_blank'>Mas Detalles</a>">"
                        <img src="#" alt="Alt Image Text" /></a>               
				</li>
            </ul>
        </section>
        <!--  Fin Galeria -->

        <!-- Footer -->
        <?php require"partials/footer.php"; ?>
        <!-- Footer -->

        <!-- jQuery  -->
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
    <script src="../js/jquery.min.js"></script>
    <script src="../js.min.js"></script>
    <script src="../js/least.js"></script>
        <script>
            $(document).ready(function(){
                $('.least-gallery').least();
            });
        </script>
  
    </body>
</html>