<?php
/** @var \yii\data\ActiveDataProvider $dataProvider */
/** @var \app\models\search\CommentSearch $searchModel */

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider'  => $dataProvider,
    'filterModel'   => $searchModel,
    'columns'       => [
        [
            'attribute' => 'create_time',
            'format'    => 'date',
            'filter'    => ''
        ]
    ],
]);
