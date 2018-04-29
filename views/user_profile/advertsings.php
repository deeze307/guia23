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

<div class="container">
        <div class="row">
            <!-- Menu de Perfil de usuario -->
            <?php include("partial/profile_menu.php"); ?>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <div class="text-center">

                            <h3 class="box-title">Publicidades de <?php echo $_SESSION["name"] ?></h3>
                        </div>

                        <div class="box-tools pull-right">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
<!--                    --><?php //var_dump($advertsings);?>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <?php
                        if(count($advertsings->advertsings) > 0)
                        {
                            echo '<table class="table table-hover">';
                            echo '<tr>';
                                echo '<th>#ID</th>';
                                echo '<th>Titulo</th>';
                                echo '<th>Habilitado</th>';
                                echo '<th>Habilitado Hasta</th>';
                            echo '</tr>';

                            foreach($advertsings->advertsings as $adv)
                            {
                                echo "<tr>";
                                    echo "<td>$adv->advertsing_id</td>";
                                    echo "<td>$adv->title</td>";
                                    if($adv->enabled == "T") {
                                        echo "<td><span class='label label-success'>SI</span></td>";
                                    }
                                    else{
                                        echo "<td><span class='label label-danger'>NO</span></td>";
                                    }
                                    echo "<td>$adv->enabled_until</td>";
                                    echo "<td><button class='btn btn-xs btn-info'>Editar</button></td>";
                                echo "</tr>";
                            }
                            echo '</table>';
                        }
                        ?>


                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
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
