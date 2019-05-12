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
            $this->db->join("advertsing_commerce acom","ad.commerce_id = acom.id","LEFT");
            $this->db->join("advertsing_commerce_detail acomdet","acom.advertsing_commerce_detail_id = acomdet.advertsing_commerce_detail_id","LEFT");
            $this->db->join("advertsings_categories ac","acomdet.category_id = ac.advertsings_categories_id","LEFT");
            $this->db->where('a.enabled','T')->where('a.user_id',$user_id);
            $points = $this->db->objectBuilder()
                ->get('advertsings a',null,'a.advertsing_id,
                                            a.advertsing_detail_id,
                                            a.enabled,ad.*,
                                            acomdet.*,
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
        $this->db->join("advertsing_commerce acom","ad.commerce_id = acom.id","LEFT");
        $this->db->join("advertsing_commerce_detail acd","acom.advertsing_commerce_detail_id = acd.advertsing_commerce_detail_id","LEFT");
        $this->db->join("cities c","acd.city_id = c.city_id","LEFT");
        $this->db->join("provinces p","acd.province_id = p.province_id","LEFT");
        $this->db->join("advertsings_categories ac","acd.category_id = ac.advertsings_categories_id","LEFT");
        if($category_permisson == 1)
        {
            $result = $this->db->where("acd.category_id",$category_id)->where('ad.province_id',$_SESSION['selected_province_id'])->where('ad.province_id',NULL, 'IS NOT')
                ->objectBuilder()
                ->get('advertsings a',null,'a.*,p.name as province_name,c.name as city_name,acd.category_id,ac.name as cat_name,ad.title,ad.subtitle,ad.phone,ad.website,ad.latitude,ad.longitude,ad.description,ad.address,ad.commercial_image,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
        }
        else
        {
            $result = $this->db->where("acd.category_id",$category_id)->where('acd.province_id',$_SESSION['selected_province_id'])->where('ad.province_id',NULL, 'IS')
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
            $last = $this->db->objectBuilder()->rawQuery("
            SELECT a.*,ad.*,
            (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
            FROM advertsings a
            LEFT JOIN advertsing_detail ad ON a.advertsing_detail_id = ad.advertsing_detail_id
            where a.enabled = 'T'
            ORDER BY a.advertsing_id DESC LIMIT 6");

            $last_added = array();

            foreach($last as $adv)
            {
                $visit = [];
                // Busco información de las publicaciones de los comercios
                if($adv->category_id == NULL)
                {
                    // $this->db->join("advertsings_")
                    $visit = $this->db->objectBuilder()->rawQueryOne(
                        "select a.advertsing_id,
                                a.enabled,
                                ac.name as cat_name,
                                ac.icon,
                                c.name as city_name,
                                p.name as province_name,
                                ad.title,
                                ad.subtitle,
                                ad.description,
                                ad.commercial_image,
                                acomdet.address,
                                (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
                        from advertsings a
                        left join advertsing_detail ad on a.advertsing_detail_id = ad.advertsing_detail_id
                        left join advertsing_commerce acom on ad.commerce_id = acom.id
                        left join advertsing_commerce_detail acomdet on acom.advertsing_commerce_detail_id = acomdet.advertsing_commerce_detail_id
                        left join advertsings_categories ac on acomdet.category_id = ac.advertsings_categories_id
                        left join cities c on acomdet.city_id = c.city_id
                        left join provinces p on acomdet.province_id = p.province_id
                        where a.advertsing_id  = ".$adv->advertsing_id."
                        and a.enabled = 'T'
                        and acomdet.province_id = ".$_SESSION['selected_province_id']."
                        limit 1"
                    );
                    
                }
                // Si no son comercios, son publicaciones de la página
                else
                {
                    $visit = $this->db->objectBuilder()->rawQueryOne(
                        "select a.advertsing_id,
                                a.enabled,
                                ac.name as cat_name,
                                ac.icon,
                                c.name as city_name,
                                p.name as province_name,
                                ad.*,
                                (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
                        from advertsings a
                        left join advertsing_detail ad on a.advertsing_detail_id = ad.advertsing_detail_id
                        left join advertsings_categories ac on ad.category_id = ac.advertsings_categories_id
                        left join cities c on ad.city_id = c.city_id
                        left join provinces p on ad.province_id = p.province_id
                        where a.advertsing_id  = ".$adv->advertsing_id."
                        and a.enabled = 'T'
                        and ad.province_id = ".$_SESSION['selected_province_id']."
                        limit 1"
                    );
                }
                if($visit && (count($last_added)) < 9)
                {
                    array_push($last_added,$visit);
                }
            }

            return $last_added;
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