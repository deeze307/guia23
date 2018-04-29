<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="../../css/master.css">
    <link rel="stylesheet" type="text/css" href="../../css/color-green.css">
    <link rel="shortcut icon" href="../../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- LOADER -->
    <div class="loader">
      <div class="cssload-svg"><img src="../../images/42-3.gif" alt="image">
      </div>
    </div>
    <!--LOADER-->

    <!-- HEADER -->
    <?php include("../../app/controller/Main.php"); ?>
    <?php require "../partials/header.php"; ?>
    <!-- HEADER  -->

    <!-- Packages -->
    <?php
    $plan_features = new Plan();
    $ads = $plan_features->request("all");
    ?>
    <section class="p_t70 p_b70 bg_lightgry">
        <form class="registerd" action="../../app/controller/AdvertsingsController.php" method="post" data-ajax="false">
            <div id="pricePlans">
                <ul id="plans">
                    <?php foreach($ads as $a){ ?>
                        <li class="plan">
                            <ul class="planContainer">
                                <li class="title"><h2 class="bestPlanTitle"><?php echo $a->name; ?></h2></li>
                                <li class="price"><p class="bestPlanPrice">$<?php echo $a->price." - ".$a->duration; if($a->duration >2){echo " Meses";}else{echo " Mes";} ?></p></li>
                                <li>
                                    <ul class="options">
                                        <?php foreach($a->features as $feature)
                                        {
                                            echo '<li><span>'.$feature->key.'</span></li>';
                                        } ?>
                                    </ul>
                                </li>
                                <li><button type="submit" class="button" name="plan" value="<?php echo $a->plan_id ; ?>">Comprar</button></li>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </div>
        </form>
    </section>
    <!-- Packages -->

    <!-- Footer -->
    <?php include "../partials/footer.php"; ?>
    <!-- Footer -->


    <script src="../../js/jquery.2.2.3.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.appear.js"></script>
    <script src="../../js/jquery-countTo.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
    <script src="../../js/jquery.fancybox.min.js"></script>
    <script src="../../js/bootsnav.js"></script>
    <script src="../../js/zelect.js"></script>
    <script src="../../js/dropzone.min.js"></script>
    <script src="../../js/parallax.min.js"></script>
    <script src="../../js/modernizr.custom.26633.js"></script>
    <script src="../../js/jquery.gridrotator.js"></script>
    <script src="../../js/functions.js"></script>
</body>

</html>