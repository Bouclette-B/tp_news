<?php
namespace App\controller;
use App\model\NewsManagerPDO;
use App\model\DBFactory;
use App\model\News;
class FrontController extends Backcontroller
{
    public function home()
    {
        $test = 'PROUT';
        $viewData = [
            'test' => $test,
        ];
        $this->render('homeView', $viewData);
    }

    public function newsAdmin()
    {
        $DBFactory = new DBFactory;
        $db = $DBFactory->getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $author = $this->isPost('author');
        $title = $this->isPost('title');
        $content = $this->isPost('content');
        $newsIsPublished = null;
        if($author && $title && $content){
            $author = htmlspecialchars($author);
            $title = htmlspecialchars($title);
            $content = htmlspecialchars($content);
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