<?php
if (!isset($_SESSION))
{ session_start(); }

?>


<!DOCTYPE html>
<html lang="ES">

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

<section id="listing-details" class="p_b70 p_t70">
    <div class="container">

        <div class="row">
            <div class="col-md-12">

                <div class="details-heading heading">
                    <h2 class="text-center"><a href="#"> <span> ¿Qué desea hacer? </span></a></h2>
                    <div class="details-heading-address2">
                        <ul class="text-center">
                            <li><a href="../../home.php"><i class="fa fa-home" aria-hidden="true"> </i>Volver al Inicio</a> </li>
                            <li><a href="../advertsings/advertsing_question.php"><i class="fa fa-desktop" aria-hidden="true"></i> Seguir Publicando</a> </li>
                        </ul>
                    </div>
                </div>

            </div>

        </div>

    </div>
</section>

    <!-- Footer -->
    <?php require_once "../partials/footer.php"?>
    <!-- Footer -->


</body>

<script src="../../js/jquery.2.2.3.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/jquery.appear.js"></script>
<script src="../../js/jquery-countTo.js"></script>
<script src="../../js/bootsnav.js"></script>
<script src="../../js/dropzone.js"></script>
<script src="../../js/functions.js"></script>

</html>