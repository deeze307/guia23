<?php

require_once "Core.php";

if(isset($_POST["login"]))
{
    //para login con redes sociales
    if(strpos($_POST["login"],'with_social_') !== false)
    {
        if (!isset($_SESSION) || $_SESSION ='')
        { session_start(); }
        $origin = $_POST["login"];
        $login_social = new LoginSocial($origin);
        $login_social->login();

    }
    else
    {

        if (!isset($_SESSION))
        { session_start(); }
        $users = new Users();
        if($users->error == "")
        {

            header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/home.php");
        }
        else
        {
            $_SESSION["error"] = $users->error;
            header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/views/login/login-registerd.php");
        }
    }

}
elseif(isset($_POST["logout"]))
{
    LoginSocial::logout();
}
else
{
    if(!isset($_SESSION))
    {
        session_start();
    }
    // Si se redirecciona desde un login exitoso de aplicación externa

    if (isset($_SESSION["HA::STORE"]))
    {
        $origin = "with_social_";
        foreach($_SESSION["HA::STORE"] as $key => $ses)
        {
            $splitted[] = explode('.',$key);
            $origin = $origin.$splitted[0][1];
            break;
        }


        $login_social = new LoginSocial($origin);
        $login_social->login();
        header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/home.php");
    }

}

class LoginSocial
{
    private $origin;
    private $origin_id;
    private $first_logon;
    private $username;
    private $name;
    private $lastname;
    private $user_id;
    public function __construct($origin)
    {
        $user_origin = new UserOrigin($origin);
        $this->origin = $user_origin->origin;
        $this->origin_id = $user_origin->origin_id;
    }

    function login()
    {
        try {
            //Se carga el archivo de configuración. No es más que un array con datos de conexión.
            $config_file_path = "../../resources/hybridauth/hybridauth/config.php";
            //Se incluye la librería principal de HybridAuth
            require_once("../../resources/hybridauth/hybridauth/Hybrid/Auth.php");

            $hybridauth = new Hybrid_Auth($config_file_path);

            // Se realiza la autenticación con las credenciales de la aplicación que haya hecho la llamada
            $adapter = $hybridauth->authenticate(ucfirst($this->origin));

            // Obtiene la información del Perfíl de usuario
            $user_profile = $adapter->getUserProfile();

            if($user_profile != "")
            {
                // chequea si es la primera vez que ingresa con ese perfil de red social
                switch($this->origin){
                    case "facebook":
                        $this->facebookLogon($user_profile);
                        break;
                    case "google":
                        $this->googleLogon($user_profile);
                        break;
                    case "twitter":
                        $this->twitterLogon($user_profile);
                        break;
                }

            }
            else
            {
                print_r(" No se pudo recuperar el perfil");
            }
        }
        catch(Exception  $e)
        {
            print_r ($e->getMessage());
        }
    }

    public static function logout()
    {
        if (!isset($_SESSION))
        { session_start(); }
        setcookie(session_name(), '', 100);
        session_unset();
        session_destroy();
        $_SESSION = array();

        header("Location: http://".$_SERVER['SERVER_NAME']."/guia23/home.php");
    }


    private function facebookLogon($user_profile)
    {
        $user_obj = new \stdClass();

        $user_obj->scoped_user_id = $user_profile->identifier;
        $user_obj->username = $user_profile->email;
        $user_obj->email = $user_profile->email;
        $user_obj->name = $user_profile->firstName;
        $user_obj->lastname = $user_profile->lastName;
        $user_obj->origin_id = $this->origin_id;
        $user_obj->avatar = $user_profile->photoURL;

        $users = new Users($user_obj);
        $users->request();


    }

    private function googleLogon($user_profile)
    {
        $user_obj = new \stdClass();

        $user_obj->scoped_user_id = $user_profile->identifier;
        $user_obj->username = $user_profile->email;
        $user_obj->email = $user_profile->email;
        $user_obj->name = $user_profile->firstName;
        $user_obj->lastname = $user_profile->lastName;
        $user_obj->origin_id = $this->origin_id;
        $user_obj->avatar = $user_profile->photoURL;

        $users = new Users($user_obj);
        $users->request();


    }

    private function twitterLogon($user_profile)
    {
        $user_obj = new \stdClass();

        $user_obj->scoped_user_id = $user_profile->identifier;
        $user_obj->username = $user_profile->displayName;
        $user_obj->email = $user_profile->email;
        $user_obj->name = $user_profile->firstName;
        $user_obj->lastname = $user_profile->lastName;
        $user_obj->origin_id = $this->origin_id;
        $user_obj->avatar = $user_profile->photoURL;

        $users = new Users($user_obj);
        $users->request();
    }
}

?>