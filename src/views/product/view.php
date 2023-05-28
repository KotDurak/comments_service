<?php
use yii\helpers\Html;
use app\widgets\CommentForm;
?>

<div class="row">
    <div class="col-12">
        <div class="card text-dark bg-light">
            <div class="card-header">
                <?= Html::encode($model->name) ?>
            </div>
            <div class="card-body">
                Отзывы о продавце
            </div>
        </div>
        <div class="col-6">
            <?= CommentForm::widget(['subject' => $model]); ?>
        </div>
    </div>
