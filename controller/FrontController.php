<?php
namespace App\controller;

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
        $this->render('newsAdminView', $viewData);
    }
}