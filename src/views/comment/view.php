<?php
/**
 * @var \app\models\forms\CommentForm $model
 * @var \app\models\subjects\Subject $subject
 */

use yii\widgets\DetailView;
use app\models\forms\CommentForm;
use yii\helpers\Html;


echo DetailView::widget([
    'model' => $model,
    'attributes'    => [
        ...array_keys($model->attributes),
        [
            'label' => 'Название субьекта',
            'value' => fn() => Html::encode($subject->subjectName()),
        ],
        [
            'label' => 'Описание субъекта',
            'value' => fn() => Html::encode($subject->subjectInfo()),
        ]
    ]
]);