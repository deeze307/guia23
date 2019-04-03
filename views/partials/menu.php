<!-- Start Header Navigation -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"> <i class="fa fa-bars"></i>
    </button>
    <a id="Logo" class="navbar-brand" href="<?php __URL__ ?>"><img src="<?php __URL__ ?>/images/1@.png" class="logo" alt="">
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
<script>
    window.onscroll = function() {
        // growShrinkLogo()
    };

    var Logo = document.getElementById("Logo");
    var endOfDocumentTop = 50;
    var size = 0;

    function growShrinkLogo() {
        var scroll = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;

        if (size == 0 && scroll > endOfDocumentTop) {
            Logo.className = 'navbar-brand smallLogo';
            size = 1;
        } else if(size == 1 && scroll <= endOfDocumentTop){
            Logo.className = 'navbar-brand largeLogo';
            size = 0;
        }
    }
</script>