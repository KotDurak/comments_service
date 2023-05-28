<?php


namespace app\helpers;


use app\models\subjects\Subject;

class SubjectHelper
{
    public static function getTypes(): array
    {
        $result = [];

        foreach (Subject::SUBJECT_TYPES as $type) {
            $result[$type] = $type;
        }

        return $result;
    }
}