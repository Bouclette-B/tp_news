<?php
namespace App\model;
use \PDO;
class DBFactory
{
    public function getMysqlConnectionWithPDO()
    {
        $db = new PDO('mysql:host=localhost;dbname=tp_news;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public function getMysqlConnectionWithMySQLI()
    {
        return new MySQLi('localhost', 'root', 'root', 'tp_news');    
    }
}