<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23-Detalles</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/color-green.css">
    <link rel="shortcut icon" href="../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
    <script type="text/javascript" src="../js/google-map.js"></script>
    <script type="text/javascript" src="js/neary-by-place.js"></script>
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
    <section id="inner-banner-2">
        <div class="container">
            <div class="row">

                <div class="col-md-12 text-center">
                    <div class="inner_banner_2_detail">
                        <h2 align="center">Detalles </h2>
                        <p><a href="../Index-tdf.html">Inicio  </a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!-- Listing Details Heading -->
    <section id="listing-details" class="p_b70 p_t70">
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="details-heading heading">
                        <h2><a href="#"> <span>Titulo del Comercio </span></a></h2>
                        <span>4.5 <img src="../images/stars.png" alt="image"></span>
                        <div class="details-heading-address">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Calle Nueva 152, Ushuaia</p>
                            <ul>
                                <li><i class="fa fa-phone" aria-hidden="true"></i> +54 2901 2541</li>
                                <li><i class="fa fa-envelope" aria-hidden="true"></i> hotelxx@email.com</li>
                                <li><i class="fa fa-user" aria-hidden="true"></i> Claudia</li>
                            </ul>
                        </div>

                        <div class="details-heading-address2">
                            <ul>
                                <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i>Deje un Comentario</a> </li>
                                <li><a href="contact.html"><i class="fa fa-commenting-o" aria-hidden="true"></i>Envie un Mensaje</a> </li>
                                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Llamenos</a> </li>
                                <li><a href="#"><i class="fa fa-usd" aria-hidden="true"></i>Obtener Cita</a> </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>

            <div class="row m_t40">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="details-heading heading">

                        <h2 class="p_b40"> <span>Nosotros</span></h2>

                        <p>Aca una breve descripcion del Comercio.</p>

                        <ul class="social-register-icon">
                            <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a>
                            </li>
                            <li><a href="#"><i class="fa fa-google"></i> Google+</a>
                            </li>
                            <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>
                        </ul>

                    </div>

                    <div class="details-heading heading">

                        <h2 class="p_b20"> <span>Nuestros Servicios</span></h2>

                        <p>Aca otra descripcion de los servicios ofrecidos.</p>

                        <div class="main">

           

                            <div class="add-more text-center">
                                <a href="#">Agregar Mas</a>
                            </div>
                        </div>

                    </div>

                    <div class="details-heading heading">

                        <h2 class="p_b20"><span> Avanzada</span></h2>

                        <p>Descripcion del Comercio, algo mas.</p>

                        <div class="panel-group m_t40" id="accordion" role="tablist" aria-multiselectable="true">

                            <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Descripcion 1
                              </a>
                            </h4>
                                </div>

                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body">

                                        <div class="row">

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="listing-special">
                                                    <img src="images/listing-services-2-2.jpg" alt="image">
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-8 col-xs-12">

                                                <div class="listing-special-detail">

                                                    <h3 class="p_b20">Rubro descripcion <span>$800</span></h3>

                                                    <span>4.5 <img src="../images/stars-2.png" alt="image"></span>

                                                    <p>Descripcion... del contenido.</p>

                                                    

                                                    <div class="details-heading-address2">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> Deje un Comentario</a> </li>
                                                            <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>Envienos un Mensaje</a> </li>
                                                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Llamenos</a> </li>
                                                            <li><a href="#"><i class="fa fa-usd" aria-hidden="true"></i> Reserva</a> </li>
                                                        </ul>
                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>


                            <div class="panel panel-default">

                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                              <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsethree" aria-expanded="false" aria-controls="collapsethree" class="collapsed">
                                 Descripcion 2 (xxx)
                              </a>
                            </h4>
                                </div>

                                <div id="collapsethree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-body">

                                        <div class="row">

                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <div class="listing-special">
                                                    <img src="images/listing-services-2-2.jpg" alt="image">
                                                </div>
                                            </div>

                                            <div class="col-md-8 col-sm-8 col-xs-12">

                                                <div class="listing-special-detail">

                                                    <h3 class="p_b20">Descripcion () <span>$300</span></h3>

                                                    <span>4.5 <img src="../images/stars-2.png" alt="image"></span>

                                                    <p>Descripcion del comercio.</p>

                                                   
                                                   <div class="details-heading-address2">
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i> Deje un Comentario</a> </li>
                                                            <li><a href="#"><i class="fa fa-commenting-o" aria-hidden="true"></i>Envienos un Mensaje</a> </li>
                                                            <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Llamenos</a> </li>
                                                            <li><a href="#" class="bg_blue"><i class="fa fa-usd" aria-hidden="true"></i>Obtener Cita</a> </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="details-heading heading">

                        <h2 class="p_b20">4 Comentarios  <span>Hotel xx</span></h2>

                        <div class="details-heading-review m_t30">

                            <div class="media">

                                <div class="media-left">
                                    <img src="images/listing-review.png" alt="image">
                                </div>

                                <div class="media-body">
                                    <div class="review-detail">
                                        <h3>L. Hernandez <span>4.5 <img src="../images/stars-2.png" alt="image"></span></h3>
                                        <span>17 de Enero, 2018</span>
                                        <p>Comentario del Cliente.</p>
                                        <ul class="listing-amenities">
                                            <li><a href="#!"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <span>Dis-Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-flag-o" aria-hidden="true"></i> <span>Reportes</span> </a> </li>
                                            <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>Comentarios</span> </a> </li>
                                            <li><a href="#!"><span><b>Compartir:</b></span>  </a> </li>
                                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="details-heading-review m_t30">

                            <div class="media">

                                <div class="media-left">
                                    <img src="images/listing-review.png" alt="image">
                                </div>

                                <div class="media-body">
                                    <div class="review-detail">
                                        <h3> M. Hernandez <span>4.5 <img src="../images/stars-2.png" alt="image"></span></h3>
                                        <span>17 Enero, 2018</span>
                                        <p>Comentario del Cliente</p>
                                        <ul class="listing-amenities">
                                            <li><a href="#!"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <span>Dis-Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-flag-o" aria-hidden="true"></i> <span>Reportes</span> </a> </li>
                                            <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>Comentarios</span> </a> </li>
                                            <li><a href="#!"><span><b>Compartir:</b></span>  </a> </li>
                                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="details-heading-review m_t30">

                            <div class="media">

                                <div class="media-left">
                                    <img src="images/listing-review.png" alt="image">
                                </div>

                                <div class="media-body">
                                    <div class="review-detail">
                                        <h3>L. Hernandez <span>4.5 <img src="../images/stars-2.png" alt="image"></span></h3>
                                        <span>17th October, 2017</span>
                                        <p>Comentario xxxxxxx.</p>
                                        <ul class="listing-amenities">
                                            <li><a href="#!"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <span>Dis-Like</span></a> </li>
                                            <li><a href="#!"><i class="fa fa-flag-o" aria-hidden="true"></i> <span>Report</span> </a> </li>
                                            <li><a href="#!"><i class="fa fa-commenting-o" aria-hidden="true"></i> <span>Comments</span> </a> </li>
                                            <li><a href="#!"><span><b>Share Now:</b></span>  </a> </li>
                                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="details-heading heading">

                        <h2 class="p_b20"> <span>Escriba un Comentario</span></h2>

                        <form id="form-review" method="post" action="?">

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="form-review-name">Nombre</label>
                                        <input class="form-control" id="form-review-name" name="form-review-name" required="" type="text">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-review-email">Email</label>
                                        <input class="form-control" id="form-review-email" name="form-review-email" required="" type="email">
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <label for="form-review-message">Mensaje</label>
                                        <textarea class="form-control" id="form-review-message" name="form-review-message" rows="3" required></textarea>
                                    </div>
                                    <!-- /.form-group -->
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">Enviar Mensaje</button>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-4">
                                    <aside class="user-rating">
                                        <label>Valore</label>
                                        <figure class="rating active" data-name="value"><span class="stars"><i class="fa fa-star s1" data-score="1"></i><i class="fa fa-star s2" data-score="2"></i><i class="fa fa-star s3" data-score="3"></i><i class="fa fa-star s4" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span>
                                            <input readonly name="score_value" id="score_value" hidden="">
                                        </figure>
                                    </aside>
                                    <aside class="user-rating">
                                        <label>Servicio</label>
                                        <figure class="rating active" data-name="score"><span class="stars"><i class="fa fa-star s1" data-score="1"></i><i class="fa fa-star s2" data-score="2"></i><i class="fa fa-star s3" data-score="3"></i><i class="fa fa-star s4" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span>
                                            <input readonly name="score_score" id="score_score" hidden="">
                                        </figure>
                                    </aside>
                                </div>

                            </div>

                        </form>

                    </div>

                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">

                    <div class="right-bar bg_white">
                        <h4><span>Direccion</span></h4>
                        <div id="cd-google-map">
                            <div id="google-container"></div>
                            <div id="cd-zoom-in"></div>
                            <div id="cd-zoom-out"></div>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Calle Nueva 1257, Ushuaia</p>
                            <p><i class="fa fa-phone" aria-hidden="true"></i> +54 2901 7890</p>
                            <p><i class="fa fa-globe" aria-hidden="true"></i> <a href="#">www.info.com</a>
                            </p>
                        </div>
                    </div>

                    <div class="right-bar bg_white">
                        <h4><span>Contacto Rapido</span></h4>
                        <form class="form-right">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nombre" name="name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="E-mail" name="email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Telefono" name="phone">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="messgae" placeholder="Mensaje"></textarea>
                            </div>
                            <div class="form-group">
                                <button>Enviar</button>
                            </div>
                        </form>
                    </div>

                    <div class="right-bar bg_white">
                        <h4><span>Otra Informacion</span></h4>
                        <ul class="right-bar-listing">
                            <li><a href="#">Adquiera Hoy <span class="bg_blue color_white">(Abierto)</span></a>
                            </li>
                            <li><a href="#">Experiencias  <span>(12)</span></a>
                            </li>
                            <li><a href="#">Estacionamiento  <span>(Si)</span></a>
                            </li>
                            <li><a href="#">Zona de Fumadores  <span>(Si)</span></a>
                            </li>
                            <li><a href="#">Mesa de Pool <span>(Si)</span></a>
                            </li>
                            <li><a href="#">Take Out <span>(No)</span></a>
                            </li>
                            <li><a href="#">Ofertas Para Grupos <span>(Si)</span></a>
                            </li>
                            <li><a href="#">Todas las Tarjetas  <span>(Si)</span></a>
                            </li>
                            <li><a href="#">Horario de atencion <span>(09:00 am)</span></a>
                            </li>
                            <li><a href="#">Horario de Cierre <span>(10:00 pm)</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="right-bar bg_white">
                        <h4><span>Nuevo</span></h4>
                        <div id="recent-listing" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/recent-1.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Turismo</a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Hoteles</a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/20160207_053613.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Turismo</a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Deportes</a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/recent-1.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Hogar </a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Vehiculos</a>
                                        <a href="#" class="recent-readmore">Lea Mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Listing Details Heading -->

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
                        <h4 class="modal-title" id="myModalLabel">Tierra del -fuego</h4>
                        <ul class="best-things-listing">
                            <li><a href="#">3 Ciudades,</a>
                            </li>
                            <li><a href="#">130 Publicidades,</a>
                            </li>
                            <li><a href="#">Vistas 6753</a>
                            </li>
                        </ul>
                        <img src="../images/stars-2.png" alt="image">
                    </div>
                    <div class="modal-body">

                        <div id="best-thing-slider" class="owl-carousel owl-theme">
                            <div class="item">
                                <img src="images/best-thing-slider-1.jpg" alt="image">
                            </div>
                            <div class="item">
                                <img src="images/best-thing-slider-1.jpg" alt="image">
                            </div>
                            <div class="item">
                                <img src="images/best-thing-slider-1.jpg" alt="image">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="best-thing-model-description">
                                    <h4>Descripcion</h4>
                                    <p>algunas Palabras  </p>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="best-thing-model-feature">
                                    <h4>Novedades</h4>
                                    <ul>
                                        <li>Restaurantes (152,546)</li>
                                        <li>Hoteles (35,366)</li>
                                        <li>Turismo(2,546)</li>
                                        <li>Deportes& Spa (1,546)</li>
                                        <li>Profesionales (2, 34, 546)</li>
                                        <li>Hogar (2,546)</li>
                                        <li>Salud - Belleza (3,506)</li>
                                        <li>Enseñanza (12,546)</li>
                                        <li>Vehixulos (22,546)</li>
                                        <li>Otros Servicios (24,567)</li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                        <div class="best-thing-model-description">
                            <h4>Mensajes Antiguos</h4>
                            <img src="../images/stars-2.png" alt="image">
                             <p> Algiunas Palabras</p>

                            <div class="best-thing-model-btn">
                                <a href="listing-details.html">Mas Detalles</a>
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
    <script src="../js/modernizr.custom.js"></script>
    <script src="../js/grid.js"></script>
    <script src="../js/zelect.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/modernizr.custom.26633.js"></script>
    <script src="../js/jquery.gridrotator.js"></script>
    <script src="js/richmarker-compiled.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAOBKD6V47-g_3opmidcmFapb3kSNAR70U"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/functions.js"></script>
    <script>
        $(function() {
            Grid.init();
        });
    </script>
</body>

</html>