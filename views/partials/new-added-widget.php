<div class="right-bar bg_white">
    <h4><span>Nuevas Publicidades</span></h4>

    <?php
//    var_dump($new_added);
    foreach($new_added as $new)
    {
        $image = explode(',', $new->commercial_image);
        if ($image[0] != "") {
            $image = $image[0];
        } else {
            $image = '1@.png';
        }

        // Valoraciones
        switch($new->valoraciones)
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

        echo '<div class="places-list">';
            echo '<h5><a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$new->advertsing_id.'&cat_name='.$new->cat_name.'">'.$new->title.'</a></h5>';
            echo '<p>'.$new->address.'</p>';
            echo '<div class="media">';
                echo '<div class="media-left">';
                    echo '<a href="http://'. $_SERVER['SERVER_NAME'] .'/app/controller/AdvertsingsController.php?listing_detail_adv_id='.$new->advertsing_id.'&cat_name='.$new->cat_name.'">';
                        echo '<img class="media-object" width="50" height="50" src="http://'. $_SERVER['SERVER_NAME'] .'/images/'.$image.'">';
                    echo '</a>';
                echo '</div>';
                echo '<div class="media-body">';
                    echo '<h6 class="media-heading"><i class="'.$new->icon.'" aria-hidden="true"></i> '.$new->cat_name.'</h6>';
                    echo '<div class="pull-right">'.$valoracion.'</div>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    ?>
</div>