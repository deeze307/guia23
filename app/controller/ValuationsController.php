<?php
require_once(dirname(dirname(__FILE__)).'/core/Core.php');
if (!isset($_SESSION))
{ session_start(); }

// Valoraciones de publicidades
if(isset($_POST['post_listing_message']))
{
    $val = new ValuationsController();
//    var_dump($_POST,$_SESSION['adv_detail']->advertsing_id);
    $val->createValuation($_POST,$_SESSION['adv_detail']->advertsing_id);
}
class ValuationsController
{

    public function createValuation($post,$adv_id)
    {
        $val = new Valuations();
        $res = $val->create($post,$adv_id);

        if($res > 0)
        {
            $_SESSION['message'] = "Mensaje creado exitosamente [".$res."]";
        }
        else
        {
            $_SESSION['error'] = "Ocurrió un error al intentar enviar el mensaje: ".$res;
        }

        header("Location: ".__URL__."/views/listing-details.php");
    }

    public function getValuationsForAdvId($adv_id)
    {
        $val = new Valuations();
        return $val->request($adv_id);

    }

}