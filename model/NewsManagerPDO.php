<?php
namespace App\model;
use \PDO;
class NewsManagerPDO extends NewsManager
{
    private $_db;

    public function __construct(PDO $db)
    {
        $this->_db = $db;
    }

    public function addNews(News $news)
    {
        $request = $this->_db->prepare('INSERT INTO news (author, title, content, creationDate) VALUES (:author, :title, :content, :creationDate');
        $request->bindValue(':author', $news->getAuthor());
        $request->bindValue(':title', $news->getTitle());
        $request->bindValue(':content', $news->getContent());
        $request->bindValue(':creationDate', $news->getCreationDate());
        $request->execute();
    }

    public function deleteNews(News $news)
    {
        $request = $this->_db->query("DELETE FROM news WHERE id = {$news->getId()}");
    }

    public function updateNews(News $news)
    {
        $request = $this->_db->prepare('UPDATE news SET author = :author, title = :title, content = :content, updateDate = :updateDate');
        $request->bindValue(':author', $news->getAuthor());
        $request->bindValue(':title', $news->getTitle());
        $request->bindValue(':content', $news->getContent());
        $request->bindValue('updateDate', $news->getUpdateDate());
    }
}