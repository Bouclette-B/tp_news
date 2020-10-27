<?php
namespace App\controller;
class Backcontroller
{
    public function isPost($data) {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST[$data])){
            return htmlspecialchars($_POST[$data]);
        }
        return false;
    }

    public function isGet($data) {
        if(isset($_GET[$data]))
        {
            return $_GET[$data];
        }
        return false;
    }

    public function methodIsPost()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST')
        {
            return true;
        }
        return false;
    }

    public function render($viewName, $viewData) {
        ob_start();
        extract($viewData);
        require('./view/' . $viewName . '.php');
        $content = ob_get_clean(); 
        require('./template/template.php');
    }
}