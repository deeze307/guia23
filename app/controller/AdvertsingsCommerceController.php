<?php
require_once(dirname(dirname(__FILE__)).'/core/Core.php');
if (!isset($_SESSION))
{ session_start(); }
require("UploadFile.php");

if(isset($_GET['commerce_id']))
{
    $commerceController = new AdvertsingsCommerceController();
    return $commerceController->toggleCommerce($_GET['commerce_id'],$_GET['toggle']);
}


if(isset($_POST['commerce_submitted']))
{
    $adv = new AdvertsingsCommerceController();
    if(isset($_POST['new_commerce']))
    {
        if(isset($_SESSION["images"]))
        {
            $files = $_SESSION["images"];
        }
        else
        {
            $files = "vacio";
        }
        $adv->createCommerce($_POST,$files);
    }
    else
    {
        $post = $_POST;
        $adv->updateCommerce($post);
    }
}

if(isset($_POST['edit']))
{
    unset($_POST['edit']);
    $adv = new AdvertsingsCommerceController();
    return $adv->editAdvertsing($_POST['commerce_id']);

}

if(isset($_POST['commerce_id']))
{
    $adv = new AdvertsingsCommerceController();
    return $adv->delete($_POST['commerce_id']);

}

if(isset($_POST['plan']))
{
    setcookie("PLAN",$_POST['plan'],time() + 3600,"/");
    $_SESSION['add_commerce'] = true;
    header("Location: https://".$_SERVER['SERVER_NAME']."/views/advertsings/advertsing_commerce.php");
}

class AdvertsingsCommerceController
{

    public $plan;
    public function __construct()
    {

    }

    public function getAdvCatId($adv_cat_name)
    {
        $adv_cat = new AdvertsingsCategories();
        $result = $adv_cat->getAdvCatId($adv_cat_name);
        return $result;
    }

    public function getCommercesForUserId($user_id)
    {
        $commerce = new AdvertsingCommerce();
        return $commerce->getCommerceFromUserId($user_id);
    }

    public function getCommerceFromUserIdWithDetail($user_id)
    {
        $commerce = new AdvertsingCommerce();
        return $commerce->getCommerceFromUserIdWithDetail($user_id);
    }

    public function getCommerceDetail($commerce_id)
    {
        $commerce = new AdvertsingCommerce();
        return $commerce->getCommerceWithDetail($commerce_id);
    }



    public function getCategories($adv_cat_id="")
    {
        $adv_categories = new AdvertsingsCategories();
        return $adv_categories->request(false,$adv_cat_id="");
    }

    public function getCategoryName($cat_id)
    {
        $adv_categories = new AdvertsingsCategories();
        return $adv_categories->request(false,$cat_id);
    }

    public function getOnePlan($plan_id)
    {
        $plan = new Plan();
        return $plan->request("",$plan_id);
    }


    public function createCommerce($post,$files)
    {
        try{
            if (!isset($_SESSION))
            { session_start(); }
            $user_id = $_SESSION["user_id"];

            $arr=[
                "modelo"=>"modelo",
                "lote" => "lote"
            ];

            $_SESSION["datos"] = $arr;

            $datos = $_SESSION["datos"];

            if(isset($_SESSION["modelo"]))
            {
                unset($_SESSION["modelo"]);
            }


            $advertsing_commerce_detail = new AdvertsingCommerceDetail();

            // Recolecto los datos para guardar en la tabla de detalle de la publicación
            $date_format = strtotime('now');
            $date = date("Y-m-d h:i", $date_format);

            $data_for_ads_detail = Array(
                "commerce_name"=>$post["titulo"],
                "commerce_subtitle"=>$post["subtitulo"],
                "category_id"=>$post["categoria"],
                "province_id"=>$post["provincia"],
                "city_id"=>$post["ciudad"],
                "phone"=>$post["telefono"],
                "address"=>$post["direccion"],
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
                "commercial_image"=>$files,
            );
            // inserto en tabla de detalle de publicación y recupero id de inserción
            $ads_commerce_detail_id = $advertsing_commerce_detail->create($data_for_ads_detail);
            if($ads_commerce_detail_id > 0)
            {
                //recopilo datos para insertar en tabla de publicación
                $data_for_ads = Array(
                    "user_id"=>$user_id,
                    "advertsing_commerce_detail_id"=>$ads_commerce_detail_id,
                    "created_at"=>$date,
                );

                //inserto en tabla de publicación
                $ads = new AdvertsingCommerce();
                $ads_id = $ads->create($data_for_ads);

                if($ads_id)
                {
                    $_SESSION["message"] = "Comercio creado Exitosamente.";
                    $mail = new Mailer();

                    $mail_obj = new \stdClass();
                    $mail_obj->to_address = $post["email_notify"];
                    $mail_obj->from_address = "info@guia23.com.ar";
                    $mail_obj->subject = "Comercio Creado Exitosamente (#".$ads_id.")";
                    $mail_obj->ammount_to_pay = $post["_plan_price"];
                    $mail_obj->ads_id = $ads_id;
                    $mail_obj->titulo = $post["titulo"];
                    $mail_obj->duration = $post["_plan_duration"];
                    $mail_obj->mail_type = "comercio";
                    $sended = $mail->send($mail_obj);
                    if($sended != 'exito')
                    {
                        $_SESSION["message"] = $_SESSION["message"]." | ".$sended;
                    }

                }
                else
                {
                    $_SESSION["error"] = "Ocurrió un error al intentar crear El Comercio[".$ads_id."].";
                }
            }
            else
            {
                $_SESSION["error"] = "Ocurrió un error al intentar crear El Comercio[0][".$ads_commerce_detail_id."].";
            }

            // Redirecciono a pagina de publicaciones con mensaje exitoso o de error
            Logger::write("debug","[".date('d-m-Y h:i:s')."] ".$_SESSION['images']);
            unset($_SESSION['images']);
            unset($_SESSION['commerce_images']);
            header("Location: https://".$_SERVER['SERVER_NAME']."/views/advertsings/require_advertsing.php");
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }


    }

    public function deleteCommerce($id)
    {
        $adv = new Advertsings();
        $result = $adv->delete($id);
        if($result == "exito")
        {
            $_SESSION['message'] = "Comercio eliminado exitosamente. (".$id.")";
            Logger::write('commerce_'.date('d-m-Y'),"Comercio (".$id.") eliminado || ".date('d-m-Y H:i:s'));
            return "exito";
        }
        else
        {
            $_SESSION['error'] = "Ocurrió un error al intentar eliminar el comercio. (".$id.")";
            Logger::write('commerce_'.date('d-m-Y'),"Comercio (".$id.") No se pudo eliminar || ".date('d-m-Y H:i:s'));
            return "error";
        }

    }

    public function editCommerce($id)
    {
        $adv = new AdvertsingCommerce();
        $response = $adv->request($id);
        if($response)
        {
            return $response;
        }
        else
        {
            return 'error';
        }

    }

    public function toggleCommerce($commerce_id,$toggle)
    {
        $adv = new AdvertsingsCommerce();
        $result = $adv->toggleCommerce($commerce_id,$toggle);
            if($result == "exito")
            {
                $_SESSION['message'] = "Estado de Comercio Actualizado!";
            }
            else
            {
                $_SESSION['error'] = "Ocurrió un error al intentar actualizar el estado del Comercio.";
            }
        return $result;
    }

    public function updateCommerce($post)
    {
        try{
            $data = Array(
                'title'=>$post['titulo'],
                'subtitle'=>$post['subtitulo'],
                'category_id'=>$post['categoria'],
                'province_id'=>$post['provincia'],
                'city_id'=>$post['ciudad'],
                'phone'=>$post['telefono'],
                'price'=>$post['precio'],
                'address'=>$post['direccion'],
                'latitude'=>$post['latitud'],
                'longitude'=>$post['longitud'],
                'first_schedule_attention'=>$post['dia1'],
                'second_schedule_attention'=>$post['dia2'],
                'first_schedule_attention_from'=>$post['hora1_desde'],
                'first_schedule_attention_to'=>$post['hora1_hasta'],
                'second_schedule_attention_from'=> $post['hora2_desde'],
                'second_schedule_attention_to'=> $post['hora2_hasta'],
                'description'=> $post['description'],
                'keywords'=>$post['keywords'],
                'plan_id'=>$post['_plan'],
                'email_notify'=>$post['email_notify'],
                'social_networks'=>'facebook_url='.$post["facebook_url"].',google+_url='.$post["google+_url"].',instagram_url='.$post["instagram_url"].',twitter_url='.$post["twitter_url"].',linkedin_url='.$post["linkedin_url"].',youtube_url='.$post["youtube_url"]
            );
            $ad = new AdvertsingDetail();
            $upd = $ad->update($data,$post['_adv_detail_id']);
            if( $upd == "exito")
            {
                $_SESSION['message'] = "Comercio Editado Exitosamente!";
            }
            else
            {
                $_SESSION['error'] = "Ocurrió un error al intentar editar el comercio. (".$upd.")";
                Logger::write('commerce_'.date('d-m-Y'),"Comercio ".$post['titulo']." No se pudo editar || ".date('d-m-Y H:i:s'));
            }
            header("Location: https://".$_SERVER['SERVER_NAME']."/views/advertsings/require_advertsing_response.php");
        }
        catch(Exception $ex)
        {
            Logger::write('commerce_error_'.date('d-m-Y'),"Comercio ".$post['titulo']." No se pudo editar || ".date('d-m-Y H:i:s')." | Error: ".$ex->getMessage());
        }

    }

    // Provinces & Cities//
    public function getProvinces()
    {
        $provinces = new Provinces();
        return $provinces->request();
    }

    public function getCities($showAll = true)
    {
        $cities = new Cities();
        return $cities->request("",$showAll);
    }
    ///////////////

    public function getLastAdded()
    {
        $ads = new Advertsings();
        return $ads->requestLastAdded();
    }


}