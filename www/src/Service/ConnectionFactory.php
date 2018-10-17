<?php
namespace apache\Service;

use Illuminate\Database\Capsule\Manager as DB;
class ConnectionFactory {
    static $ini_array,$dsn;
    static function setConfig($file){
        ConnectionFactory::$ini_array = parse_ini_file($file);
    }
    static function connectORM(){
        $db = new DB();
        $conf = parse_ini_file('config.ini');
        $db->addConnection($conf);
        $db->setAsGlobal();
        $db->bootEloquent();
    }
}