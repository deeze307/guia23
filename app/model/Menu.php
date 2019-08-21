<?php

if (!isset($_SESSION))
{ session_start(); }


class Menu
{

    public function AllMenuItems()
    {
        $obj = new stdClass();
        $core = new Core();
        $db = $core->db;

        //Para el item Inicio
        $obj->inicio = $db->where("app","%w%","LIKE")
                        ->where("root",0)
                        ->where("title","Inicio")->objectBuilder()->getOne("menu");

        //Se listan los items primarios (nivel 0) del menú de tipo SIMPLE

        // Si no tiene provincia, no se muestran las ciudades
        if (!isset($_SESSION["selected_province_id"])) $db->where("title <> 'Ciudades'");
        $obj->menuesSimple = $db->where("app","%w%","LIKE")
                                ->where("root",0)
                                ->where("title <> 'Inicio'")
                                ->where("type","simple")
                                ->where("enabled","T")
                                ->orderBy("title",'ASC')
                                ->objectBuilder()->get("menu");

        //Se listan los items primarios (nivel 0) del menú de tipo MEGA
        $obj->menuesMega = $db->where("app","%w%","LIKE")
                                ->where("root",0)
                                ->where("title <> 'Inicio'")
                                ->where("type","mega")
                                ->where("enabled","T")
                                ->orderBy("title",'ASC')
                                ->objectBuilder()->get("menu");

        echo'
                <li class="dropdown">
                    <a href="'.__URL__.'/'.$obj->inicio->link.'"><i class="'.$obj->inicio->icon.'" target="_self"></i> '.$obj->inicio->title.'</a>
                </li>';

        // Se imprimen los items de Menu Simple
        foreach($obj->menuesSimple as $menuSimple) //Entregará los datos en forma de $menu[columna],
        {  //Repetira el siguiente echo con todos los datos de la consulta
            if($menuSimple->title == "Ciudades"){
                $obj->submenuesSimple = $db->where('province_id',$_SESSION['selected_province_id'])
                ->where("enabled",1)
                ->orderBy('name','ASC')
                ->objectBuilder()->get('cities');
            }else{
                $obj->submenuesSimple = $db->where("app","%w%","LIKE")
                ->where('root',$menuSimple->menu_id)
                ->where("enabled","T")
                ->orderBy('title','ASC')
                ->objectBuilder()->get('menu');
            }
            
            //Si la cantidad de filas submenues es mayor a 0, los imprimirá en su menú padre
            if(count($obj->submenuesSimple) > 0)
            {
                echo '
                    <li class="dropdown">
                        <a href="'.__URL__.'/'.$menuSimple->link.'" class="dropdown-toggle" data-toggle="dropdown" target="_self"><i class="'.$menuSimple->icon.'"></i> '.$menuSimple->title.'</a>
                            <ul class="dropdown-menu">';
                            foreach($obj->submenuesSimple as $submenuSimple)
                            {
                                if($menuSimple->title == "Ciudades"){
                                    echo'<li><a href="'.__URL__.'/app/controller/Main.php?city_id='.$submenuSimple->city_id.'&city_name='.$submenuSimple->name.'&city_class='.$submenuSimple->class.'&province_id='.$submenuSimple->province_id.'" target="_self">'.$submenuSimple->name.'</a></li>';
                                }else{
                                    if(!isset($submenuSimple->permission))
                                    {
                                        echo'<li><a href="'.__URL__.'/'.$submenuSimple->link.'" target="_self"><i class="'.$submenuSimple->icon.'"></i> '.$submenuSimple->title.'</a></li>';
                                    }
                                    else
                                    {
                                        if(isset($_SESSION["role_id"]) && $_SESSION["role_id"] == $submenuSimple->permission)
                                        {
                                            echo'<li><a href="'.__URL__.'/'.$submenuSimple->link.'" target="_self"><i class="'.$submenuSimple->icon.'"></i> '.$submenuSimple->title.'</a></li>';
                                        }
                                    }
                                }
                                

                            }
                            echo'
                            </ul>
                    </li>';
            }
            else
            {
                if(!isset($menuSimple->permission))
                {
                    echo '
                    <li class="dropdown">
                        <a href="' . __URL__ . '/' . $menuSimple->link . '" target="_self"><i class="' . $menuSimple->icon . '"></i> ' . $menuSimple->title . '</a>
                    </li>';
                }
                else
                {
                    if(isset($_SESSION["role_id"]) && $this->chkPermission($_SESSION["role_id"],$menuSimple->permission))
                    {
                        echo '
                        <li class="dropdown">
                            <a href="' . __URL__ . '/' . $menuSimple->link . '" target="_self"><i class="' . $menuSimple->icon . '"></i> ' . $menuSimple->title . '</a>
                        </li>';
                    }
                }
            }
        }

        // Se imprimen los items de Menu Mega
        foreach($obj->menuesMega as $menuMega)
        {
            $obj->submenuesMega = $db->where("app","%w%","LIKE")
                                    ->where('root',$menuMega->menu_id)
                                    ->where("enabled","T")
                                    ->orderBy('title','ASC')
                                    ->objectBuilder()->get('menu');

            if(count($obj->submenuesMega) > 0)
            {
                echo '
                    <li class="dropdown megamenu-fw">
                        <a href="'.__URL__.'/'.$menuMega->link.'" class="dropdown-toggle" data-toggle="dropdown" target="_self"><i class="'.$menuMega->icon.'"></i> '.$menuMega->title.'</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <div class="row">';
                                    foreach($obj->submenuesMega as $submenuMega)
                                    {
                                        $obj->submenuesMegaSegundoNivel = $db->where("app","%w%","LIKE")
                                                                            ->where('root',$submenuMega->menu_id)
                                                                            ->where("enabled","T")
                                                                            ->orderBy('title','ASC')
                                                                            ->objectBuilder()->get('menu');
                                        echo'
                                        <li>

                                                <div class="col-menu col-md-3">
                                                    <h6 class="title">'.$submenuMega->title.'</h6>
                                                        <div class="content">
                                                            <ul class="menu-col">';
                                                            foreach($obj->submenuesMegaSegundoNivel as $submenuMegaSegundoNivel)
                                                            {
                                                                echo'<li><a href="'.__URL__.'/'.$submenuMegaSegundoNivel->link.'" target="_self">'.$submenuMegaSegundoNivel->title.'</a></li>';
                                                            }
                                                            echo'
                                                            </ul>
                                                        </div>
                                                </div>

                                        </li>';
                                    }
                            echo'</div>
                            </ul>
                    </li>';
            }
            else
            {
                echo'
                <li class="dropdown megamenu-fw">
                    <a href="'.__URL__.'/'.$menuMega->link.'" target="_self"><i class="'.$menuMega->icon.'"></i> '.$menuMega->title.'</a>
                </li>';
            }
        }
    }

    private function chkPermission($user_role,$permissions)
    {
        $permisos_explode = explode(',',$permissions);
        foreach($permisos_explode as $permission)
        {
            if($user_role == $permission){ return true;}
        }
        return false;
    }
}