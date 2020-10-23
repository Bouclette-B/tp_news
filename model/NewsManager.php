<?php
namespace App\model;
abstract class NewsManager
{
    abstract public function addNews(News $news);
    abstract public function deleteNews(News $news);
    abstract public function updateNews(News $news);

}