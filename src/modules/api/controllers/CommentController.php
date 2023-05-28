<?php


namespace app\modules\api\controllers;


use app\models\Comment;
use app\models\search\CommentSearch;
use app\services\comment\CommentService;
use yii\rest\Controller;

class CommentController extends Controller
{
    public function __construct(
        $id,
        $module,
        private CommentService $commentService,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $searchModel = new CommentSearch();

        return $searchModel->search(app()->request->queryParams, '');
    }

    public function actionCreate()
    {
        $model = new Comment();
        $model->load(post());

        $this->commentService->addComment($model);

        return $model;
    }

    public function actionView(int $id)
    {
        return $this->commentService->getOne($id);
    }
}