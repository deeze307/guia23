<?php

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
        $obj->menuesSimple = $db->where("app","%w%","LIKE")
                                ->where("root",0)
                                ->where("title <> 'Inicio'")
                                ->where("type","simple")
                                ->orderBy("title",'ASC')
                                ->objectBuilder()->get("menu");

        //Se listan los items primarios (nivel 0) del menú de tipo MEGA
        $obj->menuesMega = $db->where("app","%w%","LIKE")
                                ->where("root",0)
                                ->where("title <> 'Inicio'")
                                ->where("type","mega")
                                ->orderBy("title",'ASC')
                                ->objectBuilder()->get("menu");

        echo'
                <li class="dropdown">
                    <a href="http://'.$_SERVER["SERVER_NAME"]."/guia23".'"><i class="'.$obj->inicio->icon.'"></i> '.$obj->inicio->title.'</a>
                </li>';

        // Se imprimen los items de Menu Simple
        foreach($obj->menuesSimple as $menuSimple) //Entregara los datos en forma de $menu[columna],
        {  //Repetira el siguiente echo con todos los datos de la consulta
            $obj->submenuesSimple = $db->where("app","%w%","LIKE")
                                        ->where('root',$menuSimple->menu_id)
                                        ->orderBy('title','ASC')
                                        ->objectBuilder()->get('menu');

            //Si la cantidad de filas submenues es mayor a 0, los imprimirá en su menú padre
            if(count($obj->submenuesSimple) > 0)
            {
                echo '
                    <li class="dropdown">
                        <a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$menuSimple->link.'" class="dropdown-toggle" data-toggle="dropdown"><i class="'.$menuSimple->icon.'"></i> '.$menuSimple->title.'</a>
                            <ul class="dropdown-menu">';
                            foreach($obj->submenuesSimple as $submenuSimple)
                            {
                                echo'
                                <li><a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$submenuSimple->link.'"><i class="'.$submenuSimple->icon.'"></i> '.$submenuSimple->title.'</a></li>';
                            }
                            echo'
                            </ul>
                    </li>';
            }
            else
            {
                echo'
                <li class="dropdown">
                    <a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$menuSimple->link.'"><i class="'.$menuSimple->icon.'"></i> '.$menuSimple->title.'</a>
                </li>';
            }
        }

        // Se imprimen los items de Menu Mega
        foreach($obj->menuesMega as $menuMega)
        {
            $obj->submenuesMega = $db->where("app","%w%","LIKE")
                                    ->where('root',$menuMega->menu_id)
                                    ->orderBy('title','ASC')
                                    ->objectBuilder()->get('menu');

            if(count($obj->submenuesMega) > 0)
            {
                echo '
                    <li class="dropdown megamenu-fw">
                        <a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$menuMega->link.'" class="dropdown-toggle" data-toggle="dropdown"><i class="'.$menuMega->icon.'"></i> '.$menuMega->title.'</a>
                            <ul class="dropdown-menu megamenu-content" role="menu">
                                <div class="row">';
                                    foreach($obj->submenuesMega as $submenuMega)
                                    {
                                        $obj->submenuesMegaSegundoNivel = $db->where("app","%w%","LIKE")
                                                                            ->where('root',$submenuMega->menu_id)
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
                                                                echo'<li><a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$submenuMegaSegundoNivel->link.'">'.$submenuMegaSegundoNivel->title.'</a></li>';
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
                    <a href="http://'.$_SERVER["SERVER_NAME"].'/guia23/'.$menuMega->link.'"><i class="'.$menuMega->icon.'"></i> '.$menuMega->title.'</a>
                </li>';
            }
        }
    }
}