<?php

// Para utilizar los logs solo hace falta instanciar la clase Logger::write(nombre_de_archivo,contenido);

class Logger
{
    public static function write($log_file_name,$log_msg)
    {
        $root = dirname(dirname(dirname(__FILE__)));
        $log_filename = $root."/logs";
        if (!file_exists($log_filename))
        {
            // create directory/folder uploads.
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename . '/' . $log_file_name . "_" . date('d-m-Y') . '.log';
        file_put_contents($log_file_data, $log_msg . "\n", FILE_APPEND);
    }
}
