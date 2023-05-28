<?php


namespace app\models\subjects;


use yii\db\ActiveRecord;
use yii\web\NotFoundHttpException;

/**
 * @property string $subject
*/
abstract class Subject extends ActiveRecord
{
    const TYPE_PRODUCT = 'product';
    const TYPE_SELLER = 'seller';
    const TYPE_POST = 'post';

    const SUBJECT_TYPES = [
        self::TYPE_POST,
        self::TYPE_PRODUCT,
        self::TYPE_SELLER,
    ];

    const SUBJECT_CLASSES = [
        self::TYPE_PRODUCT => Product::class,
        self::TYPE_SELLER => Seller::class,
     //   self::TYPE_POST => Post::class,
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

    public static function findOrError(mixed $id, string $textError = '')
    {
        $model = self::findOne($id);

        if (empty($model)) {
            throw new NotFoundHttpException($textError);
        }

        return $model;
    }

    abstract public function subjectName(): string;

    abstract public function subjectInfo(): string;
}