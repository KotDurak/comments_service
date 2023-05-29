<?php


namespace app\services\parsers;


use app\models\dto\CommentDto;

interface ICommentParser
{
    /**
     * @return CommentDto[]
    */
    public function doParse(string $url): array;
}