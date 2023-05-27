<?php


namespace app\models\subjects;


class Post extends Subject
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['title', 'required'],
            [['title', 'content'], 'sting']
        ]);
    }
}