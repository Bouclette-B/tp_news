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
        $request = $this->_db->prepare('INSERT INTO news (author, title, content, creationDate) VALUES (:author, :title, :content, NOW())');
        $request->bindValue(':author', $news->getAuthor());
        $request->bindValue(':title', $news->getTitle());
        $request->bindValue(':content', $news->getContent());
        $request->execute();
    }

    public function deleteNews(News $news)
    {
        $this->_db->query("DELETE FROM news WHERE id = {$news->getId()}");
    }

    public function updateNews(News $news)
    {
        $request = $this->_db->prepare('UPDATE news SET author = :author, title = :title, content = :content, updateDate = NOW()');
        $request->bindValue(':author', $news->getAuthor());
        $request->bindValue(':title', $news->getTitle());
        $request->bindValue(':content', $news->getContent());
    }

    public function getNews(){
        $request = $this->_db->query('SELECT *, DATE_FORMAT(creationDate,  \'%d/%m/%Y à %Hh%imin%ss\') AS creationDate FROM news ORDER BY id DESC LIMIT 5');
        return $request->fetchAll(PDO::FETCH_ASSOC);
    }

    // public function getNewsExcerptFromNewsList($newsList, &$news=NULL)
    // {
    //     foreach ($newsList as $news) {
    //         $newsLength = strlen($news['content']);
    //         if ($newsLength > 200) {
    //             $news['content'] = substr($news['content'], 0, 175);
                // $news['content'] = $newsExcerpt . '...' . substr($news['content'], $newsLength - 10, $newsLength - 1);
        //     }
        // }
    // }

}