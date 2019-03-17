<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class PlanFeatures
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

    public function request($plan_id,$limit="")
    {
        if($limit=="")
        {
            $result = $this->db->where('available_on','%'.$plan_id.'%','LIKE')->objectBuilder()->get('plan_features');
        }
        else
        {
            $result = $this->db->where('available_on','%'.$plan_id.'%','LIKE')->objectBuilder()->get('plan_features',$limit);
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