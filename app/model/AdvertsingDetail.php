<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class AdvertsingDetail
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($advertsing_detail_data)
    {

//        try{
            $result_id = $this->db->insert('advertsing_detail',$advertsing_detail_data);
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

    public function update($advertsing_id)
    {

    }

    public function delete($advertsing_id)
    {

    }
}