<?php
if (!isset($_SESSION))
{ session_start(); }

if(!isset($_SESSION['role_id']) || ($_SESSION["role_id"] != 1 && $_SESSION["role_id"] != 2))
{
    header("Location: https://".$_SERVER['SERVER_NAME']."");
}
require_once("../../app/controller/ProfileController.php");
$profile_controller = new ProfileController();
$profile = $profile_controller->getFullProfile($_SESSION["user_id"]);

$provinces = $profile_controller->getProvinces();
$cities = $profile_controller ->getCities();

require_once("../../app/controller/AdminController.php");
$admin = new AdminController();
$pendentsCounter = $admin->getPendentReviews();
$pendentsCommerceCounter = $admin->getPendentCommerces();
?>
<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23 | Panel de Admin</title>
    <link rel="stylesheet" type="text/css" href="../../css/master.css">
    <link rel="stylesheet" type="text/css" href="../../css/color-green.css">
    <link rel="shortcut icon" href="../../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                    <h2>Panel de Administración</h2>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Inner Banner -->
<!-- Profile -->
<section id="profile" class="p_b70 p_t70 bg_lightgry">

    <div class="container">
        <div class="row">

            <!-- Menu de Perfil de usuario -->
            <?php
                $_SESSION["admin_menu"] = "settings";
                include("admin_menu.php");

            ?>

            <form class="registerd" action="../../app/controller/AdminController.php" method="post" data-ajax="false">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile-login-bg">
                        <h2><span><i class="fa fa-gears"></i></span> <span>Settings</span></h2>
                        <h2><span><i class="fa fa-envelope-o"></i></span> Datos de Contacto</h2>
                        <div class="row p_b30">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Telefono</label>
                                    <input class="form-control" id="phone" name="phone" value="<?php echo  $head->phone ?>" type="text">
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-3-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" id="email" name="email" value="<?php echo  $head->mail ?>" type="email" >
                                </div>
                                <!--/.form-group-->
                            </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-large btn-default" name="submit" id="submit">Guardar Cambios</button>
                        </div>
                    </div>

                </div>

        </div>
    </div>

</section>
<!-- Popular Listing -->

<!-- Footer -->
<?php require "../partials/footer.php";?>
<!-- Footer -->

<script src="../../js/jquery.2.2.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/owl.carousel.min.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/zelect.js"></script>
<script src="../../js/functions.js"></script>
</body>

</html>