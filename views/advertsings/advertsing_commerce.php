<?php

require_once("../../app/controller/AdvertsingsCommerceController.php");

if (!isset($_SESSION))
{ session_start(); }

if(isset($_SESSION["add_commerce"]) || isset($_COOKIE['add_commerce']) || isset($_COOKIE["PLAN"]))
{
    unset($_SESSION["add_commerce"]);
    $plan_id = $_COOKIE["PLAN"];
    $commerce = new AdvertsingsCommerceController();
    $counterCommerces = $commerce->getCommercesForUserId($_SESSION['user_id']);
    $plan = $commerce->getOnePlan($plan_id);
    $adv_categories = $commerce->getCategories();
    $provinces = $commerce->getProvinces();
    $cities = $commerce->getCities();
    if(isset($_COOKIE["EDIT"]))
    {
        $adv_data = $commerce->editCommerce($_COOKIE["COMMERCE_ID"]);
        setcookie("EDIT","true",time()-3600,"/");
    }


}
else {
    header("Location: ".__URL__."/home.php");
}
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
    <link rel="stylesheet" type="text/css" href="../../css/dropzone.css">

    <link rel="shortcut icon" href="../../images/short_icon.png">
    <!--[if lt IE 9]>
    <script src="../../js/html5shiv.min.js"></script>
    <script src="../../js/respond.min.js"></script>
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

    <style>

        #map {width: 350px;height: 450px;}
        #floating-panel { position: absolute;bottom: 50px;left: 0%;z-index: 0;background-color: #fff;padding: 0px;border: 1px solid #999;text-align: left;font-family: 'Roboto','sans-serif';line-height: 30px;padding-left: 0px;}
        #coords{ width: 345px;} #address { width: 275px;}
    </style>

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


    if(isset($_SESSION["images"]))
    {
        unset($_SESSION["images"]);
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
    <!-- Baner-->
    <section id="inner-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12" >
                <div class="inner_banner_detail">
                    <h2 align="left"></h2>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                <div class="inner_banner_detail">
                    <p><a href="<?php $_SERVER['DOCUMENT_ROOT']?>/views/Ayuda.php">Página de Ayuda</a>  <i class="fa fa-angle-double-right" aria-hidden="true"></i> </p>
                </div>
            </div>
        </div>
    </div>
    </section>-
    <!-- Banner -->

    <!-- Add New Listings -->
    <section id="add-listing" class="p_b70 p_t70 bg_lightgry">
      <form class="registerd" id="formAdvertsing" action="../../app/controller/AdvertsingsCommerceController.php" method="post" enctype="multipart/form-data">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-bg">

                        <div class="row">
                            <div class="col-md-12 col-sm-23 col-xs-12">
                                <?php
                                if(count($counterCommerces) > 0)
                                {
                                    echo '
                                    <h3 class="p_b40">
                                        Veamos, usted ya posée '.((count($counterCommerces) > 1)?" Comercio" : " Comercios") .' 
                                    </h3>
                                    <h4>
                                        Pero si lo desea, a continuación podremos crear otro.
                                    </h4>
                                    ';
                                }
                                ?>

                                <hr>
                            </div>

                            <div class="col-md-8 col-sm-8 col-xs-12">

                                <div class="listing-title-area">

                                    <div class="form-group">
                                        <label><span>Titulo del Comercio </span>
                                        </label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Ingrse el Titulo de su Comercio." value="<?php if(isset($adv_data->title)){echo $adv_data->title;} ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <input type="text" name="subtitulo" class="form-control" placeholder="Escriba el Subtitulo" value="<?php if(isset($adv_data->subtitle)){echo $adv_data->subtitle;} ?>">
                                    </div>

                                </div>

                                <div class="listing-title-area">

                                    <div class="form-group">
                                        <label><span>Categoria </span>
                                        </label>
                                        <div class="single-query form-group">
                                            <div class="intro">
                                                <select id="categoria" name="categoria" class="form-control" required>
                                                    <option class="active" value="">Seleccione la Categoria...</option>
                                                    <?php
                                                        foreach($adv_categories as $category) {
                                                            if((isset($adv_data)) && ($adv_data->category_id == $category->advertsings_categories_id))
                                                            {
                                                                if(strpos($category->permission, 1) !== false  || strpos($category->permission, 2) !== false )
                                                                {
                                                                    echo "<option value='".$category->advertsings_categories_id."' selected='selected'>".$category->name."  (Admin)</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option value='".$category->advertsings_categories_id."' selected='selected'>".$category->name."</option>";
                                                                }
                                                            }
                                                            else
                                                            {
                                                                if(strpos($category->permission, 1) !== false  || strpos($category->permission, 2) !== false )
                                                                {
                                                                    echo "<option value='".$category->advertsings_categories_id."'>".$category->name."  (Admin)</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option value='".$category->advertsings_categories_id."'>".$category->name."</option>";
                                                                }
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-title-area">
                                    <div class="form-group">
                                        <label><span>Provincias </span>
                                        </label>
                                        <div class="single-query form-group">
                                            <div class="intro">
                                                <select name="provincia" class="form-control" required>
                                                    <option class="active" value="" >Seleccione la Provincia...</option>
                                                    <?php
                                                    foreach($provinces as $province) {
                                                        if((isset($adv_data)) && ($adv_data->province_id == $province->province_id))
                                                        {
                                                            echo "<option value='" . $province->province_id . "' selected='selected'>" . $province->name . "</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='" . $province->province_id . "'>" . $province->name . "</option>";
                                                        }
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
                                                <select name="ciudad" class="form-control" required>
                                                    <option class="active" value=""  >Seleccione la Ciudad...</option>
                                                    <?php
                                                    foreach($cities as $city) {
                                                        if((isset($adv_data)) && ($adv_data->city_id == $city->city_id))
                                                        {
                                                            echo "<option value='".$city->city_id."' selected='selected'>".$city->name."</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='".$city->city_id."'>".$city->name."</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="listing-title-area">
                                    <div class="form-group">
                                        <label> <span>Telefono</span>
                                        </label>
                                        <input type="number" min="0" name="telefono" class="form-control" placeholder="Número de telefono" value="<?php if(isset($adv_data->phone)){echo $adv_data->phone;} ?>" required>
                                    </div>
                                </div>

                                <div class="listing-title-area">
                                    <div class="form-group">
                                        <label><span>Direccion Comercial</span>
                                        </label>
                                        <input type="text" name="direccion" class="form-control" placeholder="Escriba su direccion Comercial..." value="<?php if(isset($adv_data->address)){echo $adv_data->address;} ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label><span>Latitud </span>
                                                </label>
                                                <input type="text" name="latitud" id="latitud" class="form-control" placeholder="-54.792645" value="<?php if(isset($adv_data->latitude)){echo $adv_data->latitude;} ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label> <span>Longitud</span>
                                                </label>
                                                <input type="text" name="longitud" id="longitud" class="form-control" placeholder="-68.231501" value="<?php if(isset($adv_data->longitude)){echo $adv_data->longitude;} ?>">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="sidebar-box">

                                    <h3>Paquete Elegido: <strong><?php echo $plan->name; ?></strong></h3>

                                    <div class="officeaddress">

                                        <div class="addressbox" data-office="free">
                                            <h4>Este paquete incluye</h4>

                                            <ul class="packg-detail">
                                                <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Duración: <?php echo $plan->duration; if($plan->duration >2){echo " Meses";}else{echo " Mes";} ?></li>
                                                <?php foreach($plan->features as $feature){
                                                    echo "<li><i class='fa fa-check-square-o' aria-hidden='true'></i> ".$feature->key."</li>";
                                                }
                                                ?>
                                            </ul>
                                        </div>

                                    </div>

                                </div>

                            </div>
                            
                           
                            <!----Mapa--->

                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div id="finddo-wrapper" >

                                    <div id="map"></div>
                                    <div id="floating-panel">
                                        <input id="address" type="textbox" value="Tierra del Fuego" align="left">
                                        <input id="submit" type="button" value="Buscar">
                                        <input id="coords" type="text" value="1) Escriba la dirección y presione [Buscar]." readonly="readonly">
                                        <input id="coords" type="text" value="2) Para colocar latitud y longitud " readonly="readonly">
                                        <input id="coords" type="text" value="    haga doble click en el marcador."readonly="readonly">

                                    </div>

                                    <!---- Mapa ---->
                                    <script type="application/javascript" src="js/map.js">
                                    </script>


                                    <!-- Carga de la libreria de google maps -->
                                    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjJIxi33Avc9y0wcvky9HUR8Q6VsT_YlY&callback=initMap"></script>
                                    <!---- /Mapa ---->
                            
                        </div>

                    </div>
                </div>
            </div>

           
            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-bg">

                        <div class="row">

                            <div class="col-md-12">

                                <div class="listing-title-area">

                                    <div class="row">

                                        <div class="col-md-8 col-sm-8 col-xs-12">

                                            <div class="form-group">
                                               <label> <span>Horario de Atencion</span><br>
                                                </label>
                                                 <br>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="text" name="dia1" class="form-control" placeholder=" Dia Ej: lunes " value="<?php if(isset($adv_data->first_schedule_attention)){echo $adv_data->first_schedule_attention;} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6 col-sm-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="time" name="hora1_desde" class="form-control" placeholder=" Ej: 09:30" value="<?php if(isset($adv_data->first_schedule_attention_from)){echo $adv_data->first_schedule_attention_from;} ?>" max="23:59" min="00:00" step="1" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="time" name="hora1_hasta" class="form-control" placeholder="Ej:12:30"  value="<?php if(isset($adv_data->first_schedule_attention_to)){echo $adv_data->first_schedule_attention_to;} ?>" max="23:59" min="00:00" step="1">
                                                        </div>
                                                    </div>
												</div>
                                                <div class="col-md-4 col-sm-4 col-xs-12">
                                                    <div class="form-group">
                                                        <input type="text" name="dia2" class="form-control" placeholder=" Dia Ej: Sabado " value="<?php if(isset($adv_data->second_schedule_attention)){echo $adv_data->second_schedule_attention;} ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="col-md-6 col-sm-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="time" name="hora2_desde" class="form-control" placeholder=" Ej: 09:30"  value="<?php if(isset($adv_data->second_schedule_attention)){echo $adv_data->second_schedule_attention_from;} ?>" max="23:59" min="00:00" step="1">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-sm-12">
                                                        <div class="form-group">
                                                            <input type="time" name="hora2_hasta" class="form-control" placeholder="Ej:12:30"  value="<?php if(isset($adv_data->second_schedule_attention)){echo $adv_data->second_schedule_attention_to;} ?>" max="23:59" min="00:00" step="1">
                                                        </div>
                                                    </div>
												</div>

                                        </div>


                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="row">

                                                <div class="col-md-12">
                                                    <label><span>Informacion de redes Sociales </span>
                                                    </label>
                                                </div>

                                                <?php
                                                    if(isset($adv_data))
                                                    {

                                                    }
                                                ?>
                                                <div class="col-md-6 col-sm-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="facebook_url" class="form-control" placeholder="Su URL de Facebook">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="google+_url" class="form-control" placeholder="Su URL de Google Plus">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="instagram_url" class="form-control" placeholder="Su URL de Instagram">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 col-sm-6 col-sm-12">
                                                    <div class="form-group">
                                                        <input type="text" name="twitter_url" class="form-control" placeholder="Su URL de  Twitter">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="linkedin_url" class="form-control" placeholder="Su URL de LinkedIn">
                                                    </div>
                                                    <div class="form-group">
                                                        <input type="text" name="youtube_url" class="form-control" placeholder="Su URL de YouTube">
                                                    </div>
                                                </div>

                                            </div>


                                        </div>


                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label>Descripción <span>*</span>
                                                </label>
                                                <textarea class="form-control" name="description" placeholder="Detalle la descripción de su comercio"><?php if(isset($adv_data->description)){echo $adv_data->description;} ?></textarea>
                                            </div>

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label>Palabras Clave<span>*</span> <small>(Separadas por coma)</small>
                                                </label>
                                                <textarea class="form-control" name="keywords" placeholder="Palabra Clave" ><?php if(isset($adv_data->keywords)){echo $adv_data->keywords;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-bg">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="listing-title-area">
                                    <div class="row">
                                        <div class="col-md-12 <?php if(isset($_COOKIE['EDIT'])) { echo 'hidden';} ?>" >
                                            <div class="form-group">
                                                <label> <span>Imagenes de su comercio</span>
                                                </label><br>
                                                <label> <span><small>- Las imagenes no pueden superar la resolución de 500px x 500px. <br> - Puede subir como máximo 6 imagenes.<br>- Cada imagen no debe ser mayor a 3mb (3072kb).</small></span>
                                                </label>
                                                <div class="file-upload">
                                                    <div id="fileSubmit"  class="dropzone dropzone-previews">
                                                        <input name="file" type="file" multiple>
                                                        <div class="dz-default dz-message"><span>Haga Click para subir las imágenes</span></div>
                                                    </div>
                                                </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><span>Ingrese su email para ser notificado por la aprobación de sus publicidades</span>
                                                </label>
                                                <input type="email" class="form-control" name="email_notify" placeholder="E-Mail" required value="<?php if(isset($adv_data->email_notify)){echo $adv_data->email_notify;} ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p_t40">
                                        <div class="col-md-9 col-md-9 col-sm-12">
                                            <div class="form-group">
                                                <p>Al hacer Click en "<strong>Crear Comercio</strong>" acepta los <a href="<?php $_SERVER["DOCUMENT_ROOT"]; ?>/views/T&Condiciones.php" class="link"><strong>Terminos y Condiciones</strong>.</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">

                                            <div class="form-group">
                                                <input type="hidden" name="commerce_submitted" >
                                                <input type="hidden" name="commerce_images" >
                                                <input type="hidden" name="_plan" value="<?php echo $plan_id; ?>">
                                                <input type="hidden" name="_plan_price" value="<?php echo $plan->price; ?>">
                                                <input type="hidden" name="_plan_duration" value="<?php echo $plan->duration; ?>">
                                                <?php
                                                if(isset($_COOKIE['EDIT']))
                                                {
                                                    unset($_COOKIE['EDIT']);
                                                    echo '<button type="submit" id ="upd_ad" name="upd_ad">Guardar Cambios</button>';
                                                    echo '<input type="hidden" name="_adv_detail_id" value="'.$adv_data->advertsing_commerce_detail_id.'"/>';
                                                }
                                                else
                                                {
                                                    echo '<button type="submit" id ="new_commerce" name="new_commerce">Crear Comercio</button>';
                                                }
                                                ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
     </form>
    </section>
    <!-- Popular Listing -->

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
<script src="js/commerce_advertsing.js"></script>
<script src="../../js/functions.js"></script>

</html>