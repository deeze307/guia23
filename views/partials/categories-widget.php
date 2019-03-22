<div class="right-bar">
    <h4><span>Categorias</span></h4>
    <ul class="right-bar-listing">
        <?php
        foreach($cat_counter as $cat)
        {
            echo '<li>';
            echo '<a href="'.__URL__.'/app/controller/AdvertsingsController.php?cat='.$cat->name.'"><i class="'.$cat->icon.'" aria-hidden="true"></i> '.$cat->name.' <span>('.$cat->count.')</span></a>';
            echo '<li>';
        }
        ?>
    </ul>
</div>