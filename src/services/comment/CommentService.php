<?php


namespace app\services\comment;


use app\models\Comment;


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
}