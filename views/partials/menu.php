<!-- Start Header Navigation -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand sticky_logo" href="<?php $_SERVER['DOCUMENT_ROOT']?>/guia23"><img src="<?php $_SERVER['DOCUMENT_ROOT']?>/guia23/images/1@.png" class="logo" alt="">
    </a>
</div>
<!-- End Header Navigation -->



<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        <?php
        $main = new Main();
        $main->getMenuItems();
        ?>
    </ul>
</div>