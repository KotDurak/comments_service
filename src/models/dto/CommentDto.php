<?php


namespace app\models\dto;


class CommentDto
{
    public function __construct(public string $username, public string $comment)
    {
    }
}