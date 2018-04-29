<?php

require_once $_SERVER["DOCUMENT_ROOT"]."guia23/app/core/Core.php";

 class Main
{
     public function __construct()
     {
//         $_SESSION["username"] = "dmaidana";
//         $_SESSION["name"] = "Diego";
//         $_SESSION["surname"] = "Maidana";
     }

     public function getGeneraData()
     {
         $header = new \stdClass();
         $header->phone = "Telefono";
         $general = new General();
         $header->phone = $general->getGeneralData('telefonoDeContacto');
         $header->mail = $general->getGeneralData('emailDeContacto');
         return $header;
     }

     public function getMenuItems()
     {
         $menu = new Menu;
         $res = $menu->AllMenuItems();

         return $res;
     }

     public static function menuAccess($permisos) {
         // Por defecto no se imprime el menu root
         $print = false;

         // Verifico permisos del menu
         $permisosToArray = explode(',',$permisos);

         // Si el menu no requiere permisos lo muestro
         if($permisos==null) {
             $print = true;
         } else {
             // El menu requiere permisos, verifico si el usuario dispone de los mismos
//            if(Auth::user() && Auth::user()->hasRole($permisosToArray))
//            {
//                $print = true;
//            } else
//            {
//                // No esta autenticado o no tiene permisos... oculto menu
//                $print = false;
//            }
         }

         return $print;
     }
}