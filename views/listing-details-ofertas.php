<?php
require_once("../app/controller/ValuationsController.php");
require_once("../app/controller/ProfileController.php");
require_once("../app/controller/AdvertsingsController.php");
if (!isset($_SESSION))
{ session_start(); }

// SI no hay ciudad seleccionada se redirecciona al index
if(!isset($_SESSION['selected_province_id']))
{
    header("Location: ".__URL__."/index.php");
}

// Quito la variable de ofertas para que no redireccione si entro a otra publicación.
unset($_SESSION['sale']);

if(isset($_SESSION['adv_detail']->user_id))
{
    $profile = new ProfileController();
    $perfil_de_usuario = $profile->getFullProfile($_SESSION['adv_detail']->user_id);
    if(isset($perfil_de_usuario->user_id))
    {
        $_SESSION['adv_detail']->first_name = $perfil_de_usuario->name;
    }
}

$adv_detail = $_SESSION['adv_detail'];
if(isset($adv_detail->address) && ($adv_detail->address != '' || $adv_detail->address != null))
{
    $adv_detail->address = $adv_detail->address.', ';
}

$val = new ValuationsController();
$valuations = $val->getValuationsForAdvId($adv_detail->advertsing_id);

// Iniciamos contador de visitas
$ad_counter = new AdvertsingsCounter();
$ad_counter->index($adv_detail->advertsing_id);

// Valoraciones
switch($adv_detail->valoraciones)
{
    case '0':
        $valoracion = '<span class="fa fa-star-o"/> 
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
        break;
    case '1':
        $valoracion = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';                                           break;
    case '2':
        $valoracion = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
        break;
    case '3':
        $valoracion = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
        break;
    case '4':
        $valoracion = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>';
        break;
    case '5':
        $valoracion = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>';
        break;
}

?>
<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23 - Detalles de Oferta</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/color-green.css">
    <link rel="shortcut icon" href="../images/short_icon.png">
    <link href="../css/guia23.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Start of Zendesk Chat Script-->
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
<!--End of Zendesk Chat Script-->

</head>

<body>

    <?php
    if(isset($_SESSION["message"]))
    {
        echo "<div class='label-success text-center' style='color:white;'>". $_SESSION['message']."</div>";
        unset($_SESSION["message"]);
    }
    elseif(isset($_SESSION["error"]))
    {
        echo "<div class='label-danger text-center' style='color:white;'>". $_SESSION['error']."</div>";
        unset($_SESSION["error"]);
    }
    ?>

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
                        <h2> Reservar "<?php echo $adv_detail->title; ?>" </h2>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!-- Listing Details Heading -->
    <section id="listing-details" class="p_b70 p_t70">


        <div class="container">

<!--            <div class="row">-->
<!---->
<!--                <div class="col-md-12">-->
<!---->
<!--                    <div class="details-heading heading">-->
<!--                        <h2><a href="#"> <span>--><?php //echo $adv_detail->title ?><!--</span></a></h2>-->
<!--                        <div> --><?php //echo $adv_detail->valoraciones. ".0   " .$valoracion; ?><!--</div>-->
<!--                        <div class="details-heading-address">-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> --><?php //echo $adv_detail->address.$adv_detail->city_name .'('.$adv_detail->province_name.')' ?><!--</p>-->
<!--                            <ul>-->
<!--                                --><?php
//                                if(isset($adv_detail->phone))
//                                {
//                                    echo '<li><i class="fa fa-phone" aria-hidden="true"></i> '.$adv_detail->phone.'</li>';
//                                }
//                                if(isset($adv_detail->email_notify))
//                                {
//                                    echo '<li><i class="fa fa-envelope" aria-hidden="true"></i> '.$adv_detail->email_notify .'</li>';
//                                }
//
//                                if(isset($adv_detail->first_name))
//                                {
//                                    echo '<li><i class="fa fa-user" aria-hidden="true"></i> '.$adv_detail->first_name.' </li>';
//                                }?>
<!--                            </ul>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                </div>-->
<!---->
<!--            </div>-->





            <div class="row m_t40">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="details-heading heading">

                        <h2 class="p_b40"> <span>Descripción</span></h2>

                        <p><?php echo $adv_detail->description ?></p>

                    </div>

                    <div class="details-heading heading">

                        <h3 class="p_b40">
                        <p>Con esta modalidad usted podrá reservar una oferta publicada por algún comerciante.</p>
                        </h3>
                        <h4>
                            <p>- Ustéd recibirá un correo con el código de la oferta reservada con el cual podrá obtener su producto / servicio.</p>
                            <p>- A su vez, el comerciante tambien recibirá una notificación de la reserva.</p>
                        </h4>

                        </h3>
                    </div>

                    <section id="least">
                        <div id="least">
                            <div class="least-preview"></div>

                            <ul class="least-gallery">
                                <?php
                                // Hago split de imagenes del comercio
                                if(isset($adv_detail->commercial_image) && $adv_detail->commercial_image != '')
                                {
                                    $images = explode(',',$adv_detail->commercial_image);
                                    foreach($images as $image)
                                    {
                                        $image_name = explode('/',$image);
                                        if(count($image_name) > 1)
                                        {
                                            $image_name_without_dir = explode('.',$image_name[1]);
                                        }
                                        else{ $image_name_without_dir[0] = "";}
                                        $image_name_without_ext = $image_name_without_dir[0];
                                        echo $image_name_without_ext;
                                        echo '<li>
                                            <a href="'.__URL__.'/images/'.$image.'" title="'.$image_name_without_ext.'" data-subtitle="#" data-caption="<strong></strong><a href=´#´ target=´_blank´><span></span></a>">
                                            <img src="'.__URL__.'/images/'.$image.'" alt="'.$image_name_without_ext.'" /></a>
                                        </li>';
                                    }
                                }
                                ?>
                            </ul>
                    </section>

                    <hr id="pre_nuevo_comentario">

                    <div id="reservar_oferta" class="details-heading heading">

                        <h2 class="p_b20"> <span>Reserve la Oferta Ahora Mismo!</span></h2>

                        <form id="form-review" method="post" action="../app/controller/ValuationsController.php">

                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="form-review-name">Nombre</label>
                                        <input class="form-control" id="form-review-name" name="form-review-name" required="" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="form-review-email">Email</label>
                                        <input class="form-control" id="form-review-email" name="form-review-email" required="" type="email">
                                    </div>
                                    <div class="form-group">
                                        <button type="button" class="btn btn-default" id="post_reservar_oferta" name="post_reservar_oferta">Reservar Ahora</button>
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">

                    <div class="right-bar bg_white">
                        <h4><span>Dirección</span></h4>
                        <div id="cd-google-map">
                            <div id="google-container"></div>
                            <div id="cd-zoom-in"></div>
                            <div id="cd-zoom-out"></div>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $adv_detail->address.$adv_detail->city_name .'('.$adv_detail->province_name.')' ?></p>
                            <?php
                            if(isset($adv_detail->phone))
                            {
                                echo '<p><i class="fa fa-phone" aria-hidden="true"></i> '. $adv_detail->phone .'</p>';
                            }
                            if(isset($adv_detail->website))
                            {
                                echo '<p><i class="fa fa-globe" aria-hidden="true"></i> <a href="'. $adv_detail->website .'">'. $adv_detail->website .'</a></p>';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="right-bar bg_white">
                        <h4><span>Otra Informacion</span></h4>
                        <ul class="right-bar-listing">
                            <?php
                            if((date("H:i:s") >= $adv_detail->first_schedule_attention_from) && (date("H:i:s") <= $adv_detail->first_schedule_attention_to))
                            {
                                echo '<li><a href="#">Ahora <span class="bg_blue color_white">(Abierto)</span></a>';
                            }
                            else
                            {
                                echo '<li><a href="#">Ahora <span class="bg_lightgry">(Cerrado)</span></a>';
                            }
                            echo '</li>';

                            ?>
                            <li><a href="#">Horario de atencion <span>(<?php echo $adv_detail->first_schedule_attention_from ?>)</span></a>
                            </li>
                            <li><a href="#">Horario de Cierre <span>(<?php echo $adv_detail->first_schedule_attention_to ?>)</span></a>
                            </li>
                        </ul>
                    </div>

                </div>

            </div>

        </div>
    </section>
    <!-- Listing Details Heading -->



    <!-- Footer -->
    <?php require "partials/footer.php";?>
    <!-- Footer -->


    <script src="../js/jquery.2.2.3.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.appear.js"></script>
    <script src="../js/jquery-countTo.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/bootsnav.js"></script>
    <script src="../js/modernizr.custom.js"></script>
    <script src="../js/zelect.js"></script>
    <script src="../js/parallax.min.js"></script>
    <script src="../js/modernizr.custom.26633.js"></script>
    <script src="../js/jquery.gridrotator.js"></script>
    <script src="../js/richmarker-compiled.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCjJIxi33Avc9y0wcvky9HUR8Q6VsT_YlY"></script>
    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/google-map.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/least.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/guia23.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.least-gallery').least();

            // Valoraciones
            $('i').on('click', valoracion);

            function valoracion() {
                var clickeado = $(this).attr("data-score");
                $('#score_value').attr({value : clickeado});

                $(this).addClass('checked');
                if(clickeado === "1"){
                    $(".s2").removeClass('checked');
                    $(".s3").removeClass('checked');
                    $(".s4").removeClass('checked');
                    $(".s5").removeClass('checked');
                }else if(clickeado === "2"){
                    $(".s1").addClass('checked');
                    $(".s3").removeClass('checked');
                    $(".s4").removeClass('checked');
                    $(".s5").removeClass('checked');
                }else if(clickeado === "3"){
                    $(".s1").addClass('checked');
                    $(".s2").addClass('checked');
                    $(".s4").removeClass('checked');
                    $(".s5").removeClass('checked');
                }else if(clickeado === "4"){
                    $(".s1").addClass('checked');
                    $(".s2").addClass('checked');
                    $(".s3").addClass('checked');
                    $(".s5").removeClass('checked');
                }else if(clickeado === "5"){
                    $(".s1").addClass('checked');
                    $(".s2").addClass('checked');
                    $(".s3").addClass('checked');
                    $(".s4").addClass('checked');
                }
            }

            $('#re-comentario').on('click',function(){
                var x = document.getElementById("responder_comentario");
                if (x.style.display === "none") {
                    $("#form-review-2")[0].reset();
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            });

        });
    </script>
</body>

</html>