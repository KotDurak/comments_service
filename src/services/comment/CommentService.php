<?php


namespace app\services\comment;


use app\models\Comment;
use app\models\forms\CommentForm;
use yii\web\NotFoundHttpException;


class CommentService
{
    public function addComment(Comment $comment): bool
    {
        $comment->ip = userIp();
        $comment->user_agent = userAgent();
        $comment->create_time = time();
        $comment->status = Comment::STATUS_NEW;

        return $comment->save();
    }

    public function getOne(int $id): Comment
    {
        $model = CommentForm::findOne($id);

        if (empty($model)) {
            throw new NotFoundHttpException();
        }

        return $model;
    }
}