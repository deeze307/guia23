<?php

class UserOrigin
{
    public $origin_id;
    public $origin;
    public $created_at;

    protected $db;
    public $error;

    public function __construct($origin="")
    {
        try
        {
            $this->origin = substr($origin,12,strlen($origin));
            $this->db = new MysqliDb(Config::$mysql_host,Config::$mysql_user,Config::$mysql_pass,Config::$mysql_database,Config::$mysql_port,Config::$mysql_charset);
            $this->request();
        }
        catch(Exception $ex)
        {
            $this->error = $ex->getMessage();
        }
    }

    public function request()
    {
        try
        {
            $result = $this->db->where('origin',$this->origin)
                ->objectBuilder()->getOne('user_origin');
            if(count($result) > 0)
            {
                $this->origin_id = $result->origin_id;
            }
            else{
                $this->origin_id = "1";
            }
        }
        catch(Exception $ex)
        {
            $this->error = $ex->getMessage();
        }

    }
}