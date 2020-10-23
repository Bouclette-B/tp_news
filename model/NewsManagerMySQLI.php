<?php
namespace App\model;
class NewsManagerMySQLI extends NewsManager 
{
    public function dbConnect()
    {
        $db = new mysqli('mysql:host=localhost;dbname=tp_game;charset=utf8', 'root', 'root');
        return $db;
    }
}