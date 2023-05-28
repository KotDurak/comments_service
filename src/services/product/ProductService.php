<?php


namespace app\services\product;


use app\models\subjects\Product;

use yii\data\ActiveDataProvider;

class ProductService
{
    const PAGE_SIZE = 50;

    public function getAll(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query'         => Product::find(),
            'pagination'    => [
                'pageSize'  => self::PAGE_SIZE,
            ],
        ]);
    }

    public function getOne(int $id): Product
    {
        return Product::findOrError($id);
    }
}