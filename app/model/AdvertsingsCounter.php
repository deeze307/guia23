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
            var_dump('('.$advertsing_id.') creando...id: '.$id);
        }
        else
        {
            self::update($ad->advertsings_id,$ad->counter);
//            var_dump('('.$advertsing_id.') actualizando...id: '.$ad->advertsings_id);
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
            $this->db->join("advertsing_detail ad", "a.advertsing_detail_id = ad.advertsing_detail_id", "LEFT");
            $this->db->join("advertsings_categories ac", "ad.category_id = ac.advertsings_categories_id", "LEFT");
            $this->db->join("advertsings_counter aco", "a.advertsing_id = aco.advertsings_id", "LEFT");
            $this->db->join("cities c", "ad.city_id = c.city_id", "LEFT");
            $this->db->join("provinces p", "ad.province_id = p.province_id", "LEFT");
            $valuations = $this->db->subQuery();
            $valuations->where('advertsing_id','a.advertsing_id');
            $valuations->getOne('valuations','quantity');
            $this->db->where('a.enabled', 'T')->where('aco.counter', 'null', '!=');
            $this->db->orderBy('aco.counter','DESC');
            $most_visited = $this->db->objectBuilder()->get('advertsings a', 9, 'a.advertsing_id,a.enabled,ac.name as category_name,c.name as city_name,p.name as province_name,ad.*,aco.counter,(SELECT IFNULL( ROUND(AVG(quantity)),0) from valuations where advertsing_id = a.advertsing_id limit 1) as valoraciones');
            return $most_visited;
        } catch (Exception $ex){
            return $ex->getMessage();
        }
    }
}