<?php

require_once $_SERVER["DOCUMENT_ROOT"]."/app/core/Core.php";

if (!isset($_SESSION))
{ session_start(); }

if(isset($_GET['city_id']) || isset($_GET['province_id']))
{
    if(isset($_GET['city_id'])){$_SESSION['selected_city_id'] = $_GET['city_id'];};
    if(isset($_GET['city_name'])){$_SESSION['selected_city_name'] = $_GET['city_name'];};
    if(isset($_GET['city_class'])){$_SESSION['selected_city_class'] = $_GET['city_class'];};
    if(isset($_GET['province_id'])){$_SESSION['selected_province_id'] = $_GET['province_id'];};
    if(isset($_GET['province_name'])){$_SESSION['selected_province_name'] = $_GET['province_name'];};
    header("Location: ".__URL__."/home.php");
}

 class Main
{
     public function __construct()
     {
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