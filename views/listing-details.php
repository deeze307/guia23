<?php
require_once("../app/controller/ValuationsController.php");
require_once("../app/controller/ProfileController.php");
require_once("../app/controller/AdvertsingsController.php");


if (!isset($_SESSION))
{ session_start(); }
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
$advertsings = new Advertsings();
$adv_from_user = $advertsings->requestAllForUser($adv_detail->user_id);
$advertsingsController = new AdvertsingsController();
$new_added = $advertsingsController->getLastAdded();
setcookie("latitud",$adv_detail->latitude,time() + 3600,"/");
setcookie("longitud",$adv_detail->longitude,time() + 3600,"/");
setcookie("cat_id",$adv_detail->category_id,time() + 3600,"/");

if(isset($adv_detail->address) && ($adv_detail->address != '' || $adv_detail->address != null))
{
    $adv_detail->address = $adv_detail->address.', ';
}

$val = new ValuationsController();
$valuations = $val->getValuationsForAdvId($_SESSION['adv_detail']->advertsing_id);

// Iniciamos contador de visitas
$ad_counter = new AdvertsingsCounter();
$ad_counter->index($_SESSION['adv_detail']->advertsing_id);


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
<!--<html lang="ES">-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23-Detalles</title>
    <link rel="stylesheet" type="text/css" href="../css/master.css">
    <link rel="stylesheet" type="text/css" href="../css/color-green.css">
    <link rel="shortcut icon" href="../images/short_icon.png">
    <link href="../css/guia23.min.css" rel="stylesheet" />
    <!--[if lt IE 9]>
    <script src="../js/html5shiv.min.js"></script>
    <script src="../js/respond.min.js"></script>
    <![endif]-->


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
                        <h2> Detalles </h2>
                        <!--<p><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/views/Index-tdf.php">Inicio  </a> <i class="fa fa-angle-double-right" aria-hidden="true"></i></p>-->

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Inner Banner -->

    <!--- Puntos de Iterea-->

    <section class="details-heading heading" id="#">

        <div class="container">

            <div class="row">
                <div class="col-md-12 heading text-center">
                    <h2><span>Ofertas Exclusivas</span></h2>
                </div>
            </div>

            <div class="row">
                <div id="places-slider" class="owl-carousel owl-theme">

                    <?php

                    foreach ($adv_from_user as $point)
                    {
                        $image = explode(',',$point->commercial_image);
                        if($image[0] != "")
                        {
                            $image = $image[0];
                        }
                        else
                        {
                            $image = '1@.png';
                        }

                        if($point->visitas <= 0)
                        {
                            $point->visitas = 0;
                        }

                        // Valoraciones
                        switch($point->valoraciones)
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

                        echo '
                    <div class="item">
                    <div class="popular-listing-box">
                        <div class="popular-listing-img_points_of_interest">
                            <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/images/'.$image.'" alt="image">
                                <figcaption>
                                    <ul>
                                        <li><a href="http://'. $_SERVER['SERVER_NAME'].'/views/listing/listing.php?cat_id='.$point->category_id.'"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="popular-listing-detail">
                            <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$point->advertsing_id.'&cat_name='.$point->category_name.'">'.$point->title.'</a></h3>
                            <span>Categoria: <a href="#">'.$point->category_name.'</a></span>
                           <p><i class="fa fa-map-marker" aria-hidden="true"></i> '.$point->address.'</p>
                        </div>

                        <ul class="place-listing-add">
                        
                            <li>('.$point->visitas.' Visitas) </li>
                            <li>'.$valoracion.'
                            </li>
                            <!--<li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </li>-->
                            <div class="form-group">
                           <button>Ver Oferta</button>

                           </div>

                        </ul>

                    </div>
                </div>
';
                    }
                    ?>

                </div>
            </div>
        </div>

    </section>

    <!--- Fin Puntos de Iteres -->

    <!-- Listing Details Heading -->
    <section id="listing-details" class="p_b70 p_t70">


        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <div class="details-heading heading">
                        <h2><a href="#"> <span><?php echo $adv_detail->title ?></span></a></h2>
                        <div> <?php echo $adv_detail->valoraciones. ".0   " .$valoracion; ?></div>
                        <div class="details-heading-address">
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $adv_detail->address.$adv_detail->city_name .'('.$adv_detail->province_name.')' ?></p>
                            <ul>
                                <?php
                                if(isset($adv_detail->phone))
                                {
                                    echo '<li><i class="fa fa-phone" aria-hidden="true"></i> '.$adv_detail->phone.'</li>';
                                }
                                 if(isset($adv_detail->email_notify))
                                {
                                    echo '<li><i class="fa fa-envelope" aria-hidden="true"></i> '.$adv_detail->email_notify .'</li>';
                                }

                                if(isset($adv_detail->first_name))
                                {
                                    echo '<li><i class="fa fa-user" aria-hidden="true"></i> '.$adv_detail->first_name.' </li>';
                                }?>
                            </ul>
                        </div>

                        <div class="details-heading-address2">
                            <ul>
                                <li><a href="#pre_nuevo_comentario"><i class="fa fa-star-o" aria-hidden="true"></i>Deje un Comentario</a> </li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>





            <div class="row m_t40">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="details-heading heading">

                        <h2 class="p_b40"> <span>Descripción</span></h2>

                        <p><?php echo $adv_detail->description ?></p>

                        <ul class="social-register-icon">
                            <?php
                            $splitted_social_networks = explode(',',$adv_detail->social_networks);

                            $facebook_url = $splitted_social_networks[0];
                            $facebook_url = explode("=",$facebook_url);
                            if($facebook_url[1] == "")
                            { $facebook_disabled = 'class="disabled"'; }
                            else{$facebook_disabled ="";}

                            $google_plus_url = $splitted_social_networks[1];
                            $google_plus_url = explode("=",$google_plus_url);
                            if($google_plus_url[1] == "")
                            { $google_plus_disabled = 'class="disabled"'; }
                            else{$google_plus_disabled="";}

                            $instagram_url = $splitted_social_networks[2];
                            $instagram_url = explode("=",$instagram_url);
                            if($instagram_url[1] == "")
                            { $instagram_disabled = 'class="disabled"'; }
                            else{$instagram_disabled="";}

                            $twitter_url = $splitted_social_networks[3];
                            $twitter_url = explode("=",$twitter_url);
                            if($twitter_url[1] == "")
                            { $twitter_disabled = 'class="disabled"'; }
                            else{$twitter_disabled="";}

                            $linkedin_url = $splitted_social_networks[4];
                            $linkedin_url = explode("=",$linkedin_url);
                            if($linkedin_url[1] == "")
                            { $linkedin_disabled = 'class="disabled"'; }
                            else{$linkedin_disabled="";}

                            $youtube_url = $splitted_social_networks[5];
                            $youtube_url = explode("=",$youtube_url);
                            if($youtube_url[1] == "")
                            { $youtube_disabled = 'class="disabled"'; }
                            else{$youtube_disabled="";}

                            echo '<li '. $facebook_disabled .' ><a href="'. $facebook_url[1] .'"><i class="fa fa-facebook"></i> Facebook</a>
                            </li>';
                            echo '<li '. $google_plus_disabled .' ><a href="'. $google_plus_url[1] .'"><i class="fa fa-google"></i> Google+</a>
                            </li>';
                            echo '<li '. $twitter_disabled .' ><a href="'. $twitter_url[1] .'"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>';
                            echo '<li '. $instagram_disabled .' ><a href="'. $instagram_url[1]  .'"><i class="fa fa-instagram"></i> Instagram</a>
                            </li>';
                            echo '<li '. $linkedin_disabled .' ><a href="'. $linkedin_url[1] .'" ><i class="fa fa-linkedin"></i> LinkedIn</a>
                            </li>';
                            echo '<li '. $youtube_disabled .' ><a href="'. $youtube_url[1] .'"><i class="fa fa-youtube"></i> YouTube</a>
                            </li>';
                            ?>
                        </ul>

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
                                            <a href="http://'.$_SERVER['SERVER_NAME'].'/images/'.$image.'" title="'.$image_name_without_ext.'" data-subtitle="#" data-caption="<strong></strong><a href=´#´ target=´_blank´><span></span></a>">
                                            <img src="http://'.$_SERVER['SERVER_NAME'].'/images/'.$image.'" alt="Alt Image Text" /></a>
                                        </li>';
                                    }
                                }
                                ?>
                            </ul>
                    </section>



                    <div class="details-heading heading">

                        <h2 class="p_b20">Comentarios</h2>

                        <?php
                        foreach($valuations as $valuation)
                        {
                            // Valoraciones
                            switch($valuation->quantity)
                            {
                                case '0':
                                    $valoracion_mensaje = '<span class="fa fa-star-o"/> 
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
                                    break;
                                case '1':
                                    $valoracion_mensaje = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';                                           break;
                                case '2':
                                    $valoracion_mensaje = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
                                    break;
                                case '3':
                                    $valoracion_mensaje = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>
                                                            <span class="fa fa-star-o"/>';
                                    break;
                                case '4':
                                    $valoracion_mensaje = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star-o"/>';
                                    break;
                                case '5':
                                    $valoracion_mensaje = '<span class="fa fa-star"/> 
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>
                                                            <span class="fa fa-star"/>';
                                    break;
                            }

                            echo '
                            <div class="details-heading-review m_t30">
                                <div class="media">
                                    <div class="media-left">
                                        <img src="../media/avatar/default_mini.png" alt="image">
                                    </div>
                                    <div class="media-body">
                                        <div class="review-detail">
                                            <h3>'.$valuation->name.' </h3><div class="pull-right">'.$valuation->quantity.'  '.$valoracion_mensaje.'</div>
                                            <span>'.$valuation->created_at.'</span>
                                            <p>'.$valuation->message.'</p>
                                            <ul class="listing-amenities">
                                                <!-- <li><a href="#!"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <span>Like</span></a> </li>
                                                <li><a href="#!"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i> <span>Dis-Like</span></a> </li>
                                                <li><a href="#!"><i class="fa fa-flag-o" aria-hidden="true"></i> <span>Reportes</span> </a> </li>-->
                                                <li id="re-comentario"><a ><i class="fa fa-commenting-o" aria-hidden="true" ></i> <span>Comentar</span> </a> </li>
                                                <!--<li><a href="#!"><span><b>Compartir:</b></span>  </a> </li>
                                                <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                                <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                                <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                                <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                                                <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>-->
                                            </ul>
                                            
                                            <!-- Comentar Comentario -->
                                            <div id="responder_comentario" style="display:none;" class="details-heading heading">

                                            <form id="form-review-2" method="post" action="../app/controller/ValuationsController.php">
                    
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
                                                            <textarea class="form-control" id="form-review-message" name="form-review-message" rows="2" required></textarea>
                                                        </div>
                                                        <!-- /.form-group -->
                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-default" id="post_listing_message" name="post_listing_message">Responder Mensaje</button>
                                                        </div>
                                                        <!-- /.form-group -->
                                                    </div>
                    
                                                </div>
                    
                                            </form>

                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>

                    </div>

                    <hr id="pre_nuevo_comentario">

                    <div id="nuevo_comentario" class="details-heading heading">

                        <h2 class="p_b20"> <span>Escriba un Comentario</span></h2>

                        <form id="form-review" method="post" action="../app/controller/ValuationsController.php">

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
                                        <button type="submit" class="btn btn-default" id="post_listing_message" name="post_listing_message">Enviar Mensaje</button>
                                    </div>
                                    <!-- /.form-group -->
                                </div>

                                <div class="col-md-4">
                                    <aside class="user-rating">
                                        <label>Valore</label>
                                        <figure class="rating active" data-name="value">
                                            <span class="stars">
                                                <i class="fa fa-star s1" data-score="1"></i>
                                                <i class="fa fa-star s2" data-score="2"></i>
                                                <i class="fa fa-star s3" data-score="3"></i>
                                                <i class="fa fa-star s4" data-score="4"></i>
                                                <i class="fa fa-star s5" data-score="5"></i>
                                            </span>
                                            <input readonly name="score_value" id="score_value" hidden="" value="0">
                                        </figure>
                                    </aside>
<!--                                    <aside class="user-rating">-->
<!--                                        <label>Servicio</label>-->
<!--                                        <figure class="rating active" data-name="score"><span class="stars"><i class="fa fa-star s1 checked" data-score="1"></i><i class="fa fa-star s2" data-score="2"></i><i class="fa fa-star s3" data-score="3"></i><i class="fa fa-star s4" data-score="4"></i><i class="fa fa-star s5" data-score="5"></i></span>-->
<!--                                            <input readonly name="score_score" id="score_score" hidden="">-->
<!--                                        </figure>-->
<!--                                    </aside>-->
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

<!--                    <div class="right-bar bg_white">-->
<!--                        <h4><span>Contacto Rapido</span></h4>-->
<!--                        <form class="form-right">-->
<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" placeholder="Nombre" name="name">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input type="email" class="form-control" placeholder="E-mail" name="email">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <input type="text" class="form-control" placeholder="Telefono" name="phone">-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <textarea class="form-control" name="messgae" placeholder="Mensaje"></textarea>-->
<!--                            </div>-->
<!--                            <div class="form-group">-->
<!--                                <button>Enviar</button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->

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

                    <?php require_once "partials/new-added-widget.php"; ?>

                </div>

            </div>

        </div>
    </section>
    <!-- Listing Details Heading -->



    <!-- Footer -->
    <?php require "partials/footer.php";?>
    <!-- Footer -->

    <!-- Popups -->

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