<?php
require_once(dirname(dirname(__FILE__)).'/core/Core.php');

class Users
{
    public $create;
    public $user_id;
    public $username;
    public $password;
    public $origin_id;
    public $scoped_user_id;

    public $db;
    public $profile;
    public $name;
    public $surname;
    public $email;
    public $avatar;
    public $user;
    public $error;

    public function __construct(\stdClass $user_obj = null)
    {
        try
        {
            $core = new Core();
            $this->db = $core->db;
            if(isset($_POST['login']) && (($_POST['login'] == 'login') || ($_POST['login'] == 'create')))
            {

                $this->username = $_POST['username'];
                $this->password = $_POST['password'];
                $this->user = new \stdClass();
                if($_POST["login"] == "login")
                {
                    $this->request();
                }
                else
                {
                    if (!empty($this->username))
                    {
                        $this->name = $_POST["name"];
                        $this->lastname = $_POST["lastname"];
                        $this->email = $_POST["email"];
                        $this->create();
                    }
                }
            }
            elseif(isset($user_obj) && $user_obj->scoped_user_id!="")
            {
                $this->scoped_user_id = $user_obj->scoped_user_id;
                $this->email = $user_obj->email;
                $this->origin_id = $user_obj->origin_id;
                $this->username = $user_obj->username;
                $this->name = $user_obj->name;
                $this->lastname = $user_obj->lastname;
                $this->avatar = $user_obj->avatar;
            }
        }
        catch(Exception $ex)
        {
            $this->error = $ex->getMessage();
        }

    }

    public function create()
    {
        if($this->scoped_user_id == "")
        {
            if($this->chkAvailableUserName($this->username))
            {
                $user = Array(
                    "username"=>$this->username,
                    "password"=>$this->password,
                    "role_id"=>3,
                    "origin"=>1
                );
                $user_id = $this->db->insert('users',$user);

                if($user_id)
                {
                    $this->user_id = $user_id;
                    if($this->createProfile($this->user_id))
                    {
                        $this->request();
                    }
                    else
                    {
                        $this->error ="Ocurrió un error al intentar crear el Perfil de Usuario";
                    }
                }
            }
            else
            {
                $this->error =  "El usuario '".$this->username."' ya se encuentra en uso.";
            }
        }
        else
        {
            $user = Array(
                "username"=>$this->username,
                "password"=>"",
                "role_id"=>3,
                "origin"=>$this->origin_id,
                "scoped_user_id"=>$this->scoped_user_id
            );

            $user_id = $this->db->insert('users',$user);
            if($user_id)
            {
                $this->user_id = $user_id;
                if($this->createProfile($this->user_id))
                {
                    $this->request();
                }
                else
                {
                    $this->error ="Ocurrió un error al intentar crear el Perfil de Usuario";
                }
            }
            else
            {
                $this->error ="Ocurrió un error al intentar crear el usuario";
            }
        }
    }

    public function isAdmin()
    {
        $this->user->profile;
    }

    public function requestAll()
    {
        $this->db->join("roles r","u.role_id = r.role_id");
        $this->db->join("user_origin uo","u.origin = uo.origin_id");
        return $this->db->objectBuilder()->get('users u',null,"u.*,r.description as role_description,uo.origin as origin_name");
    }

    public function request()
    {
        if($this->scoped_user_id == "")// si el usuario que intenta loguearse no es externo
        {
            $result = $this->db->where('username',$this->username)
                ->where('password',$this->password)
                ->objectBuilder()->getOne('users');
        }
        else
        {

            $result = $this->db->where('scoped_user_id',$this->scoped_user_id)
                ->where("username",$this->username)
                ->objectBuilder()->getOne('users');
        }
        if(count($result) > 0)
        {
            if (!isset($_SESSION))
            { session_start(); }
            $this->user->user = $result;
            $this->joinProfile();

            unset($_SESSION["error"]);//Elimino cualquier error que pueda seguir apareciendo.

            // Si el usuario tiene perfil.
            if(isset($this->user->profile->name))
            {
                $_SESSION["username"] = $this->username;
                $_SESSION["name"] = $this->user->profile->name;
                $_SESSION["lastname"] = $this->user->profile->lastname;
                $_SESSION["avatar"] = $this->user->profile->avatar;
                $_SESSION["email"] = $this->user->profile->email;
            }
            else
            {
                if($this->scoped_user_id == "")
                {
                    $this->error = "No se encontró Perfil de Usuario";
                    $_SESSION["username"] = $this->username;
                    $_SESSION["name"] = "N/A";
                    $_SESSION["lastname"] = "N/A";
                    $_SESSION["avatar"] = "N/A";
                    $_SESSION["email"] = "N/A";
                }
            }
            $_SESSION["user_id"] = $this->user->user->user_id;
            $_SESSION["role_id"] = $this->user->user->role_id;

            // Actualiza el último inicio de sesion

            self::updLastLoginUsr($result);
        }
        else
        {
            if($this->scoped_user_id == "")
            {
                $this->error = "Usuario o Contraseña incorrectos";
            }
            else
            {
                $this->create();
            }

        }

    }

    public function update()
    {


    }

    private function updLastLoginUsr($user)
    {
        $fecha = new DateTime();


        $this->db->where('user_id',$user->user_id);
        $this->db->update('users',['last_login_user' => $this->db->now()]);
    }

    public function delete($user_id)
    {

    }

    private function createProfile($user_id)
    {
        try{
            $profile = Array(
                "user_id"=>$user_id,
                "name"=>$this->name,
                "lastname"=>$this->lastname,
                "email"=>$this->email
            );
            $profile_id = $this->db->insert('profile',$profile);
            if($profile_id)
            {
                return true;
            }
            else
            {
                return false;
            }
        }catch(Exception $ex){
            return false;
        }

    }
    private function chkAvailableUserName($username)
    {
        $result = $this->db->where('username',$username)
            ->get('users');
        if(count($result) > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }

    private function joinProfile()
    {
        if($this->scoped_user_id=="")
        {
            $this->db->join("users u","p.user_id = u.user_id","LEFT");
            $this->db->where("u.user_id",$this->user->user->user_id);
            $profile = $this->db->objectBuilder()->getOne("profile p",null,"p.*");
            if(count($profile) > 0)
            {
                $this->user->profile = $profile;
            }
        }
        else
        {
            $profile = new \stdClass();
            $profile->user_id = $this->user_id;
            $profile->name = $this->name;
            $profile->lastname = $this->lastname;
            $profile->email = $this->username;
            $profile->avatar = $this->avatar;

            $this->user->profile = $profile;
        }
    }
}