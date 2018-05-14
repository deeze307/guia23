<div class="right-bar">
    <h4><span>Nuevos Lugares</span></h4>

    <?php
    foreach($new_added as $new)
    {
        echo '<div class="places-list">';
            echo '<h5><a href="listing-details.html">'.$new->title.'</a></h5>';
            echo '<p>'.$new->geolocation.'</p>';
            echo '<div class="media">';
                echo '<div class="media-left">';
                    echo '<a href="#">';
                        echo '<img class="media-object" src="../../images/footer-latest-1.jpg" alt="image">';
                    echo '</a>';
                echo '</div>';
                echo '<div class="media-body">';
                    echo '<h6 class="media-heading"><i class="fa fa-hotel" aria-hidden="true"></i>Hotel</h6>';
                    echo '<img src="../../images/stars.png">';
                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
    ?>
</div>