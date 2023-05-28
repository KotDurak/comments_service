<?php


namespace app\models\forms;


use app\models\Comment;
use app\models\subjects\Subject;

class CommentForm extends Comment
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['subject_id'], 'required'],
            ['subject_id', 'validateSubject'],
        ]);
    }

    public function afterFind()
    {
        parent::afterFind();
        $this->create_time = date('Y-m-d H:i', $this->create_time);
    }

    public function beforeSave($insert)
    {
        $this->create_time = strtotime($this->create_time);
        return parent::beforeSave($insert);
    }

    public function validateSubject($attribute, $params, $validator)
    {
        if (empty(Subject::SUBJECT_CLASSES[$this->subject])) {
            $this->addError($attribute, "нет субъекта {$this->subject}");
            return;
        }

        $class = Subject::SUBJECT_CLASSES[$this->subject];
        $exists = $class::find()->where(['id' => $this->subject_id])->exists();

        if (!$exists) {
            $this->addError($attribute, "Субъект с id {$this->subject_id} не найден");
        }
    }
}