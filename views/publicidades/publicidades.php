<?php
 // Esta vista muestra las categorías ( publicidades o no ) con solo proveer id de provincia, ciudad e id de categoría

require_once("../../app/controller/AdvertsingsController.php");

if (!isset($_SESSION))
{ session_start(); }


$advertsingsController = new AdvertsingsController();
$cat_counter = $advertsingsController->countAdsByCategories();
$new_added = $advertsingsController->getLastAdded();
?>

<!DOCTYPE html>
<html lang="ES">

<head>
    <meta google-site-verification: google1cee8a07c04f871a.html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="../../css/master.css">
    <link rel="stylesheet" type="text/css" href="../../css/color-green.css">
    <link rel="stylesheet" type="text/css" href="../../css/dropzone.css">

    <link rel="shortcut icon" href="../../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?6Ws0LTdyhqiW5dpYbGb4zzdbpCzKQkNz";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</head>
<body>

<?php
if(isset($_SESSION["message"]))
{
    echo "<div class='label-success text-center' style='color:white;'>". $_SESSION['message']."</div>";
    unset($_SESSION["message"]);
}
elseif(isset($_SESSION["error"]))
{
    echo "<div class='label-danger text-center' style='color:white;'>". $_SESSION['error']."</div>";
    unset($_SESSION["error"]);
}

//var_dump($_COOKIE);
//var_dump($_SESSION['ADVS_FOR_CAT']);
?>


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

<!-- Inner Banner -->
<section id="inner-banner-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="inner_banner_2_detail">
                    <h2><?php echo $_COOKIE['CAT_NAME'] ?></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Inner Banner -->

<!-- POPULAR LISTING -->
<?php require "../partials/popular-listing.php" ?>
<!-- POPULAR LISTING -->

<!-- Footer -->
<?php //require_once "../partials/footer.php" ?>
<!-- Footer -->

<script src="../../js/jquery.2.2.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.fancybox.min.js"></script>
<script src="../../js/bootsnav.js"></script>
<script src="../../js/zelect.js"></script>
<script src="../../js/parallax.min.js"></script>
<script src="../../js/modernizr.custom.26633.js"></script>
<script src="../../js/jquery.gridrotator.js"></script>
<script src="../../js/functions.js"></script>
</body>
