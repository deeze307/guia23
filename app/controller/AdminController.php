<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/guia23/app/core/Core.php";

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
         return $adv->requestAllPendentForAdmin();
     }

     public function getUsers()
     {
         $users = new Users();
         return $users->requestAll();
     }
}