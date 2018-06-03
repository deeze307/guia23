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

    public function request($advertsing_id)
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $adv = $this->db->where("a.advertsing_id",$advertsing_id)
                        ->objectBuilder()
                        ->getOne('advertsings a',null,'a.*,ad.*');
            return $adv;
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
                        ->get('advertsings a',null,'a.*,ad.title,ad.plan_id,p.duration');
        return $result;
    }

    public function requestAllForCategory($category_id)
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("cities c","ad.city_id = c.city_id");
        $this->db->join("provinces p","ad.province_id = p.province_id");
        $result = $this->db->where("ad.category_id",$category_id)
            ->objectBuilder()
            ->get('advertsings a',null,'a.*,p.name as province_name,c.name as city_name,ad.title,ad.description,ad.geolocation,ad.commercial_image');
        return $result;
    }

    public function requestAllPendentForAdmin()
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("plan p","ad.plan_id = p.plan_id");
        $this->db->join("users u","a.user_id = u.user_id");
        $result = $this->db->where("a.enabled","F")
            ->objectBuilder()
            ->get('advertsings a',null,'a.*,u.username,ad.title,ad.plan_id,p.duration');
        return $result;
    }

    public function requestAllEnabled()
    {
        $result = $this->db->where('enabled','1')
            ->objectBuilder()
            ->get('advertsings');
        return $result;
    }

    public function update()
    {


    }

    public function updateTimeFromAdvertsingDetail($ad_detail_id)
    {
        // Recolecto los datos para guardar en la tabla de detalle de la publicación
        $date_format = strtotime('now');
        $date = date("Y-m-d h:i", $date_format);

        $this->db->where('advertsing_detail_id',$ad_detail_id);
        if($this->db->update('advertsings',['updated_at'=>$date]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function delete($advertsing_id)
    {
        $this->db->where('advertsing_id',$advertsing_id);
        $result = $this->db->delete('advertsings');
        if($result)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function requestLastAdded()
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id","LEFT");
            $this->db->where("a.enabled","T");
            $adv = $this->db->objectBuilder()->get('advertsings a',5,'a.*,ad.*,ac.*');
            return $adv;
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }
}