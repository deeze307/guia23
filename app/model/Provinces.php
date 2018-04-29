<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class Provinces
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($advertsing)
    {

        $data = Array(
            "title"=>$advertsing["title"],
            "subtitle"=>$advertsing["subtitle"],
            "category_id"=>$advertsing["categoria"],
            "province_id"=>$advertsing["provincia"],

        );
        $result_id = $this->db->insert('advertsings',$data);
        if($result_id > 0)
        {

        }
    }

    public function request($province_id="")
    {
        if($province_id == "")
        {
            $result = $this->db->objectBuilder()->get('provinces');
        }
        else
        {
            $result = $this->db->where('province_id',$province_id)->objectBuilder()->get('provinces');
        }

        return $result;
    }


    public function update($province_id)
    {

    }

    public function delete($province_id)
    {

    }
}