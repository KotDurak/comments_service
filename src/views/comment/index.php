<?php
/** @var \yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\search\CommentSearch $searchModel */

use app\widgets\DateFilter;
use yii\grid\GridView;
use app\models\Comment;
use yii\helpers\StringHelper;
use yii\helpers\Html;
use app\models\subjects\Subject;
use app\helpers\SubjectHelper;

echo GridView::widget([
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'pager'        => [
        'class' => \yii\bootstrap5\LinkPager::class,
    ],
    'columns'       => [
        [
            'attribute' => 'subject',
            'filter'    => Html::activeDropDownList(
                $searchModel,
                'subject',
                SubjectHelper::getTypes(),
                ['prompt' => 'all']
            )
        ],
        [
            'attribute' => 'subject_id',
        ],
        [
            'attribute' => 'username',
        ],
        [
            'attribute' => 'comment',
            'value'     => function(Comment $model) {
                return StringHelper::truncate($model->comment, 150,'...');
            }
        ],
        [
            'attribute' => 'create_time',
            'format'    => 'date',
            'filter'    => DateFilter::widget([
                'model' => $searchModel,
                'from'  => 'date_from',
                'to'    => 'date_to',
            ]),
        ],
        [
            'class' => \yii\grid\ActionColumn::class,
            'template'  => '{view} {update}',
        ]
    ],
]);
