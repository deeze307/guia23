<?php
if (!isset($_SESSION))
{ session_start(); }

if(!isset($_SESSION['role_id']) || ($_SESSION["role_id"] != 1 && $_SESSION["role_id"] != 2))
{
    header("Location: http://".$_SERVER['SERVER_NAME']."/guia23");
}

require_once("../../app/controller/AdminController.php");
$admin = new AdminController();
$pendentsCounter = $admin->getPendentReviews();
$pendents = $admin->getAllReviews();
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
<!-- Profile -->
<section id="profile" class="p_b70 p_t70 bg_lightgry">

    <div class="container">
        <div class="row">

            <!-- Menu de Perfil de usuario -->
            <?php
                $_SESSION["admin_menu"] = "reviews";
                include("admin_menu.php");

            ?>

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile-login-bg">
                        <h2><span><i class="fa fa-eye"></i></span> <span>Revisiones Pendientes (<?php echo count($pendentsCounter)?>) </span></h2>

                            <div class="box-body table-responsive no-padding">
                                <?php
                                if(count($pendents) > 0)
                                {
//                                    var_dump($pendents);
                                    echo '<table class="table table-hover">';
                                    echo '<tr>';
                                    echo '<th>#ID</th>';
                                    echo '<th>Titulo</th>';
                                    echo '<th>Usuario</th>';
                                    echo '<th>Categoría</th>';
                                    echo '</tr>';

                                    foreach($pendents as $adv)
                                    {
                                        echo "<tr>";
                                        echo "<td>$adv->advertsing_id</td>";
                                        echo "<td>$adv->title</td>";
                                        echo "<td>$adv->username</td>";
                                        echo "<td>$adv->cat_name</td>";
                                        if($adv->enabled == "T")
                                        {
                                            echo "<td><button class='btn btn-xs btn-warning' onclick='handle_advertsing(" . $adv->advertsing_id . ",`F`)'>Deshabilitar</button></td>";
                                        }
                                        else
                                        {
                                            echo "<td><button class='btn btn-xs btn-success' id='toggle' onclick='handle_advertsing(" . $adv->advertsing_id . ",`T`)'>Habilitar</button></td>";
                                        }
                                        echo "<td><button class='btn btn-xs btn-info' onclick='view_advertsing(" . $adv->advertsing_id . ",`" . $adv->cat_name . "`)'><span><i class='fa fa-eye'></i></span></button></td>";
                                        echo "<td><button class='btn btn-xs btn-default' onclick='edit_advertsing(" . $adv->advertsing_id . "," . $adv->plan_id . ")'><span><i class='fa fa-pencil'></button></td>";
                                        echo "<td><button class='btn btn-xs btn-danger' onclick='delete_advertsing(" . $adv->advertsing_id . ")'>Eliminar</button></td>";
                                        echo "</tr>";
                                    }
                                    echo '</table>';
                                }
                                ?>
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
<script src="js/admin.js"></script>

</body>

</html>