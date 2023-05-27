<?php


namespace app\services\data;


use app\models\subjects\Seller;

class SellerFiller implements Filler
{

    public function fill()
    {
        app()->db->createCommand()
            ->batchInsert(Seller::tableName(), ['name', 'subject'], $this->getData())
        ->execute();
    }

    public function clear()
    {
        app()->db->createCommand(sprintf('TRUNCATE TABLE %s', Seller::tableName()))->execute();
    }

    private function getData()
    {
        return [
            [
                'name'  => 'Автоваз',
                'subject'   => Seller::getSubjectName(),
            ],
            [
                'name'  => 'Рено',
                'subject'   => Seller::getSubjectName(),
            ],
            [
                'name'  => 'Мир обоев',
                'subject'   => Seller::getSubjectName(),
            ]
        ];
    }
}