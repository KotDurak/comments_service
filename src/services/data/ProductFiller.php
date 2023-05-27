<?php


namespace app\services\data;


use app\models\subjects\Product;

class ProductFiller implements Filler
{

    public function fill()
    {
        app()->db->createCommand()
        ->batchInsert(Product::tableName(), ['name', 'subject', 'description'], $this->getRows())
        ->execute();
    }

    public function clear()
    {
        app()->db->createCommand(sprintf('TRUNCATE TABLE %s', Product::tableName()))->execute();
    }

    private function getRows()
    {
        $rows = [
            [
                'name'          => 'Ваз 2114',
                'description'   => 'Хорошая такая тачка',
            ],
            [
                'name'  => 'Веста',
                'description'   => 'Ниче такая',
            ],
            [
                'name'  => 'Reno Logan',
                'description'   => 'На дачу ездить',
            ],
            [
                'name'  => 'Обои для дачи',
                'description'   => 'Качественные обои',
            ],
        ];

        return array_map(fn($r) => [...$r, 'subject' => Product::getSubjectName()], $rows);
    }
}