<?php

use app\helpers\SubjectHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Comment;
use kartik\datetime\DateTimePicker;

/** @var yii\web\View $this */
/** @var app\models\Comment $model */
/** @var ActiveForm $form */

\kartik\icons\FontAwesomeAsset::register($this);
?>
<div class="comment-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'subject')->dropDownList(SubjectHelper::getTypes()) ?>
    <?= $form->field($model, 'subject_id') ?>
    <?= $form->field($model, 'status')->dropDownList(Comment::STATUSES) ?>
    <?= $form->field($model, 'create_time')->widget(DateTimePicker::class, [
        'language'    => 'ru',
        'pluginOptions' => [
            'autoclose' => true
        ]
    ]) ?>
    <?= $form->field($model, 'comment')->textarea() ?>
    <?= $form->field($model, 'username') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>