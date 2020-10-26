<?php
namespace App\model;
use \MySQLi;
class NewsManagerMySQLI extends NewsManager 
{
    private $_db;

    public function __construct(MySQLi $db)
    {
        $this->_db = $db;
    }

    public function addNews(News $news)
    {
        $request = $this->_db->prepare('INSERT INTO news (author, title, content, creationDate) VALUES (?, ?, ?, NOW(), NOW())');
        $request->bind_param('sss', $news->getAuthor(), $news->getTitle(), $news->getContent());
        $request->execute();
    }

    public function deleteNews(News $news)
    {
        $request = $this->_db->query("DELETE FROM news WHERE id = ?");
    }

    public function updateNews(News $news)
    {
        $request = $this->_db->prepare('UPDATE news SET author = ?, title = ?, content = ?, updateDate = ?');
        $request->bind_param('sssi', $news->getAuthor(), $news->getTitle(), $news->getContent(), $news ->getId());
    }

}