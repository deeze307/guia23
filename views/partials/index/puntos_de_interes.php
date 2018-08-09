<?php //var_dump($points_of_interest); ?>

<section id="post-visited-places">

    <div class="container over-hide">

        <div class="row">
            <div class="col-md-12 heading text-center">
                <h2><span>Puntos de Interés</span></h2>
                <p>Puntos de Interés clave que no pueden dejar de Visitar</p>
            </div>
        </div>

        <div class="row">
            <div id="places-slider" class="owl-carousel owl-theme">

                <?php

                foreach ($points_of_interest as $point)
                {
                    $image = explode(',',$point->commercial_image);
                    if($image[0] != "")
                    {
//                                        $image = '1@.png';
//                                        $image = $_COOKIE['CAT_NAME'].'/'.$image[0];
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

                    echo '
                    <div class="item">
                    <div class="popular-listing-box">
                        <div class="popular-listing-img_points_of_interest">
                            <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/guia23/images/'.$image.'" alt="image">
                                <figcaption>
                                    <ul>
                                        <li><a data-toggle="modal" data-target="#myModal" href="#"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="popular-listing-detail">
                            <h3><a href="'. $_SERVER["DOCUMENT_ROOT"].'/guia23/views/listing/listing.php">'.$point->title.'</a></h3>
                            <span>Categoria: <a href="#">Puntos de Interes</a></span>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> '.$point->address.'</p>
                        </div>

                        <ul class="place-listing-add">
                        
                            <li>('.$point->visitas.' Visitas) </li>
                            <li><img src="images/stars.png" alt="image">
                            </li>
                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
';
                }
                ?>


<!--                <div class="item">-->
<!--                    <div class="popular-listing-box">-->
<!--                        <div class="popular-listing-img">-->
<!--                            <figure class="effect-ming"> <img src="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/images/Museos/museo-003.jpg" alt="image">-->
<!--                                <figcaption>-->
<!--                                    <ul>-->
<!--                                        <li><a data-toggle="modal"  href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </figcaption>-->
<!--                            </figure>-->
<!--                        </div>-->
<!---->
<!--                        <div class="popular-listing-detail">-->
<!--                            <h3><a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/listing/listing.php">Museo del Presidio</a></h3>-->
<!--                            <span>Categoria: <a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php">Museo</a></span>-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Yaganes 75, Ushuaia</p>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="place-listing-add">-->
<!--                            <li>(145 Vistas) </li>-->
<!--                            <li><img src="images/stars.png" alt="image">-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="item">-->
<!--                    <div class="popular-listing-box">-->
<!--                        <div class="popular-listing-img">-->
<!--                            <figure class="effect-ming"> <img src="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/images/Museos/museo1.jpg" alt="image">-->
<!--                                <figcaption>-->
<!--                                    <ul>-->
<!--                                        <li><a data-toggle="modal"  href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </figcaption>-->
<!--                            </figure>-->
<!--                        </div>-->
<!---->
<!--                        <div class="popular-listing-detail">-->
<!--                            <h3><a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/listing/listing.php">Museo del Fin del Mundo</a></h3>-->
<!--                            <span>Categoria: <a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php">Museos</a></span>-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i>Av. Maipu   Ushuaia</p>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="place-listing-add">-->
<!--                            <li>(75 Vistas) </li>-->
<!--                            <li><img src="images/stars.png" alt="image">-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="item">-->
<!--                    <div class="popular-listing-box">-->
<!--                        <div class="popular-listing-img">-->
<!--                            <figure class="effect-ming"> <img src="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/images/Museos/casa-beban.jpg" alt="image">-->
<!--                                <figcaption>-->
<!--                                    <ul>-->
<!--                                        <li><a data-toggle="modal"  href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </figcaption>-->
<!--                            </figure>-->
<!--                        </div>-->
<!---->
<!--                        <div class="popular-listing-detail">-->
<!--                            <h3><a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/listing/listing.php">Casa Beban</a></h3>-->
<!--                            <span>Categoria: <a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php">Museos</a></span>-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Maipu 1100 Ushuaia</p>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="place-listing-add">-->
<!--                            <li>(131 Visitas) </li>-->
<!--                            <li><img src="images/stars.png" alt="image">-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="item">-->
<!--                    <div class="popular-listing-box">-->
<!--                        <div class="popular-listing-img">-->
<!--                            <figure class="effect-ming"> <img src="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/images/Museos/Museo2.jpg" alt="image">-->
<!--                                <figcaption>-->
<!--                                    <ul>-->
<!--                                        <li><a data-toggle="modal"  href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </figcaption>-->
<!--                            </figure>-->
<!--                        </div>-->
<!---->
<!--                        <div class="popular-listing-detail">-->
<!--                            <h3><a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/listing/listing.php">Museo de la Legislatura</a></h3>-->
<!--                            <span>Categoria: <a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php">Museos</a></span>-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Av. Maipu - Ushuaia</p>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="place-listing-add">-->
<!--                            <li>(145 Vistas) </li>-->
<!--                            <li><img src="../images/stars.png" alt="image">-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!--                <div class="item">-->
<!--                    <div class="popular-listing-box">-->
<!--                        <div class="popular-listing-img">-->
<!--                            <figure class="effect-ming"> <img src="#" alt="image">-->
<!--                                <figcaption>-->
<!--                                    <ul>-->
<!--                                        <li><a data-toggle="modal"  href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/Museos.php"><i class="fa fa-sign-in" aria-hidden="true"></i></a>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </figcaption>-->
<!--                            </figure>-->
<!--                        </div>-->
<!---->
<!--                        <div class="popular-listing-detail">-->
<!--                            <h3><a href="--><?php //$_SERVER["DOCUMENT_ROOT"]; ?><!--/guia23/views/listing/listing.php">Laguna Esmeralda</a></h3>-->
<!--                            <span>Category: <a href="#">Parque Nacional </a></span>-->
<!--                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> Parque Nacional Tierra del Fuego</p>-->
<!--                        </div>-->
<!---->
<!--                        <ul class="place-listing-add">-->
<!--                            <li>(75 Visitas) </li>-->
<!--                            <li><img src="../images/stars.png" alt="image">-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                            <li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i></a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!---->
<!--                    </div>-->
<!--                </div>-->

            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center discover">
                <h2>Descubra las Empresas Provinciales</h2>
                <a href="<?php $_SERVER['DOCUMENT_ROOT']?>/guia23/views/Index-tdf.php">Ir</a>
            </div>
        </div>

    </div>

</section>
