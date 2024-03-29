<div class="right-bar bg_white">
    <h4><span>Nuevas Publicidades</span></h4>

    <?php
//    var_dump($new_added);
    foreach($new_added as $new)
    {
        $image = explode(',', $new->commercial_image);
        if ($image[0] != "") {
            $image = $image[0];
            
            $image_name = explode('/',$image);
            if(count($image_name) > 1)
            {
                $image_name_without_dir = explode('.',$image_name[2]);
            }
            else{ $image_name_without_dir[0] = "";}
            $image_name_without_ext = $image_name_without_dir[0];
        } else {
            $image = '1@.png';
            $image_name_without_ext = '1@';
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
                                <span class="fa fa-star-o"/>';
                break;
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
            echo '<h5><a href="'. __URL__ .'/views/listing-details.php?listing_detail_adv_id='.$new->advertsing_id.'&cat_name='.$new->cat_name.'">'.$new->title.'</a></h5>';
            echo '<p>'.$new->address.'</p>';
            echo '<div class="media">';
                echo '<div class="media-left">';
                    echo '<a href="'. __URL__ .'/views/listing-details.php?listing_detail_adv_id='.$new->advertsing_id.'&cat_name='.$new->cat_name.'">';
                        echo '<img class="media-object" title="'.$new->title.'" src="'. __URL__ .'/images/'.$image.'" alt="'.$image_name_without_ext.'" width="50" height="50" >';
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