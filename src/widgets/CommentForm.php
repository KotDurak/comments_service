<?php


namespace app\widgets;


use app\models\Comment;
use app\models\subjects\Subject;
use yii\base\Widget;

class CommentForm extends Widget
{
    public Subject $subject;

    public function run()
    {
        return $this->render('comment/index', [
            'model' => new Comment(),
            'subject'  => $this->subject,
        ]);
    }
}