<?php


namespace app\services\seller;


use app\models\subjects\Seller;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;

class SellerService
{
    const PAGE_SIZE = 20;

    /**
     * @return
    */
    public function getAll(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query'         => Seller::find(),
            'pagination'    => [
                'pageSize'  => self::PAGE_SIZE,
            ],
        ]);
    }

    public function getOne(int $id): Seller
    {
        return Seller::findOrError($id, "Продавец $id не найден");
    }
}