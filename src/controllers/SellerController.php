<?php


namespace app\controllers;



use app\services\comment\CommentService;
use app\services\seller\SellerService;
use yii\web\Controller;


class SellerController extends Controller
{

    public function __construct(
        $id,
        $module,
        private SellerService $sellerService,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $dataProvider = $this->sellerService->getAll();

        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(int $id)
    {
        $model = $this->sellerService->getOne($id);

        return $this->render('view', compact('model'));
    }
}