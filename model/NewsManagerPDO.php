<?php
namespace App\model;
class NewsManagerPDO extends NewsManager
{
    public function dbConnect() {
        $db = new PDO('mysql:host=localhost;dbname=tp_game;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}