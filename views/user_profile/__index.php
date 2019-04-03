<!DOCTYPE html>
<?php
require_once("../../app/controller/ProfileController.php");

if (!isset($_SESSION))
{ session_start(); }

$user_id = $_SESSION["user_id"];

$profile = new ProfileController();
$advertsings = $profile->getAdvertsingsForUser($user_id);
$ads_counter = count($advertsings->advertsings);

?>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23</title>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
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

    <div class="container-fluid">
        <div class="col-lg-12 text-center">
            <h2>Panel de Usuario</h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12">

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <!-- Counter Section -->
                    <?php require "contador.php"?>
                    <!-- Counter Section -->
                </div>

                <div class="col-lg-9 col-md-3 col-sm-12 item">
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="directory-category-box text-center resturent"> <span><i class="fa fa-edit" aria-hidden="true"></i></span>
                            <a href="profile.php">
                                <h3>Datos de Perfil</h3>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="directory-category-box text-center dating"> <span><i class="fa fa-edit" aria-hidden="true"></i></span>
                            <a href="advertsings.php">
                                <h3>Publicidades</h3>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <?php require "../partials/footer.php"?>
    <!-- Footer -->

    <!-- Popups -->

    <!-- Popups -->

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

</html>