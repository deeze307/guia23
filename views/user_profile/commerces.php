<!DOCTYPE html>
<?php

if (!isset($_SESSION))
{ session_start(); }

$user_id = $_SESSION["user_id"];

require_once("../../app/controller/AdvertsingsCommerceController.php");


$commerce = new AdvertsingsCommerceController();
$comercios = $commerce->getCommerceFromUserIdWithDetail($user_id);

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

<div class="container">
        <div class="row">
            <!-- Menu de Perfil de usuario -->
            <?php include("partial/profile_menu.php"); ?>
            <div class="col-lg-9 col-md-9 col-sm-12">
                <div class="box">
                    <div class="box-header">
                        <div class="text-center">

                            <h3 class="box-title">Comercios de <?php echo $_SESSION["name"] ?></h3>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <?php
                    if(count($comercios) > 0)
                    {
                        echo '<div class="box-body table-responsive no-padding">';

                            echo '<table class="table table-hover">';
                            echo '<tr>';
                                echo '<th>#ID</th>';
                                echo '<th>Nombre</th>';
                                echo '<th>Ciudad</th>';
                                echo '<th>Categoría</th>';
                                echo '<th>Habilitado</th>';
                            echo '</tr>';



                            foreach($comercios as $comercio)
                            {
                                echo "<tr>";
                                    echo "<td>$comercio->id</td>";
                                    echo "<td>$comercio->commerce_name</td>";
                                    echo "<td>$comercio->city_name</td>";
                                    echo "<td>$comercio->category_name</td>";

                                    if($comercio->enabled == "T") {
                                            echo "<td><span class='label label-success'>SI</span></td>";
                                        }
                                        else{
                                            echo "<td><span class='label label-danger'>NO</span></td>";
                                        }
                                        echo "<td><button class='btn btn-xs btn-info' onclick='edit_commerce(" . $comercio->id . ",". $comercio->plan_id .")'>Editar</button></td>";
                                        echo "<td><button class='btn btn-xs btn-danger' onclick='delete_commerce(" . $comercio->id . ")'>Eliminar</button></td>";
                                echo "</tr>";
                            }
                            echo '</table>';
                        echo '</div>';
                    }
                    else
                    {
                        echo '
                            <hr>
                            <h4 class="title text-center">Usted no posée ningún Comercio a su Nombre.</h4>
                        ';
                    }
                    ?>



                </div>
                <!-- /.box -->
            </div>
        </div>

    </div>

<!-- Footer -->
<?php require "../partials/footer.php"?>
<!-- Footer -->

<script src="../../js/jquery.2.2.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/functions.js"></script>
<script src="js/commerces.js"></script>

</body>

</html>
