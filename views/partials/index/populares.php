<?php
//require_once('../../../app/core/Core.php');

$ad_counter = new AdvertsingsCounter();
$populares = $ad_counter->mostVisited();
//var_dump($populares);
?>
<section id="popular-listing" class="p_t70 over-hide-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12 heading">
                <h2><span>Publicidades mas Visitadas</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="sort-by">
                    <div class="sort-category"> <span>Ordenar</span>
                        <div class="single-query form-group">
                            <div class="intro">
                                <select>
                                    <option class="active">Mas Popular</option>
                                    <option>Mas Reciente</option>
                                    <option>Lo Ultimo</option>
                                    <option>Mejor Rating</option>
                                </select>
                            </div>
                        </div>
                        <ul class="nav nav-tabs sort-listing" role="tablist">
                            <li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a>
                            </li>
                            <li role="presentation"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                            </li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="profile">
                        <div class="row">
                            <?php
                            try{
                                foreach($populares as $popular)
                                {
                                    $image = explode(',',$popular->commercial_image);
                                    if($image[0] != "")
                                    {
                                        $image = $image[0];
                                    }
                                    else
                                    {
                                        $image = '1@-small.png';
                                    }

                                    // Valoraciones
                                    switch($popular->valoraciones)
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
                                
                                <div class="col-md-4 col-sm-6 col-xs-12">
                                <div class="popular-listing-box">
                                    <div class="popular-listing-img_home_profile">
                                        <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/guia23/images/'.$image.'" alt="image" width="262" height="142">
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                    <li><a href="http://'. $_SERVER['SERVER_NAME'].'/guia23/views/listing/listing.php?cat_id='.$popular->category_id.'"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="popular-listing-detail">
                                        <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/guia23/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$popular->advertsing_id.'&cat_name='.$popular->category_name.'">'.$popular->title.'</a></h3>
                                    </div>
                                    <div class="popular-listing-add"> 
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$popular->city_name.'</span>
                                        <div class="pull-right">
                                            '.$valoracion.'
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                ';
                                }
                            }
                            catch(Exception $ex){
                                echo $ex->getMessage();
                            }

                            ?>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="home">
                        <div class="row">
                            <?php
                            try{
                                foreach($populares as $popular)
                                {
                                    $image = explode(',',$popular->commercial_image);
                                    if($image[0] != "")
                                    {
                                        $image = $image[0];
                                    }
                                    else
                                    {
                                        $image = '1@.png';
                                    }

                                    // Valoraciones
                                    switch($popular->valoraciones)
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
                                
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="popular-listing-box">
                                    <div class="popular-listing-img_home_home">
                                        <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/guia23/images/'.$image.'" alt="image">
                                            <figcaption>
                                                <ul>
                                                    <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                    <li><a href="http://'. $_SERVER['SERVER_NAME'].'/guia23/views/listing/listing.php?cat_id='.$popular->category_id.'"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                    <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="popular-listing-detail">
                                        <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/guia23/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$popular->advertsing_id.'&cat_name='.$popular->category_name.'">'.$popular->title.'</a></h3>                                    </div>
                                    <div class="popular-listing-add"> 
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$popular->city_name.'</span> 
                                        <div class="pull-right">
                                            '.$valoracion.'
                                        </div>
                                    </div>
                                </div>
                            </div>
                                
                                ';
                                }
                            }
                            catch(Exception $ex){
                                echo $ex->getMessage();
                            }

                            ?>
                        </div>
                    </div>

                    <div role="tabpanel" class="tab-pane fade" id="messages">
                        <?php
                        try{
                            foreach($populares as $popular)
                            {
                                $image = explode(',',$popular->commercial_image);
                                if($image[0] != "")
                                {
                                    $image = $image[0];
                                }
                                else
                                {
                                    $image = '1@.png';
                                }

                                // Valoraciones
                                switch($popular->valoraciones)
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
                                                <figure class="effect-ming"> <img src="http://'. $_SERVER['SERVER_NAME'] .'/guia23/images/'.$image.'" alt="image">
                                                    <figcaption>
                                                        <ul>
                                                            <li><a href="#!"><i class="fa fa-heart" aria-hidden="true"></i></a> </li>
                                                            <li><a href="http://'. $_SERVER['SERVER_NAME'].'/guia23/views/listing/listing.php?cat_id='.$popular->category_id.'"><i class="fa fa-map-marker" aria-hidden="true"></i></a> </li>
                                                            <li><a href="#!"><i class="fa fa-reply" aria-hidden="true"></i></a> </li>
                                                        </ul>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div>
                                        <div class="col-md-7 col-sm-7 col-xs-12">
                                       
                                            <div class="popular-listing-detail">
                                                <h3><a href="http://'. $_SERVER['SERVER_NAME'] .'/guia23/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$popular->advertsing_id.'&cat_name='.$popular->category_name.'">'.$popular->title.'</a></h3>
                                                <p>'.$popular->description.'</p>
                                            </div>
                                            <div class="popular-listing-add"> 
                                                <span><i class="fa fa-map-marker" aria-hidden="true"></i> '.$popular->city_name.'</span>
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
                        }
                        catch(Exception $ex){
                            echo $ex->getMessage();
                        }

                        ?>


                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <div class="right-bar">
                    <h4><span>Ingrese Ahora</span></h4>
                    <form class="form-right" action="php/insertardatos2.php" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Nombre" name="usuario">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="E-mail" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Contraseña" name="password">
                        </div>
                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="name">  Estoy de acuerdo con los terminos y condiciones</label>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="enviar" value="enviar">Enviar</button>
                        </div>
                    </form>
                </div>
                <div class="right-bar">
                    <h4><span>Agregados Recientes</span></h4>
                    <div id="recent-listing" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="recent-listing-img">
                                <img src="images/20171017_192752_001.jpg" width="254" height="153" alt="image">
                                <div class="recent-listing-links">
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/Deportes.php" class="recent-jobs">Deportes</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                            <div class="recent-listing-img">
                                <img src="images/20160206_165238.jpg" width="254" height="153" alt="image">
                                <div class="recent-listing-links">
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/Turismo.php" class="recent-jobs">Turismo</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="recent-listing-img">
                                <img src="images/recent-1.jpg" alt="image">
                                <div class="recent-listing-links">
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/Museos.php" class="recent-jobs">Museos</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                            <div class="recent-listing-img">
                                <img src="images/recent-2.jpg" alt="image">
                                <div class="recent-listing-links">
                                    <a href="" class="recent-jobs">Farmacias</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="recent-listing-img">
                                <img src="images/recent-1.jpg" alt="image">
                                <div class="recent-listing-links">
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/Escuelas.php" class="recent-jobs">Escuelas</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                            <div class="recent-listing-img">
                                <img src="images/recent-2.jpg" alt="image">
                                <div class="recent-listing-links">
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/Hoteles.php" class="recent-jobs">Hotel xx</a>
                                    <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/guia23/views/listing/listing.php" class="recent-readmore">Vea Mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
