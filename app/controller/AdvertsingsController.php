<?php
require_once(dirname(dirname(__FILE__)).'/core/Core.php');
if (!isset($_SESSION))
{ session_start(); }
require("UploadFile.php");

if(isset($_POST['plan']))
{
    setcookie("PLAN",$_POST['plan'],time() + 3600,"/");
    header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/views/advertsings/require_advertsing.php");
}
elseif(isset($_POST['_submitted']))
{
    $adv = new AdvertsingsController();

    if(isset($_COOKIE["images"]))
    {
        $files = $_COOKIE["images"];
    }
    else
    {
        $files = "vacio";
    }
    $adv->createAdvertsing($_POST,$files);

}

class AdvertsingsController
{

    public $plan;
    public function __construct()
    {

    }

    public function getAllPlans()
    {
        $plan = new Plan();
        return $plan->request("all");
    }

    public function getOnePlan($plan_id)
    {
        $plan = new Plan();
        return $plan->request("",$plan_id);
    }

    public function getCategories($adv_cat_id="")
    {
        $adv_categories = new AdvertsingsCategories();
        return $adv_categories->request($adv_cat_id="");
    }

    public function getAdvertsings($user_id="")
    {
        $advertsings = new Advertsings();
        if($user_id=="")
        {
            return $advertsings->requestAllEnabled();
        }
        else
        {
            return $advertsings->requestAllForUser($user_id);
        }
    }

    public function createAdvertsing($post,$files)
    {
        if (!isset($_SESSION))
        { session_start(); }
        $user_id = $_SESSION["user_id"];

        $advertsing_detail = new AdvertsingDetail();

        // Recolecto los datos para guardar en la tabla de detalle de la publicación
        $date_format = strtotime('now');
        $date = date("Y-m-d h:i", $date_format);

        $data_for_ads_detail = Array(
            "title"=>$post["titulo"],
            "subtitle"=>$post["subtitulo"],
            "category_id"=>$post["categoria"],
            "province_id"=>$post["provincia"],
            "city_id"=>$post["ciudad"],
            "phone"=>$post["telefono"],
            "website"=>$post["web"],
            "latitude"=>$post["latitud"],
            "longitude"=>$post["longitud"],
            "first_schedule_attention"=>$post["dia1"],
            "second_schedule_attention"=>$post["dia2"],
            "first_schedule_attention_from"=>$post["hora1_desde"],
            "first_schedule_attention_to"=>$post["hora1_hasta"],
            "second_schedule_attention_from"=>$post["hora2_desde"],
            "second_schedule_attention_to"=>$post["hora2_hasta"],
            "description"=>$post["description"],
            "plan_id"=>$post["_plan"],
            "social_networks"=>'facebook_url='.$post["facebook_url"].',google+_url='.$post["google+_url"].',instagram_url='.$post["instagram_url"].',twitter_url='.$post["twitter_url"].',linkedin_url='.$post["linkedin_url"].',youtube_url='.$post["youtube_url"],
            "keywords"=>$post["keywords"],
            "commercial_image"=>"",
            "files"=>$files,
        );
        print_r($data_for_ads_detail);
//        // inserto en tabla de detalle de publicación y recupero id de inserción
//        $ads_detail_id = $advertsing_detail->create($data_for_ads_detail);
//        if($ads_detail_id > 0)
//        {
//            //recopilo datos para insertar en tabla de publicación
//            $data_for_ads = Array(
//                "user_id"=>$user_id,
//                "advertsing_detail_id"=>$ads_detail_id,
//                "created_at"=>$date,
//            );
//
//            //inserto en tabla de publicación
//            $ads = new Advertsings();
//            $ads_id = $ads->create($data_for_ads);
//
//            if($ads_id)
//            {
//                $_SESSION["message"] = "Publicidad creada Exitosamente.";
//                $mail = new Mailer();
//
//                $mail_obj = new \stdClass();
//                $mail_obj->to_address = $post["email_notify"];
//                $mail_obj->from_address = "deeze.designs@gmail.com";
//                $mail_obj->subject = "Publicidad Creada Exitosamente (#".$ads_id.")";
//                $mail_obj->ammount_to_pay = $post["_plan_price"];
//                $mail_obj->ads_id = $ads_id;
//                $mail_obj->titulo = $post["titulo"];
//                $mail_obj->duration = $post["_plan_duration"];
//                $sended = $mail->send($mail_obj);
//                if($sended != 'exito')
//                {
//                    $_SESSION["message"] = $_SESSION["message"]." | ".$sended;
//                }
//
//            }
//            else
//            {
//                $_SESSION["error"] = "Ocurrió un error al intentar crear la Publicidad[".$ads_id."].";
//            }
//        }
//        else
//        {
//            $_SESSION["error"] = "Ocurrió un error al intentar crear la Publicidad[0][".$ads_detail_id."].";
//        }
//
//        // Redirecciono a pagina de publicaciones con mensaje exitoso o de error
//        header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/views/advertsings/require_advertsing.php");
    }

    // Provinces & Cities//
    public function getProvinces()
    {
        $provinces = new Provinces();
        return $provinces->request();
    }

    public function getCities()
    {
        $cities = new Cities();
        return $cities->request();
    }
    ///////////////


}