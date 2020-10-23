<?php
namespace App\model;
abstract class NewsManager
{
    public function __construct($db)
    {
        $this->_db = $db;
    }
}