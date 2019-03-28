<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class Carousel
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    public function create($carousel)
    {

        $data = Array(
            "path"=>$carousel["file"],
            "link"=>$carousel["link"],
            "link_type"=>$carousel["link_type"],
            "description"=>$carousel["description"],

        );
        $result_id = $this->db->insert('carousel',$data);
        if($result_id > 0)
        {

        }
    }

    public function request($showAll=false)
    {
        if($showAll)
        {
            $result = $this->db->objectBuilder()->get('carousel');
        }
        else
        {
            $result = $this->db->where('enabled',1)->objectBuilder()->get('carousel');
        }

        return $result;
    }


    public function update($carousel_id)
    {

    }

    public function destroy($carousel_id)
    {

    }
}