<?php


namespace app\models\subjects;


use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
*/
class Seller extends Subject
{
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['name', 'required'],
            ['name', 'string', 'min' => 3],
        ]);
    }
}