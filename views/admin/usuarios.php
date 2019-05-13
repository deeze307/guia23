<?php
if (!isset($_SESSION))
{ session_start(); }

if(!isset($_SESSION['role_id']) || $_SESSION["role_id"] != 1)
{
    header("Location: ".__URL__."");
}

require_once("../../app/controller/AdminController.php");
$admin = new AdminController();
$pendentsCounter = $admin->getPendentReviews();
$pendentsCommerceCounter = $admin->getPendentCommerces();
$users = $admin->getUsers();

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
<?php

include("../../app/controller/Main.php");
require "../partials/header.php";


?>
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
                $_SESSION["admin_menu"] = "users";
                include("admin_menu.php");

            ?>

            <form class="registerd" action="../../app/controller/AdminController.php" method="post" data-ajax="false">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile-login-bg">
                        <h2><span><i class="fa fa-user"></i></span> <span>Administrar Usuarios</span></h2>

                            <div class="box-body table-responsive no-padding">
                                <?php
                                if(count($users) > 0)
                                {
                                    echo '<table class="table table-hover">';
                                    echo '<tr>';
                                    echo '<th>#ID</th>';
                                    echo '<th>Username</th>';
                                    echo '<th>Rol</th>';
                                    echo '<th>Origen</th>';
                                    echo '</tr>';

                                    foreach($users as $user)
                                    {
                                        echo "<tr>";
                                        echo "<td>$user->user_id</td>";
                                        echo "<td>$user->username</td>";
                                        echo "<td>$user->role_description</td>";
                                        echo "<td>$user->origin_name</td>";
                                        if($_SESSION['user_id'] != $user->user_id)
                                        {
                                            if ($user->enabled == "T") {
                                                echo "<td><button class='btn btn-xs btn-warning' onclick='handleUser(" . $user->user_id . ")'>Deshabilitar</button></td>";
                                            }
                                            else
                                            {
                                                echo "<td><button class='btn btn-xs btn-default' onclick='handleUser(" . $user->user_id . ")'>Habilitar</button></td>";
                                            }
                                            echo "<td><button class='btn btn-xs btn-danger' onclick='delete_user(" . $user->user_id . ")'>Eliminar</button></td>";
                                            echo "</tr>";
                                        }
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
<script src="js/admin.js"></script>

<script src="../../js/functions.js"></script>
</body>

</html>