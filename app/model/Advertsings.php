<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class Advertsings
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($advertsing_data)
    {
//        $advertsing_data["created_at"] = $this->db->now();
        try{
            $result_id = $this->db->insert('advertsings',$advertsing_data);
            if($result_id)
            {
                return $result_id;
            }
            else
            {
                return false;
            }
        }catch(Exception $ex){
            return false;
        }
    }

    public function requestAllForUser($user_id)
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("plan p","ad.plan_id = p.plan_id");
        $result = $this->db->where("a.user_id",$user_id)
                        ->objectBuilder()
                        ->get('advertsings a',null,'a.*,ad.title,p.duration');
        return $result;
    }

    public function requestAllEnabled()
    {
        $result = $this->db->where('enabled','1')
            ->objectBuilder()
            ->get('advertsings');
        return $result;
    }

    public function update($advertsing_id)
    {

    }

    public function delete($advertsing_id)
    {

    }
}