<?php
namespace App\controller;
use App\model\NewsManagerPDO;
use App\model\DBFactory;
use App\model\FormChecker;
use App\model\News;

class FrontController extends Backcontroller
{

    public function home()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $newsList = $newsManagerPDO->getNewsList('LIMIT 5');
        $viewData = [
            'newsList' => $newsList,
        ];
        $this->render('homeView', $viewData);
    }

    public function newsAdmin()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $formChecker = new FormChecker;
        $methodIsPost = $this->methodIsPost();
        $modifiedNewsId = $this->isGet('modifiedId');
        $selected = null;
        $errorMsg = "";
        $newsInfo = [
            'author' => $this->isPost('author'),
            'title' => $this->isPost('title'),
            'content' =>nl2br($this->isPost('content')),
        ];
        if($methodIsPost && $formChecker->checkForm($newsInfo, $errorMsg) && !$modifiedNewsId)
        {
            $news = new News($newsInfo);
            $newsManagerPDO->addNews($news);
            $publishMessage = "News publiée.";
            $viewData['publishMessage'] = $publishMessage;
        } elseif($modifiedNewsId)
        {
            $selectedNews = $newsManagerPDO->getNews($modifiedNewsId);
            $selected = [
                'author' => $selectedNews->getAuthor(),
                'title' => $selectedNews->getTitle(),
                'content' => strip_tags($selectedNews->getContent())
            ];
        }

        if($methodIsPost && isset($selectedNews))
        {
            $selected['id'] = $modifiedNewsId;
            $newsManagerPDO->updateNews($selected);
            $publishMessage = "News modifiée.";
        }

        $newsList = $newsManagerPDO->getNewsList();

        $viewData = [
            'errorMsg' => $errorMsg,
            'newsList' => $newsList,
            'selected' => $selected,
            'publishMessage' => isset($publishMessage) ? $publishMessage : ""
        ];

        $this->render('newsAdminView', $viewData);

    }

    public function newsView()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $newsID = $this->isGet('id');
        if($newsID)
        {
            $news = $newsManagerPDO->getNews($newsID);
        }
        $formatedContent = nl2br($news->getContent());
        $viewData = [
            'news' => $news,
            'formatedContent' => $formatedContent
        ];
        $this->render('newsView', $viewData);
    }

    public function deleteNewsView()
    {
        $db = DBFactory::getMysqlConnectionWithPDO();
        $newsManagerPDO = new NewsManagerPDO($db);
        $newsId = $this->isGet('id');
        $methodIsPost = $this->methodIsPost();
        $news = $newsManagerPDO->getNews($newsId);
        if($methodIsPost)
        {
            $newsManagerPDO->deleteNews($news);
            $deleteMessage = "News supprimée.";
        }

        $viewData = [
            'news' => $news,
            'deleteMessage' => isset($deleteMessage) ? $deleteMessage : "",
            'methodIsPost' =>$methodIsPost
        ];

        $this->render('deleteNewsView', $viewData);
    }
}