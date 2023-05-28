<?php
/**
 * @var \yii\base\Model $model
 * @var string $from
 * @var string $to
 * @var array $options
*/

use yii\helpers\Html;
use kartik\datetime\DateTimePicker;
\kartik\icons\FontAwesomeAsset::register($this);

?>
<div class="d-flex flex-column">
    <div>
        <?= Html::activeLabel($model, $from) ?>
        <?= DateTimePicker::widget([
            'model' => $model,
            'attribute' => $from,
            ...$options,
        ]) ?>
    </div>
    <div>
        <?= Html::activeLabel($model, $to) ?>
        <?= DateTimePicker::widget([
            'model' => $model,
            'attribute' => $to,
            ...$options,
        ]); ?>
    </div>
</div>



