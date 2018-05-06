<?php
require_once("../../app/controller/AdvertsingsController.php");

if (!isset($_SESSION))
{ session_start(); }

if(isset($_COOKIE["PLAN"]))
{
    $plan_id = $_COOKIE["PLAN"];
    $adv = new AdvertsingsController();
    $plan = $adv->getOnePlan($plan_id);
    $adv_categories = $adv->getCategories();
    $provinces = $adv->getProvinces();
    $cities = $adv->getCities();
    if(isset($_COOKIE["EDIT"]))
    {
        $adv_data = $adv->editAdvertsing($_COOKIE["ADV_ID"]);
    }
}
else {
    header("Location: http://".$_SERVER['SERVER_NAME']."/guia23");
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


    <!-- Add New Listings -->
    <section id="add-listing" class="p_b70 p_t70 bg_lightgry">
      <form class="registerd" id="formAdvertsing" action="../../app/controller/AdvertsingsController.php" method="post" enctype="multipart/form-data">
        <div class="container">
<!--            --><?php
//                if(isset($adv_data))
//                {
//                    var_dump($adv_data);
//                }
//            ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="add-listing-bg">

                        <div class="row">

                            <div class="col-md-8 col-sm-8 col-xs-12">

                                <div class="listing-title-area">

                                    <div class="form-group">
                                        <label><span>Titulo de la Publicidad </span>
                                        </label>
                                        <input type="text" name="titulo" class="form-control" placeholder="Ingrse el Titulo de su publicidad para que se vea en todo el mundo." value="<?php if(isset($adv_data->title)){echo $adv_data->title;} ?>" required>
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
                                                <select name="categoria" class="form-control" required>
                                                    <option class="active" value="">Seleccione la Categoria...</option>
                                                    <?php
                                                        foreach($adv_categories as $category) {
                                                            if((isset($adv_data)) && ($adv_data->category_id == $category->advertsings_categories_id))
                                                            {
                                                                echo "<option value='".$category->advertsings_categories_id."' selected='selected'>".$category->name."</option>";
                                                            }
                                                            else
                                                            {
                                                                echo "<option value='".$category->advertsings_categories_id."'>".$category->name."</option>";
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
                                        <input type="number" name="telefono" class="form-control" placeholder="Número de telefono" value="<?php if(isset($adv_data->phone)){echo $adv_data->phone;} ?>" required>
                                    </div>
                                </div>

                                <div class="listing-title-area">

                                    <div class="form-group">
                                        <label> <span>Sitio Web</span>
                                        </label>
                                        <input type="text" name="web" class="form-control" placeholder="http://" value="<?php if(isset($adv_data->website)){echo $adv_data->website;} ?>">
                                    </div>

                                </div>

                                <div class="listing-title-area">
                                    <div class="form-group">
                                        <label><span>Direccion Comercial</span>
                                        </label>
                                        <input type="text" name="direccion" class="form-control" placeholder="Escriba su direccion Comercial..." value="<?php if(isset($adv_data->geolocation)){echo $adv_data->geolocation;} ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label><span>Latitud </span>
                                                </label>
                                                <input type="number" name="latitud" class="form-control" placeholder="-54.792645" value="<?php if(isset($adv_data->latitude)){echo $adv_data->latitude;} ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <label> <span>Longitud</span>
                                                </label>
                                                <input type="number" name="longitud" class="form-control" placeholder="-68.231501" value="<?php if(isset($adv_data->longitude)){echo $adv_data->longitude;} ?>">
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
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label> <span>imagenes de su comercio</span>
                                                </label>
                                                <div class="file-upload">
                                                    <div id="fileSubmit"  class="dropzone dropzone-previews">
                                                        <input name="file" type="file" multiple>
                                                        <div class="dz-default dz-message"><span>Haga Click para subir las imágenes</span></div>
                                                    </div>
<!--                                                    <form action="../../app/controller/UploadFile.php" >-->
<!--                                                        <div class="dz-message needsclick">-->
<!--                                                            <strong>Drop files here or click to upload.</strong><br />-->
<!--                                                            <span class="note needsclick">(This is just a demo. The selected files are <strong>not</strong> actually uploaded.)</span>-->
<!--                                                        </div>-->
<!--                                                    </form>-->
                                                </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><span>Ingrese su email para ser notificado por la aprobación de su publicidad</span>
                                                </label>
                                                <input type="email" class="form-control" name="email_notify" placeholder="E-Mail" required value="<?php if(isset($adv_data->email_notify)){echo $adv_data->email_notify;} ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row p_t40">
                                        <div class="col-md-9 col-md-9 col-sm-12">
                                            <div class="form-group">
                                                <p>Al hacer Click en "Enviar y Pagar" acepta los <a href="#" class="link">Terminos y Condiciones.</a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-12">

                                            <div class="form-group">
                                                <input type="hidden" name="_plan" value="<?php echo $plan_id; ?>">
                                                <input type="hidden" name="_plan_price" value="<?php echo $plan->price; ?>">
                                                <input type="hidden" name="_plan_duration" value="<?php echo $plan->duration; ?>">
                                                <input type="hidden" name="_submitted" >
                                                <?php
                                                if(isset($_COOKIE['EDIT']))
                                                {
                                                    unset($_COOKIE['EDIT']);
                                                    echo '<button type="submit" id ="upd_ad" name="upd_ad">Guardar Cambios</button>';
                                                    echo '<input type="hidden" name="_adv_detail_id" value="'.$adv_data->advertsing_detail_id.'">';
                                                }
                                                else
                                                {
                                                    echo '<button type="submit" id ="new_ads" name="new_ads">Enviar y Pagar</button>';
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
<script src="js/require_advertsing.js"></script>
<script src="../../js/functions.js"></script>

</html>