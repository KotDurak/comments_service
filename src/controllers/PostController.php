<?php


namespace app\controllers;


use yii\web\Controller;

class PostController extends Controller
{
    public function actionIndex()
    {
        return 'posts';
    }

    public function actionShow(int $id)
    {
        return "post $id";
    }
}