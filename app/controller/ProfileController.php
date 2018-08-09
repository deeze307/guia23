<?php
require_once dirname(dirname(__FILE__))."/core/Core.php" ;

if (!isset($_SESSION))
{ session_start(); }

if(isset($_POST["submit"]))
{
    if(isset($_SESSION["user_id"]))
    {
        $profile = new ProfileController();
        $profile->updateProfile($_SESSION,$_POST);
    }
    else
    {
        $_SESSION["error"] = "No se localizó Perfil de Usuario";
    }
    header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/views/user_profile/home.php");
}


class ProfileController
{


    public function getAdvertsingsForUser($user_id)
    {
        $advertsings = new Advertsings();
        $user_ads = new \stdClass();
        $user_ads->advertsings = $advertsings->requestAllForUser($user_id);
        $user_ads->actives = 0;
        $user_ads->pendents= 0;
        foreach($user_ads->advertsings as $ad)
        {
            if($ad->enabled == "T")
            {
                $user_ads->actives ++;
            }
            else
            {
                $user_ads->pendents ++;
            }
        }

        return $user_ads;
    }

    public function getFullProfile($user_id)
    {
        $profile = new Profile();
        $pro = $profile->getFullProfile($user_id);
        return $pro;
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

    public function updateProfile($session,$post)
    {
        $profile_data = Array(
            "user_id"=>$session["user_id"],
            "name"=>$session["name"],
            "lastname"=>$session["lastname"],
            "email"=>$session["email"],
            "avatar"=>$session["avatar"],
            "plan"=>1,
            "phone"=>$post["phone"],
            "cellphone"=>$post["mobile"],
            "province_id"=>$post["provincia"],
            "city_id"=>$post["ciudad"],
            "street_name"=>$post["street"],
            "zip_code"=>$post["zip"],
            "additional_address"=>$post["additional-address"],
            "about_me" =>$post["about-me"]
        );
        // Chequeo si existe el perfil de usuario ( puede ser que el perfil sea externo )
        $profile = new Profile();

        if ($profile->profileExist($session["user_id"]))
        {
            $result = $profile->update($profile_data);
            if($result)
            {
                $_SESSION["message"] = "Perfil de Usuario actualizado exitosamente!";
            }
            else
            {
                $_SESSION["error"] = "Ocurrió un error al intentar actualizar el Perfil de Usuario";
            }
        }
        else
        {
            $this->createProfile($profile_data);
        }
    }

    private function createProfile($profile_data)
    {
        $profile = new Profile();
        $result = $profile->create($profile_data);
        if($result)
        {
            $_SESSION["message"] = "Perfil de Usuario actualizado exitosamente!";
        }
        else
        {
            $_SESSION["error"] = "Ocurrió un error al intentar actualizar el Perfil de Usuario";
        }
    }

    private function chkUsrProfile($user_id)
    {

    }
}