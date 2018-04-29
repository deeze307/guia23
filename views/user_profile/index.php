<?php
if (!isset($_SESSION))
{ session_start(); }
require_once("../../app/controller/ProfileController.php");
$profile_controller = new ProfileController();
$profile = $profile_controller->getFullProfile($_SESSION["user_id"]);

    $provinces = $profile_controller->getProvinces();
    $cities = $profile_controller ->getCities();
?>
<!DOCTYPE html>
<html lang="Es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Guia23 | Perfil de Usuario</title>
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
                        <h2>Perfil de Usuario</h2>
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
                <?php include("partial/profile_menu.php"); ?>

                <form class="registerd" action="../../app/controller/ProfileController.php" method="post" data-ajax="false" enctype="multipart/form-data">

                <div class="col-md-9 col-sm-9 col-xs-12">

                    <div class="profile-login-bg">
                        <h2><span><i class="fa fa-user"></i></span> <span>Informacion Personal</span></h2>

                        <div class="row p_b30">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    <input class="form-control" id="name" name="name" value="<?php echo $_SESSION["name"]." ".$_SESSION["lastname"] ?>" type="text" <?php if (isset($_SESSION["HA::STORE"])){echo "disabled"; }?> >
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-3-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input class="form-control" id="email" name="email" value="<?php echo $_SESSION["email"] ?>" type="email" <?php if (isset($_SESSION["HA::STORE"])){echo "disabled"; }?> >
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-3-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="mobile">Movil</label>
                                    <input class="form-control" id="mobile" name="mobile" value="<?php if(isset($profile->cellphone)){echo $profile->cellphone;} ?>" type="number">
                                </div> 
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-3-->
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="phone">Telefono</label>
                                    <input class="form-control" id="phone" name="phone" value="<?php if(isset($profile->phone)){ echo $profile->phone;} ?>" type="number">
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-3-->
                        </div>

                        <h2><span><i class="fa fa-map-marker"></i></span> Direccion</h2>

                        <div class="listing-title-area">
                            <div class="form-group">
                                <label><span>Provincias </span>
                                </label>
                                <div class="single-query form-group">
                                    <div class="intro">
                                        <select name="provincia" class="form-control">
                                            <option class="active" value="0" >Seleccione una Provincia...</option>
                                            <?php

                                            foreach($provinces as $province) {
                                                $selected_province = "";
                                                if($province->province_id == $profile->province_id){
                                                    $selected_province = "selected";
                                                }
                                                echo "<option value='".$province->province_id."' $selected_province>".$province->name."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="listing-title-area">
                            <div class="form-group">
                                <label><span>Ciudad </span>
                                </label>
                                <div class="single-query form-group">
                                    <div class="intro">
                                        <select name="ciudad" class="form-control">
                                            <option class="active" value="0"  >Seleccione una Ciudad...</option>
                                            <?php
                                            foreach($cities as $city) {
                                                $selected_city = "";
                                                if($city->city_id == $profile->city_id){
                                                    $selected_city = "selected";
                                                }
                                                echo "<option value='".$city->city_id."' $selected_city>".$city->name."</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8 col-sm-8">
                                <div class="form-group">
                                    <label for="street">Calle</label>
                                    <input class="form-control" id="street" name="street" value="<?php if(isset($profile->street_name)){echo $profile->street_name;}?>" type="text">
                                </div>
                                <!--/.form-group-->
                            </div>
                            <!--/.col-md-8-->
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="zip">Codigo Postal</label>
                                    <input class="form-control" id="zip" name="zip" value="<?php if(isset($profile->zip_code)){echo $profile->zip_code;}?>" type="text">
                                </div>
                                <!--/.form-group-->
                            </div>
                        </div>
                        <!--/.col-md-3-->
                        <div class="form-group p_b30">
                            <label for="additional-address">Direccion Adicional</label>
                            <input class="form-control" id="additional-address" name="additional-address" type="text" value="<?php if(isset($profile->additional_address)){echo $profile->additional_address;}?>">
                        </div>
                        <!--/.form-group-->

                        <h2><span><i class="fa fa-map-marker"></i></span>  Sobre <span> Mi</span></h2>

                        <div class="form-group">
                            <label for="about-me">Algunas palabras sobre mi</label>
                            <div class="form-group">
                                <textarea class="form-control" id="about-me" rows="3" name="about-me"  required><?php if(isset($profile->about_me)){echo $profile->about_me;} ?></textarea>
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
    <script src="../../js/jquery.appear.js"></script>
    <script src="../../js/jquery-countTo.js"></script>
    <script src="../../js/owl.carousel.min.js"></script>
<!--    <script src="../../js/jquery.fancybox.min.js"></script>-->
    <script src="../../js/bootsnav.js"></script>
<!--    <script src="../../js/zelect.js"></script>-->
    <script src="../../js/dropzone.min.js"></script>
    <script src="../../js/parallax.min.js"></script>
<!--    <script src="../../js/modernizr.custom.26633.js"></script>-->
<!--    <script src="../../js/jquery.gridrotator.js"></script>-->
    <script src="../../js/functions.js"></script>
</body>

</html>