<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class AdvertsingsCategories
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create()
    {

    }

    public function request($for_widget=false,$adv_cat_id="")
    {
        if($adv_cat_id=="")
        {
            $this->db->where('enabled','1');
            if(isset($_SESSION["role_id"]))
            {
                if($_SESSION["role_id"] == 3 )
                {
                    if(!$for_widget)
                    {
                        $this->db->where('permission',NULL,'IS');
                    }
                }
            }
            else
            {
                if(!$for_widget)
                {
                    $this->db->where('permission',NULL,'IS');
                }
            }
            $result = $this->db->objectBuilder()->get('advertsings_categories');
        }
        else
        {
            $result = $this->db->where('enabled','1')
                                ->where('advertsings_categories_id',$adv_cat_id)
                                ->objectBuilder()
                                ->getOne('advertsings_categories');
        }
        return $result;
    }

    public function update()
    {

    }

    public function delete()
    {

    }

    public function countAds()
    {
        $categories = self::request(true,"");
        $adDetails = new AdvertsingDetail();
        $arr = Array();
        foreach($categories as $cat)
        {
            $cat->count = $adDetails->getForCategory($cat->advertsings_categories_id);
            array_push($arr,$cat);
        }
        return $arr;
    }

    public function getAdvCatId($adv_cat)
    {
        $result = $this->db->where('name',$adv_cat)
                            ->objectBuilder()
                            ->getOne('advertsings_categories','advertsings_categories_id');
        return $result->advertsings_categories_id;
    }

    public function getAdvCat($adv_cat)
    {
        $result = $this->db->where('name',$adv_cat)
            ->objectBuilder()
            ->getOne('advertsings_categories','advertsings_categories_id,permission');
        return $result;
    }

    public function getAdvCatWithId($adv_cat_id)
    {
        $result = $this->db->where('advertsings_categories_id',$adv_cat_id)
            ->objectBuilder()
            ->getOne('advertsings_categories');
        return $result;
    }

    public function countCategories()
    {
        $this->db->where('enabled','1')->get('advertsings_categories');
        return $this->db->count;
    }
}