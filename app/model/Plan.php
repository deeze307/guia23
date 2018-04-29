<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class Plan
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

    public function request($type,$plan_id="")
    {
        $plan = new \stdClass();
        if($type == "all")
        {
            $result = $this->db->objectBuilder()->get('plan');
            if(count($result) > 0)
            {
                $planFeatures = new PlanFeatures();
                $plan = $result;
                foreach($plan as $p)
                {
                    $p->features = $planFeatures->request($p->plan_id,5);
                }
                return $plan;
            }
        }
        else
        {
            $result = $this->db->where('plan_id',$plan_id)->objectBuilder()->getOne('plan');
            if(count($result) > 0)
            {
                $planFeatures = new PlanFeatures();
                $plan = $result;
                $plan->features = $planFeatures->request($result->plan_id);
                return $plan;
            }
        }
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}