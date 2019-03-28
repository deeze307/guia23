<?php
require_once dirname(dirname(__FILE__))."/core/Core.php" ;

if (!isset($_SESSION))
{ session_start(); }

class CarouselController
{

    public function getCarouselImages($all=false)
    {
        $carousel = new Carousel();
        return $carousel->request($all);
    }
}