<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class AdvertsingCommerceDetail
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($advertsing_commerce_detail_data)
    {

//        try{
            $result_id = $this->db->insert('advertsing_commerce_detail',$advertsing_commerce_detail_data);
            if($result_id > 0)
            {
                return $result_id;
            }
            else
            {
                return false;
            }
//        }catch(Exception $ex) {
//            return false;
//        }

    }

    public function requestAllForUser($user_id)
    {
        $result = $this->db->where('user_id',$user_id)
                        ->objectBuilder()
                        ->get('advertsings');
        return $result;
    }

    public function requestAllEnabled()
    {
        $result = $this->db->where('enabled','1')
            ->objectBuilder()
            ->get('advertsings');
        return $result;
    }

    public function update($post_data,$adv_detail_id)
    {
        $this->db->where('advertsing_detail_id',$adv_detail_id);
        if ($this->db->update ('advertsing_detail', $post_data))
        {
            $ad = new Advertsings();
            if ($ad->updateTimeFromAdvertsingDetail($adv_detail_id))
            {
                return "exito";
            }
            else
            {
                return "update failed: " . $this->db->getLastError();
            }

        }

        else
        {
            return "update failed: " . $this->db->getLastError();
        }
    }

    public function delete($advertsing_id)
    {

    }

    public function getCommerceDetail($commerce_id)
    {
        try{
            $this->db->join("advertsing_commerce acom","acd.advertsing_commerce_detail_id = acom.advertsing_commerce_detail_id");
            $this->db->join("cities c","acd.city_id = c.city_id");
            $this->db->join("provinces p","acd.province_id= p.province_id");
            $this->db->join("advertsings_categories ac","ac.advertsings_categories_id = acd.category_id");

            return  $this->db->where('acom.id',$commerce_id)
                ->objectBuilder()
                ->getOne('advertsing_commerce_detail acd',null,'acd.*,acd.name as category_name, c.name as city_name,p.name as province_name');

        }catch(Exception $ex){
            return $ex->getMessage();
        }

    }

    public function getCommercesWithDetail($user_id)
    {
        try{

            $this->db->join("cities c","acd.city_id = c.city_id");
            $this->db->join("provinces p","acd.province_id= p.province_id");
            $this->db->join("advertsings_categories ac","ac.advertsings_categories_id = acd.category_id");
            $this->db->join("advertsing_commerce acom","acom.advertsing_commerce_detail_id = acd.advertsing_commerce_detail_id");

            return  $this->db->where('acom.user_id',$user_id)
                ->objectBuilder()
                ->get('advertsing_commerce_detail acd',null,'acom.*,acd.*,ac.name as category_name, c.name as city_name,p.name as province_name');

        }catch(Exception $ex){
            return $ex->getMessage();
        }

    }

    public function getForCategory($cat_id)
    {
        $this->db->where('category_id',$cat_id)->get('advertsing_detail');
        return $this->db->count;
    }
}