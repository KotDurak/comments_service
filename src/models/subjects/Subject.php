<?php


namespace app\models\subjects;


use yii\db\ActiveRecord;

/**
 * @property string $subject
*/
class Subject extends ActiveRecord
{
    const TYPE_PRODUCT = 'product';
    const TYPE_SELLER = 'seller';
    const TYPE_POST = 'pose';

    const SUBJECT_TYPES = [
        self::TYPE_POST,
        self::TYPE_PRODUCT,
        self::TYPE_SELLER,
    ];

    public function init()
    {
        parent::init();
        $this->subject = self::getSubjectName();
    }

    public function rules()
    {
        return [
            ['subject', 'in', 'range' => self::SUBJECT_TYPES],
        ];
    }

    public static function getSubjectName(): string
    {
        return self::getTableSchema()->name;
    }


    public function getType(): string
    {
        return self::getTableSchema()->name;
    }
}