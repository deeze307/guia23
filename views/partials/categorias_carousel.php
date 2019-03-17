<section id="directory-category" class="p_b70 p_t70">
    <div class="container">
        <div class="row">
            <div class="col-md-12 directory-category-heading">
                <h2><span>Categorias</span></h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div id="directory-category-slider" class="owl-carousel owl-theme">
                    <?php
                        foreach ($cat_counter as $cat)
                        {
                            echo'
                                <div class="item">
                                <div class="directory-category-box text-center '.$cat->class_color.'"> <span><i class="'.$cat->icon.'" aria-hidden="true"></i></span>
                                    <a href="http://'.$_SERVER['SERVER_NAME'].'/app/controller/AdvertsingsController.php?cat='.$cat->name.'">
                                        <h3>'.$cat->name.'</h3>
                                    </a>
                                    <p>'.$cat->count.'</p>
                                </div>
                                </div>
                            ';
                        }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>

</section>
