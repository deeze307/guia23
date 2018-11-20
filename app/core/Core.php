<?php

define('__GUIA23__', dirname(dirname(__FILE__)));


//************************************//
//******** CLASES PRINCIPALES ********//
//************************************//

require_once __GUIA23__."/model/Config.php";
require_once __GUIA23__."/model/MysqliDb.php";

require_once __GUIA23__."/model/General.php";
require_once __GUIA23__."/model/Menu.php";

require_once __GUIA23__."/controller/Mailer.php";
require_once __GUIA23__."/core/Logger.php";

//*************************//
//******** MODELOS ********//
//*************************//
require_once __GUIA23__."/model/Users.php";
require_once __GUIA23__."/model/UserOrigin.php";
require_once __GUIA23__."/model/Profile.php";

require_once __GUIA23__."/model/Plan.php";
require_once __GUIA23__."/model/PlanFeatures.php";

require_once __GUIA23__."/model/Provinces.php";
require_once __GUIA23__."/model/Cities.php";

require_once __GUIA23__."/model/Advertsings.php";
require_once __GUIA23__."/model/AdvertsingsCategories.php";
require_once __GUIA23__."/model/AdvertsingDetail.php";
require_once __GUIA23__."/model/AdvertsingsCounter.php";

require_once __GUIA23__."/model/Valuations.php";

class Core
{
    public static $env_path;
    public $db;

    public function __construct()
    {
//        $this->env_path = $_SERVER['DOCUMENT_ROOT']."/";
        $this->db = new MysqliDb(Config::$mysql_host,Config::$mysql_user,Config::$mysql_pass,Config::$mysql_database,Config::$mysql_port,Config::$mysql_charset);
    }

}