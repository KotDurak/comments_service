<?php


namespace app\services\data;


use app\models\subjects\Product;

class ProductFiller implements Filler
{

    public function fill()
    {
        app()->db->createCommand()
        ->batchInsert(Product::tableName(), ['name', 'description', 'subject'], $this->getRows())
        ->execute();
    }

    public function clear()
    {
        app()->db->createCommand(sprintf('TRUNCATE TABLE %s', Product::tableName()))->execute();
    }

    private function getRows()
    {
        return [
            [
                'name'          => 'Ваз 2114',
                'description'   => 'Хорошая такая тачка',
                'subject'       => Product::getSubjectName(),
            ],
            [
                'name'  => 'Веста',
                'description'   => 'Ниче такая',
                'subject'       => Product::getSubjectName(),
            ],
            [
                'name'  => 'Reno Logan',
                'description'   => 'На дачу ездить',
                'subject'       => Product::getSubjectName(),
            ],
            [
                'name'  => 'Обои для дачи',
                'description'   => 'Качественные обои',
                'subject'       => Product::getSubjectName(),
            ],
        ];
    }
}