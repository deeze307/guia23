<?php

require_once dirname(dirname(__FILE__))."/core/Core.php" ;

class AdvertsingCommerce
{
    private $db;

    public function __construct()
    {
        $core = new Core();
        $this->db = $core->db;
    }

    /**
     * Se crea el comercio en base a un array de datos del comercio.
     * @param $commerce_data
     * @return bool
     */
    public function create($commerce_data)
    {
        try{
            $result_id = $this->db->insert('advertsing_commerce',$commerce_data);
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

    public function request($commerce_id="")
    {
        //MALA LOGICA
        // if($adv_cat_id=="")
        // {
        //     $this->db->where('enabled','1');
        //     if(isset($_SESSION["role_id"]))
        //     {
        //         if($_SESSION["role_id"] == 3 )
        //         {
        //             if(!$for_widget)
        //             {
        //                 $this->db->where('permission',NULL,'IS');
        //             }
        //         }
        //     }
        //     else
        //     {
        //         if(!$for_widget)
        //         {
        //             $this->db->where('permission',NULL,'IS');
        //         }
        //     }
        //     $result = $this->db->objectBuilder()->get('advertsings_categories');
        // }
        // else
        // {
        //     $result = $this->db->where('enabled','1')
        //                         ->where('advertsings_categories_id',$adv_cat_id)
        //                         ->objectBuilder()
        //                         ->getOne('advertsings_categories');
        // }
        try{
            $this->db->join("advertsing_commerce_detail acomd","ac.advertsing_commerce_detail_id = acomd.advertsing_commerce_detail_id","LEFT");
            $adv = $this->db->where("ac.id",$commerce_id)
                        ->objectBuilder()
                        ->getOne('advertsing_commerce ac',null,'ac.*,acomd.*');
            return $adv;
        }catch(Exception $ex){
            return false;
        }
    }

    public function update()
    {

    }
    
    // Para manejar el estado de un comercio 
    public function toggleCommerce($commerce_id,$toggle)
    {
        try
        {
            $this->db->where('id',$commerce_id);
            $update = $this->db->update('advertsing_commerce',['enabled'=>$toggle]);
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

    public function delete()
    {

    }


    public function getCommerceFromUserId($user_id)
    {
        $this->db->join("advertsing_commerce_detail acd","ac.advertsing_commerce_detail_id = acd.advertsing_commerce_detail_id");
        $result = $this->db->where('ac.user_id',$user_id)
                            ->objectBuilder()
                            ->get('advertsing_commerce ac',null,'ac.*, acd.commerce_name');
        return $result;
    }

    public function getCommerceFromUserIdWithDetail($user_id)
    {

        $commerce_detail = new AdvertsingCommerceDetail();
        $result = $commerce_detail->getCommercesWithDetail($user_id);
        return $result;
    }

    public function getCommerceWithDetail($commerce_id)
    {
        $commerce_detail = new AdvertsingCommerceDetail();
        $result = $commerce_detail->getCommerceDetail($commerce_id);
        return $result;
    }

    public function requestAllForAdmin($allCommerces = false)
    {
        $this->db->join("advertsing_commerce_detail ad","a.advertsing_commerce_detail_id = ad.advertsing_commerce_detail_id","LEFT");
        $this->db->join("plan p","ad.plan_id = p.plan_id");
        $this->db->join("users u","a.user_id = u.user_id");
        $this->db->join("advertsings_categories ac","ad.category_id = ac.advertsings_categories_id");
        if(!$allCommerces)
        {
            $result = $this->db->where("a.enabled",0)
                ->orderBy('a.id','DESC')
                ->objectBuilder()
                ->get('advertsing_commerce a',null,'a.*,u.username,ad.commerce_name,ad.plan_id,ac.name as cat_name,p.duration');
        }
        else
        {
            $result = $this->db
                ->orderBy('a.id','DESC')
                ->objectBuilder()
                ->get('advertsing_commerce a',null,'a.*,u.username,ad.commerce_name,ad.plan_id,ac.name as cat_name,p.duration');
        }

        return $result;
    }

    public function countCategories()
    {
        $this->db->where('enabled','1')->get('advertsings_categories');
        return $this->db->count;
    }

    public function updateTimeFromAdvertsingCommerceDetail($ad_commerce_detail_id)
    {
        // Recolecto los datos para guardar en la tabla de detalle de la publicación
        $date_format = strtotime('now');
        $date = date("Y-m-d h:i", $date_format);

        $this->db->where('advertsing_commerce_detail_id',$ad_commerce_detail_id);
        if($this->db->update('advertsing_commerce',['updated_at'=>$date]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}