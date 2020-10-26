<?php
namespace App\model;
use \PDO;
use\MySqli;
class DBFactory
{
    public static function getMysqlConnectionWithPDO()
    {
        $db = new PDO('mysql:host=localhost;dbname=tp_news;charset=utf8', 'root', '');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function getMysqlConnectionWithMySQLI()
    {
        return new MySQLi('localhost', 'root', '', 'tp_news');    
    }
}