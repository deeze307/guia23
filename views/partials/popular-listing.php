<?php  ?>

    <!-- Popular Listing -->
    <section id="popular-listing" class="p_b70 p_t70">
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
<!--                            <div class="row">-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="##">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Decripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="#">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="listing/listing.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="listing/listing.php">Nombre del comercio</a></h3>-->
<!--                                            <p>Decripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i>Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="listing/listing.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="listing/listing.php">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i>Ciudad</span><span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="col-md-4 col-sm-6 col-xs-12">-->
<!--                                    <div class="popular-listing-box">-->
<!--                                        <div class="popular-listing-img">-->
<!--                                            <figure class="effect-ming"> <img src="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/guia23/images/1@.png" alt="image">-->
<!--                                                <figcaption>-->
<!--                                                    <ul>-->
<!--                                                        <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="listing/listing.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>-->
<!--                                                        <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>-->
<!--                                                    </ul>-->
<!--                                                </figcaption>-->
<!--                                            </figure>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-detail">-->
<!--                                            <h3><a href="listing/listing.php">Nombre del comercio</a></h3>-->
<!--                                            <p>Descripcion.</p>-->
<!--                                        </div>-->
<!--                                        <div class="popular-listing-add"> <span><i class="fa fa-map-marker" aria-hidden="true"></i> Ciudad</span> <span><img src="../../images/stars.png" alt="image"></span> </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>

                        <div role="tabpanel" class="tab-pane fade  in active" id="home">
                            <div class="row">
                                <?php
                                foreach($_SESSION['ADVS_FOR_CAT'] as $advertsing)
                                {
                                    $image = explode(',',$advertsing->commercial_image);
                                    if($image[0] != "")
                                    {
//                                        $image = '1@.png';
                                        $image = $_COOKIE['CAT_NAME'].'/'.$image[0];
                                    }
                                    else
                                    {
                                        $image = '1@.png';
                                    }

                                    if(isset($advertsing->geolocation))
                                    {
                                        $advertsing->geolocation = $advertsing->geolocation.', ';
                                    }

                                    echo '<div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="popular-listing-box">
                                                <div class="popular-listing-img">
                                                    <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/guia23/images/'.$image.'" alt="image" height="300" width="400">
                                                        <figcaption>
                                                            <ul>
                                                                <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                                <li><a href="http://'. $_SERVER['SERVER_NAME'] .'/guia23/views/listing/listing.php"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                                <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                            </ul>
                                                        </figcaption>
                                                    </figure>
                                                </div>
                                                <div class="popular-listing-detail">
                                                    <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/guia23/views/listing/listing.php">'.$advertsing->title.'</a></h3>
                                                    <p>'.$advertsing->description.'</p>
                                                </div>
                                                <div class="popular-listing-add">
                                                    <span><img src="../../images/stars.png" alt="image"></span>
                                                    <span><i class="fa fa-map-marker" aria-hidden="true"></i>'.$advertsing->geolocation.$advertsing->city_name.' ('.$advertsing->province_name.')</span>
                                                </div>
                                            </div>
                                        </div>';
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="bs-example" data-example-id="disabled-active-pagination">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">«</span></a>
                                </li>
                                <li class="active"><a href="#">1 <span class="sr-only">(Primera)</span></a>
                                </li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#" aria-label="Next"><span aria-hidden="true">»</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>

                <div class="col-md-3 col-sm-3 col-xs-12 listing-rightbar">

                    <?php require "categories-widget.php";?>

                    <?php require "new-added-widget.php";?>

                    <div class="right-bar">
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
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Popular Listing -->

