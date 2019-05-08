<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class AdvertsingsCounter
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function index($advertsing_id)
    {
        $ad = self::request($advertsing_id);
        if(count($ad) == 0){
            $id = self::create($advertsing_id);
//            var_dump('('.$advertsing_id.') creando...id: '.$id);
        }
        else
        {
            self::update($ad->advertsings_id,$ad->counter);
        }
    }

    public function create($advertsing_id)
    {
        $data = Array(
            'advertsings_id' => $advertsing_id,
            'counter' => 1
        );
        try{
            $result_id = $this->db->insert('advertsings_counter',$data);
            if($result_id)
            {
                return $result_id;
            }
            else
            {
                return false;
            }
        }catch(Exception $ex){
            return $ex->getMessage();
        }
    }

    public function request($advertsing_id)
    {
        try{
            $adv = $this->db->where("advertsings_id",$advertsing_id)
                        ->objectBuilder()
                        ->getOne('advertsings_counter');
            return $adv;
        }catch(Exception $ex){
            return false;
        }
    }

    public function update($advertsing_id,$counter)
    {
        $counter = $counter + 1;
        $this->db->where('advertsings_id',$advertsing_id);
        if($this->db->update('advertsings_counter',['counter'=>$counter]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function mostVisited()
    {
        try {
            // Primero listo todas las publicaciones con mayor cantidad de visitas
            // Logger::write("debug","[".date('d-m-Y h:i:s')."] Contador de visitas");
            $this->db->join("advertsings a", "aco.advertsings_id = a.advertsing_id", "LEFT");
            $this->db->join("advertsing_detail ad", "a.advertsing_detail_id = ad.advertsing_detail_id", "LEFT");
            $this->db->orderBy('aco.counter','DESC');
            $adv_counter = $this->db->objectBuilder()->get('advertsings_counter aco',50,'aco.*,a.*,ad.*');
            
            $most_visited = array();
            foreach($adv_counter as $adv)
            {
                $visit = [];
                // Busco información de las publicaciones de los comercios
                if($adv->category_id == NULL)
                {
                    // $this->db->join("advertsings_")
                    $visit = $this->db->objectBuilder()->rawQueryOne(
                        "select a.advertsing_id,
                                a.enabled,
                                ac.name as category_name,
                                c.name as city_name,
                                p.name as province_name,
                                ad.title,
                                ad.subtitle,
                                ad.description,
                                ad.commercial_image,
                                aco.counter,
                                (SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
                        from advertsings a
                        left join advertsings_counter aco on a.advertsing_id = aco.advertsings_id
                        left join advertsing_detail ad on a.advertsing_detail_id = ad.advertsing_detail_id
                        left join advertsing_commerce acom on ad.commerce_id = acom.id
                        left join advertsing_commerce_detail acomdet on acom.advertsing_commerce_detail_id = acomdet.advertsing_commerce_detail_id
                        left join advertsings_categories ac on acomdet.category_id = ac.advertsings_categories_id
                        left join cities c on acomdet.city_id = c.city_id
                        left join provinces p on acomdet.province_id = p.province_id
                        where a.advertsing_id  = ".$adv->advertsing_id."
                        and a.enabled = 'T'
                        and acomdet.city_id = ".$_SESSION['selected_city_id']."
                        and acomdet.province_id = ".$_SESSION['selected_province_id']."
                        limit 1"
                    );
                    
                }
                // Si no son comercios, son publicaciones de la página
                else
                {
                    $visit = $this->db->objectBuilder()->rawQueryOne(
                        "select a.advertsing_id,a.enabled,ac.name as category_name,c.name as city_name,p.name as province_name,ad.*,aco.counter,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones
                        from advertsings a
                        left join advertsings_counter aco on a.advertsing_id = aco.advertsings_id
                        left join advertsing_detail ad on a.advertsing_detail_id = ad.advertsing_detail_id
                        left join advertsings_categories ac on ad.category_id = ac.advertsings_categories_id
                        left join cities c on ad.city_id = c.city_id
                        left join provinces p on ad.province_id = p.province_id
                        where a.advertsing_id  = ".$adv->advertsing_id."
                        and a.enabled = 'T'
                        and ad.city_id = ".$_SESSION['selected_city_id']."
                        and ad.province_id = ".$_SESSION['selected_province_id']."
                        limit 1"
                    );
                }
                if($visit && (count($most_visited)) < 9)
                {
                    array_push($most_visited,$visit);
                }
            }
            return $most_visited;
            
        } catch (Exception $ex){
            Logger::write("error","[".date('d-m-Y h:i:s')."] ".$ex->getMessage());
            return $ex->getMessage();
        }
    }
}