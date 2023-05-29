<?php


namespace app\services\comment;


use app\models\Comment;
use app\models\dto\CommentDto;
use app\models\subjects\Subject;

class CommentFiller
{
    const DEFAULT_IP = '172.18.0.1';
    const DEFAULT_USER_AGENT = 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36';
    /**
     * @param Subject $subject
     * @param CommentDto[] $comments
    */
    public function fillComment(Subject $subject, array $comments)
    {
        $data = [];
        $comment = new Comment();
        $attributes =  $comment->attributes;
        unset($attributes['id']);

        foreach ($comments as $comment) {
            $data[] = [
                'subject_id'    => $subject->id,
                'subject'       => $subject->subject,
                'status'        => Comment::STATUS_NEW,
                'comment'       => $comment->comment,
                'username'      => $comment->username,
                'ip'            => self::DEFAULT_IP,
                'user_agent'    => self::DEFAULT_USER_AGENT,
                'create_time'   => time(),
            ];
        }

        if (empty($data)) {
            return 'Комментарии не добавлены';
        }

        $cols = array_keys($data[0]);


        app()->db->createCommand()->batchInsert(Comment::tableName(), $cols, $data)->execute();

        $count = count($data);

        return "$count комметариев добавлено к субъкету '{$subject->subjectName()}' ({$subject->getType()})";
    }
}