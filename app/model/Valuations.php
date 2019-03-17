<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class Valuations
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($post,$adv_id)
    {

        $data = Array(
            "name"=>$post["form-review-name"],
            "email"=>$post["form-review-email"],
            "quantity"=>$post["score_value"],
            "message"=>$post["form-review-message"],
            "advertsing_id"=>$adv_id
        );
        try{
            $result_id = $this->db->insert('valuations',$data);
            if($result_id > 0)
            {
                return $result_id;
            }
            else
            {
                return "Error";
            }
        }catch (Exception $ex){
            return $ex->getMessage();
        }

    }

    public function request($advertsing_id)
    {
        try{
            $result = $this->db->where("advertsing_id",$advertsing_id)
                        ->objectBuilder()
                        ->get('valuations');
            return $result;

        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }


    public function update($province_id)
    {

    }

    public function delete($province_id)
    {

    }
}