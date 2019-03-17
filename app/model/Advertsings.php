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
            $this->db->join("cities c","ad.city_id = c.city_id","LEFT");
            $this->db->join("provinces p","ad.province_id = p.province_id","LEFT");
            $this->db->join("advertsing_commerce acom","acom.id = ad.commerce_id","LEFT");
            $this->db->join("advertsing_commerce_detail acomdet","acom.advertsing_commerce_detail_id = acomdet.advertsing_commerce_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","acomdet.category_id = ac.advertsings_categories_id","LEFT");
//            $this->db->join("profile pr","a.user_id = pr.user_id");
            $adv = $this->db->where("a.advertsing_id",$advertsing_id)
                ->objectBuilder()
                ->getOne('advertsings a','
                                        a.*,
                                        ad.*,
                                        ac.name as category_name,
                                        ac.permission as category_permission,
                                        c.name as city_name,
                                        p.name as province_name,
                                        (SELECT IFNULL( ROUND(AVG(quantity)),0)
                        from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
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

    public function requestAllForCategory($category_id,$category_permisson)
    {
        $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
        $this->db->join("advertsing_commerce acom","ad.commerce_id = acom.id");
        $this->db->join("advertsing_commerce_detail acd","acom.advertsing_commerce_detail_id = acd.advertsing_commerce_detail_id");
        $this->db->join("cities c","acd.city_id = c.city_id");
        $this->db->join("provinces p","acd.province_id = p.province_id");
        $this->db->join("advertsings_categories ac","acd.category_id = ac.advertsings_categories_id");
        if($category_permisson == 1)
        {
            $result = $this->db->where("acd.category_id",$category_id)->where('ad.city_id',$_SESSION['selected_city_id'])
                ->objectBuilder()
                ->get('advertsings a',null,'a.*,p.name as province_name,c.name as city_name,acd.category_id,ac.name as cat_name,ad.title,ad.subtitle,ad.phone,ad.website,ad.latitude,ad.longitude,ad.description,ad.address,ad.commercial_image,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
        }
        else
        {
            $result = $this->db->where("acd.category_id",$category_id)->where('acd.city_id',$_SESSION['selected_city_id'])
                ->objectBuilder()
                ->get('advertsings a',null,'a.*,p.name as province_name,c.name as city_name,acd.category_id,ac.name as cat_name,ad.title,ad.subtitle,acd.phone,acd.website,acd.latitude,acd.longitude,acd.description,acd.address,ad.commercial_image,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
        }

        return $result;
    }

    public function requestAllForAdmin($allReviews = false)
    {
        if(!$allReviews)
        {
            $result = $this->db->objectBuilder()->rawQuery("SELECT a.*,u.username,ad.title,ad.plan_id,ad.category_id
                             FROM advertsings a
                             LEFT JOIN advertsing_detail ad ON a.advertsing_detail_id = ad.advertsing_detail_id
                             LEFT JOIN users u ON a.user_id = u.user_id
                             WHERE a.enabled = 'F'
                             ORDER BY a.advertsing_id DESC");

            foreach($result as $res)
            {
                if($res->category_id == NULL)
                {
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $res->advertsing_detail_id","LEFT");
                    $this->db->join("advertsing_commerce acom","acom.id = ad.commerce_id");
                    $this->db->join("advertsing_commerce_detail acomdet","acomdet.advertsing_commerce_detail_id = acom.advertsing_commerce_detail_id");
                    $this->db->join("advertsings_categories ac","acomdet.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = acomdet.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name");
                }
                else
                {
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $res->advertsing_detail_id","LEFT");
                    $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = ad.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name");
                }

                if(isset($name->name))
                {
                    $res->cat_name = $name->name;
                }
                else
                {
                    $res->cat_name = $name;
                }
            }
        }
        else
        {
            $result = $this->db->objectBuilder()->rawQuery("SELECT a.*,u.username,ad.title,ad.plan_id,ad.category_id
                             FROM advertsings a
                             LEFT JOIN advertsing_detail ad ON a.advertsing_detail_id = ad.advertsing_detail_id
                             LEFT JOIN users u ON a.user_id = u.user_id
                             ORDER BY a.advertsing_id DESC");

            foreach($result as $res)
            {
                if($res->category_id == NULL)
                {
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $res->advertsing_detail_id","LEFT");
                    $this->db->join("advertsing_commerce acom","acom.id = ad.commerce_id");
                    $this->db->join("advertsing_commerce_detail acomdet","acomdet.advertsing_commerce_detail_id = acom.advertsing_commerce_detail_id");
                    $this->db->join("advertsings_categories ac","acomdet.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = acomdet.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name");
                }
                else
                {
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $res->advertsing_detail_id","LEFT");
                    $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = ad.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name");
                }
                if(isset($name->name))
                {
                    $res->cat_name = $name->name;
                }
                else
                {
                    $res->cat_name = $name;
                }

            }
        }

        return $result;
    }

    public function requestLastAdded()
    {
        try{
            $adv = $this->db->objectBuilder()->rawQuery("
            SELECT a.*,ad.*,
            (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
             FROM advertsings a
             LEFT JOIN advertsing_detail ad ON a.advertsing_detail_id = ad.advertsing_detail_id
             where a.enabled = 'T'
             ORDER BY a.advertsing_id DESC LIMIT 6");

            foreach($adv as $a)
            {
                if($a->category_id == NULL)
                {
                    /*
                     * (SELECT IF((SELECT COUNT(*) FROM advertsings_categories WHERE advertsings_categories_id = ad.category_id) > 0 ,
             (
                 SELECT ac.name FROM advertsings
                 LEFT JOIN advertsing_detail ad ON advertsing_detail_id = ad.advertsing_detail_id
                 LEFT JOIN advertsings_categories ac ON ad.category_id = ac.advertsings_categories_id
                 WHERE ac.advertsings_categories_id = ad.category_id LIMIT 1
             ),
             (
                 SELECT ac.name FROM advertsings
                 LEFT JOIN advertsing_detail ad ON advertsing_detail_id = ad.advertsing_detail_id
                 LEFT JOIN advertsings_categories ac ON ad.category_id = ac.advertsings_categories_id
                 LEFT JOIN advertsing_commerce acom ON acom.id = ad.commerce_id
                 LEFT JOIN advertsing_commerce_detail acomdet ON acomdet.advertsing_commerce_detail_id = acom.advertsing_commerce_detail_id
                 WHERE ac.advertsings_categories_id = acomdet.category_id LIMIT 1
             ))) as cat_name,
                     * */
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $a->advertsing_detail_id","LEFT");
                    $this->db->join("advertsing_commerce acom","acom.id = ad.commerce_id");
                    $this->db->join("advertsing_commerce_detail acomdet","acomdet.advertsing_commerce_detail_id = acom.advertsing_commerce_detail_id");
                    $this->db->join("advertsings_categories ac","acomdet.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = acomdet.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name,ac.icon");
                }
                else
                {
                    $this->db->join("advertsing_detail ad","ad.advertsing_detail_id = $a->advertsing_detail_id","LEFT");
                    $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
                    $this->db->where("ac.advertsings_categories_id = ad.category_id");
                    $name = $this->db->objectBuilder()->getOne("advertsings a","ac.name,ac.icon");
                }

                if(isset($name->name))
                {
                    $a->cat_name = $name->name;
                    $a->icon = $name->icon;
                }
                else
                {
                    $a->cat_name = $name;
                    $a->icon = $name;
                }
            }
            return $adv;
//            $this->db->join("advertsing_detail ad","a.advertsing_detail_id = ad.advertsing_detail_id","LEFT");
//            $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id","LEFT");
//            $this->db->where("a.enabled","T")->where('ad.city_id',$_SESSION['selected_city_id']) ;
//            $this->db->orderBy('a.advertsing_id','desc');
//            $adv = $this->db->objectBuilder()->get('advertsings a',6,'a.*,ad.*,ac.*,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
        }catch(Exception $ex){
            return $ex->getMessage();
        }
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