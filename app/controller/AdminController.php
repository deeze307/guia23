<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/app/core/Core.php";

 class AdminController
{
     public function __construct()
     {
//         $_SESSION["username"] = "dmaidana";
//         $_SESSION["name"] = "Diego";
//         $_SESSION["surname"] = "Maidana";
     }

     public function getPendentReviews()
     {
         $adv = new Advertsings();
         return $adv->requestAllForAdmin(false);
     }
     public function getAllReviews()
     {
         $adv = new Advertsings();
         return $adv->requestAllForAdmin(true);
     }

     public function getPendentCommerces()
     {
         $adv = new AdvertsingCommerce();
         return $adv->requestAllForAdmin(false);
     }
     public function getAllCommerces()
     {
         $adv = new AdvertsingCommerce();
         return $adv->requestAllForAdmin(true);
     }

     public function getUsers()
     {
         $users = new Users();
         return $users->requestAll();
     }
}