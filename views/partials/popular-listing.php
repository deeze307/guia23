<?php ?>

    <!-- Popular Listing -->
    <section id="popular-listing-categories" class="p_b70 p_t70">
        <div class="container">
            <div class="row">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="sort-by">
                        <div class="sort-category"> <span>Ordenar</span>
                            <div class="single-query form-group">
                                <div class="intro">
                                    <select>
                                        <option class="active">Mas Popular</option>
                                        <option>Mas Recientes</option>
                                        <option>Mas Antiguos</option>
                                        <option>Mejor Rating</option>
                                    </select>
                                </div>
                            </div>
                            <ul class="nav nav-tabs sort-listing" role="tablist">
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a>
                                </li>
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                </li>
                                <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <div class="row">
                                <?php

                                foreach($_SESSION['ADVS_FOR_CAT'] as $advertsing) {
                                    $image = explode(',', $advertsing->commercial_image);
                                    if ($image[0] != "") {
                                        $image = $image[0];
                                    } else {
                                        $image = '1@.png';
                                    }

                                    if (isset($advertsing->address) && $advertsing->address != '') {
                                        $advertsing->address = $advertsing->address . ', ';
                                    }

                                    // Valoraciones
                                    switch($advertsing->valoraciones)
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
                                    <div class="col-md-4 col-sm-6 col-xs-12">
                                        <div class="popular-listing-box">
                                            <div class="popular-listing-img_home_profile">
                                                <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/images/'.$image.'" alt="image">
                                                    <figcaption>
                                                        <ul>
                                                            <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                            <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/views/listing/listing.php?cat_id='.$_COOKIE['CAT'].'"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                            <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="popular-listing-detail">
                                                <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$advertsing->advertsing_id.'&cat_name='.$_COOKIE["CAT_NAME"].'">'.$advertsing->title.'</a></h3>
                                            </div>
                                            <div class="popular-listing-add"> 
                                            <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$advertsing->address.$advertsing->city_name.' ('.$advertsing->province_name.')</span>
                                                <div class="pull-right">
                                                    '.$valoracion.'
                                                </div>
                                             </div>
                                        </div>
                                    </div>
                                    ';
                                }
                                ?>
                            </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade  in active" id="home">
                            <div class="row">
                                <?php
                                foreach($_SESSION['ADVS_FOR_CAT'] as $advertsing)
                                {
                                    $image = explode(',',$advertsing->commercial_image);
                                    if($image[0] != "")
                                    {
                                        $image = $image[0];
                                    }
                                    else
                                    {
                                        $image = '1@.png';
                                    }

                                    if(isset($advertsing->address))
                                    {
                                        $advertsing->address = $advertsing->address.', ';
                                    }

                                    // Valoraciones
                                    switch($advertsing->valoraciones)
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

                                    echo '<div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="popular-listing-box">
                                                <div class="popular-listing-img_home_home">
                                                    <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/images/'.$image.'" alt="image" height="300" width="400">
                                                        <figcaption>
                                                            <ul>
                                                                <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                                <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/views/listing/listing.php?cat_id='.$_COOKIE['CAT'].'"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                                <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="popular-listing-detail">
                                                    <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$advertsing->advertsing_id.'&cat_name='.$_COOKIE["CAT_NAME"].'">'.$advertsing->title.'</a></h3>
                                                    <!-- <p>$advertsing->description</p> -->
                                                </div>
                                                <div class="popular-listing-add">
                                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$advertsing->address.$advertsing->city_name.' ('.$advertsing->province_name.')</span>
                                                    <div class="pull-right">
                                                        '.$valoracion.'
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                    $advertsing->address = "";
                                }
                                ?>

                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="messages">
                            <?php
                            foreach($_SESSION['ADVS_FOR_CAT'] as $advertsing)
                            {
                                $image = explode(',',$advertsing->commercial_image);
                                if($image[0] != "")
                                {
                                    $image = $image[0];
                                }
                                else
                                {
                                    $image = '1@.png';
                                }

                                if(isset($advertsing->address))
                                {
                                    $advertsing->address = $advertsing->address.', ';
                                }

                                // Valoraciones
                                switch($advertsing->valoraciones)
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

                                echo'

                            <div class="row">
                            <div class="col-md-12">
                                <div class="popular-listing-box">
                                    <div class="row">
                                        <div class="col-md-5 col-sm-5 col-xs-12">
                                            <div class="popular-listing-img_home_message">
                                                <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/images/'.$image.'" alt="image">
                                                    <figcaption>
                                                        <ul>
                                                            <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                            <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/views/listing/listing.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                            <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">

                                            <div class="popular-listing-detail">
                                                <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$advertsing->advertsing_id.'&cat_name='.$_COOKIE['CAT'].'">'.$advertsing->title.'</a></h3>
                                            </div>
                                            <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$advertsing->address.$advertsing->city_name.' ('.$advertsing->province_name.')</span> 
                                                <div class="pull-right">
                                                    '.$valoracion.'
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                            ';
                            }
                            ?>

                        </div>
                    </div>

<!--                    PAGINACION -->

<!--                    <div class="bs-example" data-example-id="disabled-active-pagination">-->
<!--                        <nav aria-label="...">-->
<!--                            <ul class="pagination">-->
<!--                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>-->
<!--                                </li>-->
<!--                                <li class="active"><a href="#">1 <span class="sr-only">(Primera)</span></a>-->
<!--                                </li>-->
<!--                                <li><a href="#">2</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">3</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">4</a>-->
<!--                                </li>-->
<!--                                <li><a href="#">5</a>-->
<!--                                </li>-->
<!--                                <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </nav>-->
<!--                    </div>-->

                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 listing-rightbar">

                    <?php require "categories-widget.php";?>

                    <?php require "new-added-widget.php";?>

                    <!--<div class="right-bar">
                        <h4><span>Recientes</span></h4>
                        <div id="recent-listing" class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/recent-1.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="../../Vehiculos.html" class="recent-jobs">Vehiculos</a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="../../Hogar.html" class="recent-jobs">Hogar</a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/recent-1.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="../../Turismo.html" class="recent-jobs">Turismo</a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="../../Hoteles.html" class="recent-jobs">Hoteles </a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="recent-listing-img">
                                    <img src="images/recent-1.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="../../Enseñanza.html" class="recent-jobs">Enseñanza</a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                                <div class="recent-listing-img">
                                    <img src="images/recent-2.jpg" alt="image">
                                    <div class="recent-listing-links">
                                        <a href="#" class="recent-jobs">Puntos de Interes</a>
                                        <a href="listing/listing.php" class="recent-readmore">Vea Mas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->

                </div>

            </div>
        </div>
    </section>
    <!-- Popular Listing -->

