<?php
namespace App\model;

use DateTime;
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
        $request = $this->_db->prepare('INSERT INTO news (author, title, content, creationDate) VALUES (:author, :title, :content, NOW())');
        $request->bindValue(':author', $news->getAuthor());
        $request->bindValue(':title', $news->getTitle());
        $request->bindValue(':content', $news->getContent());
        $request->execute();
    }

    public function deleteNews(News $news)
    {
        $this->_db->query("DELETE FROM news WHERE id =" . $news->getId());
    }

    public function updateNews(array $news)
    {
        $request = $this->_db->prepare('UPDATE news SET author = :author, title = :title, content = :content, updateDate = NOW() WHERE id=' .$news['id']);
        $request->bindValue(':author', $news['author']);
        $request->bindValue(':title', $news['title']);
        $request->bindValue(':content', $news['content']);
        $request->execute();
    }

    public function getNewsList($limit = null){
        $request = $this->_db->query('SELECT * FROM news ORDER BY id DESC ' . $limit);
        $newsList = $request->fetchAll(PDO::FETCH_CLASS, News::class);
        foreach($newsList as $news){
            $news->setCreationDate(new DateTime($news->getCreationDate()));
            if($news->getUpdateDate())
            {
                $news->setUpdateDate(new DateTime($news->getUpdateDate()));
            }
    
        }
        return $newsList;
    }

    public function getNews($id)
    {
        $request = $this->_db->query('SELECT * FROM news WHERE id =' .$id);
        $news = $request->fetchAll(PDO::FETCH_CLASS, News::class);
        $news = $news[0];
        $news->setCreationDate(new DateTime($news->getCreationDate()));
        if($news->getUpdateDate())
        {
            $news->setUpdateDate(new DateTime($news->getUpdateDate()));
        }

        return $news;
    }

    public function getNewsExcerptFromNewsList($newsList, &$news=NULL)
    {
        foreach ($newsList as $news) {
            $newsLength = strlen($news['content']);
            if ($newsLength > 200) {
                $newsExcerpt = wordwrap($news['content'], 199);
                $newsExcerpt = explode("\\n", $newsExcerpt);
                $news['content'] = $newsExcerpt[0] . "...";
            }
        }
        return $newsList;
    }

}