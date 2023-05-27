<?php
/**
 * @var \app\models\Comment $model
 * @var \app\models\subjects\Subject $subject
*/

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
?>


<?php $form = ActiveForm::begin(['action' => '/comment/create']) ?>

<?= $form->field($model, 'username')->textInput() ?>

<?= $form->field($model, 'comment')->textarea() ?>

<?= $form->field($model, 'subject')->hiddenInput(['value' => $subject->getType()])->label(false) ?>

<?= $form->field($model, 'subject_id')->hiddenInput(['value' => $subject->primaryKey])->label(false) ?>

<div class="form-group">
    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end() ?>
