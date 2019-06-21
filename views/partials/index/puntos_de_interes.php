<?php //var_dump($points_of_interest); ?>

<section id="post-visited-places">

    <div class="container over-hide">

        <div class="row">
            <div class="col-md-12 heading text-center">
                <h2><span>Puntos de Interés</span></h2>
                <p>Lugares que no pueden dejar de Visitar</p>
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
                            <figure class="effect-ming"> <img title="'.$point->title.'"  src="'. __URL__.'/images/'.$image.'" alt="'.$point->category_name.', '.$point->title.', Lugares y Paisajes de la Patagonia Argentina">
                                <figcaption>
                                    <ul>
                                        <li><a href="'. __URL__.'/views/listing/listing.php?cat_id='.$point->category_id.'"><i class="fa fa-sign-in" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </figcaption>
                            </figure>
                        </div>

                        <div class="popular-listing-detail">
                            <h3><a href="'. __URL__ .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$point->advertsing_id.'&cat_name='.$point->category_name.'">'.$point->title.'</a></h3>
                            <span>Categoría: <a href="#">Puntos de Interés</a></span>
                            <p><i class="fa fa-map-marker" aria-hidden="true"></i> '.$point->address.'</p>
                        </div>

                        <ul class="place-listing-add">
                        
                            <li>('.$point->visitas.' Visitas) </li>
                            <li>'.$valoracion.'
                            </li>
                           <div class="fb-like" data-href="https://guia23.com.ar" data-width="" data-layout="button_count" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </ul>

                    </div>
                </div>
';
                }
                ?>

            </div>
        </div>
    </div>

<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-md-12 text-center discover">-->
<!--                <h2>Descubra las Empresas Provinciales</h2>-->
<!--                <a href="--><?php //$_SERVER['DOCUMENT_ROOT']?><!--/views/Index-tdf.php">Ir</a>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->

</section>
