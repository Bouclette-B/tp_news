<?php
namespace App\controller;
use App\model\NewsManagerPDO;
use App\model\DBFactory;
use App\model\News;
class FrontController extends Backcontroller
{

    public function home()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $newsList = $newsManagerPDO->getNews();
        // $newsManagerPDO->getNewsExcerptFromNewsList($newsList);
        $viewData = [
            'newsList' => $newsList,
        ];
        $this->render('homeView', $viewData);
    }

    public function newsAdmin()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $author = $this->isPost('author');
        $title = $this->isPost('title');
        $content = $this->isPost('content');
        $newsIsPublished = null;
        if($author && $title && $content){
            $author = htmlspecialchars($author);
            $title = htmlspecialchars($title);
            $content = nl2br(htmlspecialchars($content));
            $news = new News([
                'author' => $author,
                'title' => $title,
                'content' => $content,
            ]);
            $newsManagerPDO->addNews($news);
            $newsIsPublished = "News publiée";
        }

        $viewData = [
            'newsIsPublished' => $newsIsPublished
        ];
        $this->render('newsAdminView', $viewData);
    }
}