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

    public function request($adv_cat_id="")
    {
        if($adv_cat_id=="")
        {
            $result = $this->db->where('enabled','1')
                            ->objectBuilder()
                            ->get('advertsings_categories');
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
}