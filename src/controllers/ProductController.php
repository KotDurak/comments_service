<?php


namespace app\controllers;


use app\services\product\ProductService;
use yii\web\Controller;

class ProductController extends Controller
{
    public function __construct($id, $module, private ProductService $productService, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $dataProvider = $this->productService->getAll();

        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(int $id)
    {
        $model = $this->productService->getOne($id);

        return $this->render('view', compact('model'));
    }
}