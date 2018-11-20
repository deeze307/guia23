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

    public function requestWithDetail($advertsing_id)
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $this->db->join("cities c","ad.city_id = c.city_id");
            $this->db->join("provinces p","ad.province_id = p.province_id");
            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
//            $this->db->join("profile pr","a.user_id = pr.user_id");
            $adv = $this->db->where("a.advertsing_id",$advertsing_id)
                ->objectBuilder()
                ->getOne('advertsings a','a.*,ad.*,ac.name as category_name,c.name as city_name, p.name as province_name,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
            return $adv;
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function requestAllForUser($user_id)
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id","LEFT");
            $this->db->where('a.enabled','T')->where('a.user_id',$user_id);
            $points = $this->db->objectBuilder()
                ->get('advertsings a',null,'a.advertsing_id,
                                                                        a.advertsing_detail_id,
                                                                        a.enabled,ad.*,
                                                                        ac.name as category_name,
                                                                        (SELECT IFNULL(counter,0) from advertsings_counter where advertsings_id = a.advertsing_id) as visitas,
                                                                        (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
            return $points;
        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function requestAllForCategory($category_id)
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("cities c","ad.city_id = c.city_id");
        $this->db->join("provinces p","ad.province_id = p.province_id");
        $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
        $result = $this->db->where("ad.category_id",$category_id)->where('ad.city_id',$_SESSION['selected_city_id'])
            ->objectBuilder()
            ->get('advertsings a',null,'a.*,p.name as province_name,c.name as city_name,ad.category_id,ac.name as cat_name,ad.title,ad.subtitle,ad.phone,ad.website,ad.latitude,ad.longitude,ad.description,ad.address,ad.commercial_image,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
        return $result;
    }

    public function requestAllForAdmin($allReviews = false)
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("plan p","ad.plan_id = p.plan_id");
        $this->db->join("users u","a.user_id = u.user_id");
        $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
        if(!$allReviews)
        {
            $result = $this->db->where("a.enabled","F")
                ->orderBy('a.advertsing_id','DESC')
                ->objectBuilder()
                ->get('advertsings a',null,'a.*,u.username,ad.title,ad.plan_id,ac.name as cat_name,p.duration');
        }
        else
        {
            $result = $this->db
                ->orderBy('a.advertsing_id','DESC')
                ->objectBuilder()
                ->get('advertsings a',null,'a.*,u.username,ad.title,ad.plan_id,ac.name as cat_name,p.duration');
        }

        return $result;
    }

    public function requestAllEnabled()
    {
        $result = $this->db->where('enabled','1')
            ->objectBuilder()
            ->get('advertsings');
        return $result;
    }

    public function toggleEnableAdvertsing($adv_id,$toggle)
    {
        try
        {
            $this->db->where('advertsing_id',$adv_id);
            $update = $this->db->update('advertsings',['enabled'=>$toggle]);
            if($update)
            {
                return 'exito';
            }
            else
            {
                return $this->db->getLastError();
            }
        }
        catch(Exception $ex)
        {return $ex->getMessage();}


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
        try{
            $this->db->where('advertsing_id',$advertsing_id);
            $result = $this->db->delete('advertsings');
            if($result)
            {
                return "exito";
            }
            else
            {
                return $this->db->getLastError();
            }
        }catch(Exception $ex){
            return $ex->getMessage();
        }

    }

    public function requestLastAdded()
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id","LEFT");
            $this->db->where("a.enabled","T")->where('ad.city_id',$_SESSION['selected_city_id']) ;
            $this->db->orderBy('a.advertsing_id','desc');
            $adv = $this->db->objectBuilder()->get('advertsings a',6,'a.*,ad.*,ac.*,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
            return $adv;
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function countAllEnabled()
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->where('a.enabled','T')->where('ad.city_id',$_SESSION['selected_city_id'])->get('advertsings a',null,'a.*');
        return $this->db->count;
    }

    public function requestPointsOfInterest()
    {
        try{
            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id","LEFT");
            $this->db->where('a.enabled','T')->where('ac.permission','1')->where('ad.city_id',$_SESSION['selected_city_id']);
            $points = $this->db->objectBuilder()
                ->get('advertsings a',null,'a.advertsing_id,
                                                                        a.advertsing_detail_id,
                                                                        a.enabled,ad.*,
                                                                        ac.name as category_name,
                                                                        (SELECT IFNULL(counter,0) from advertsings_counter where advertsings_id = a.advertsing_id) as visitas,
                                                                        (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
            return $points;
        }
        catch(Exception $ex){
            return $ex->getMessage();
        }
    }
}