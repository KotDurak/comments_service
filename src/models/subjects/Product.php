<?php

namespace app\models\subjects;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string|null $description
 */
class Product extends \app\models\subjects\Subject
{


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(),
            [
                [['name'], 'required'],
                [['description'], 'string'],
                [['name'], 'string', 'max' => 255],
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'subject' => 'Subject',
            'description' => 'Description',
        ];
    }
}
