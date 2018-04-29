<?php


class General
{
    public static function getGeneralData($key)
    {
        $value = new \stdClass();
        $value->general_value = "N/A";
        $db = new MysqliDb(Config::$mysql_host,Config::$mysql_user,Config::$mysql_pass,Config::$mysql_database,Config::$mysql_port,Config::$mysql_charset);
        $result = $db->where('general_key',$key)
                    ->objectBuilder()->getOne('general','general_value');
        if(count($result) > 0)
        {
            $value->general_value = $result->general_value;
        }
        return $value->general_value;
    }
}