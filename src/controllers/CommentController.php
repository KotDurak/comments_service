<?php


namespace app\controllers;


use app\models\Comment;
use app\models\search\CommentSearch;
use app\services\comment\CommentService;
use app\services\subject\SubjectService;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Session;

class CommentController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions'   => [
                    'index'   => ['GET'],
                    'create'   => ['POST']
                ]
            ]
        ];
    }

    public function __construct(
        $id,
        $module,
        private CommentService $commentService,
        private SubjectService $subjectService,
        $config = []
    ) {
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        $searchModel = new CommentSearch();
        $dataProvider = $searchModel->search(app()->request->queryParams);

        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionCreate()
    {
        $model = new Comment();
        /** @var Session $session */
        $session = app('session');

        if ($model->load(post()) && $model->validate() && $this->commentService->addComment($model)) {
            $session->setFlash('success', 'Комменарий успешно добавлен');
        } else {
            $session->setFlash('error', 'Не удалось добавить комментарий');
        }

        return $this->redirect(app()->request->referrer);
    }

    public function actionUpdate(int $id)
    {
        $model = $this->commentService->getOne($id);

        if ($model->load(post()) && $model->validate() && $model->save()) {
            app('session')->setFlash('success', 'Комментарий успешно сохранен');
            return $this->redirect('');
        }

        if ($model->hasErrors()) {
            app('session')->setFlash('error', 'Ошибки при сохранении');
        }


        return $this->render('update', compact('model'));
    }

    public function actionView(int $id)
    {
        $model = $this->commentService->getOne($id);
        $subject = $this->subjectService->getSubject($model->subject_id, $model->subject);

        return $this->render('view', compact('model', 'subject'));
    }
}