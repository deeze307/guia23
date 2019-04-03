<?php
require_once(dirname(dirname(__FILE__)).'/core/Core.php');

class Profile
{
    public $user_id;

    public $db;
    public $profile;
    public $name;
    public $surname;
    public $email;
    public $avatar;
    public $user;
    public $error;

    public function __construct()
    {
        try
        {
            $core = new Core();
            $this->db = $core->db;

        }
        catch(Exception $ex)
        {
            $this->error = $ex->getMessage();
        }

    }

    public function create($profile_data = "")
    {
        if(isset($profile_data["user_id"]))
        {
            $profile_id = $this->db->insert('profile',$profile_data);
            if($profile_id)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {

        }
    }

    public function isAdmin()
    {
        $this->user->profile;
    }

    public function request($user_id)
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

    public function update($profile_data)
    {
        $this->db->where('user_id',$profile_data["user_id"]);
        if($this->db->update('profile',$profile_data))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete($user_id)
    {

    }

    public function profileExist($user_id)
    {
        try{
            $profile = $this->db->where('user_id',$user_id)
                    ->objectBuilder()->getOne('profile');
            if(count($profile) > 0)
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

    public function createProfile($user_object)
    {
        try{
            $profile = Array(
                "user_id"=>$user_object->user_id,
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

    public function getFullProfile($user_id)
    {
        $profile = $this->db->where("user_id",$user_id)
                            ->objectBuilder()
                            ->getOne("profile");
        return $profile;
    }


}