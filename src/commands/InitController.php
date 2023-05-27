<?php


namespace app\commands;


use app\services\data\FillDatabaseService;
use app\services\data\ProductFiller;
use app\services\data\SellerFiller;
use yii\console\Controller;

class InitController extends Controller
{
    public function __construct($id, $module, private FillDatabaseService $fillDatabaseService, $config = [])
    {
        parent::__construct($id, $module, $config);
    }

    public function init()
    {
        parent::init();
        $this->fillDatabaseService->addFiller(new SellerFiller())
        ->addFiller(new ProductFiller());
    }

    public function actionIndex()
    {

        $this->fillDatabaseService->fill();
    }

    public function actionClear()
    {
        $this->fillDatabaseService->clear();
    }
}