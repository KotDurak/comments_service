<?php


namespace app\services\subject;


use app\models\subjects\Subject;

class SubjectService
{
    public function getSubject(int $id, string $subject): Subject
    {
        $class = Subject::SUBJECT_CLASSES[$subject];
        if (empty($class)) {
            throw new \Exception("Subject $subject not exists");
        }

        return $class::findOrError($id);
    }
}