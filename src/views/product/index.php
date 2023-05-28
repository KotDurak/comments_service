<?php
/**
 * @var \app\models\subjects\Product $model
 * @var \yii\data\ActiveDataProvider $dataProvider
 */
use yii\helpers\Html;
use yii\bootstrap5\LinkPager;
?>

<div class="row">
    <?php foreach ($dataProvider->models as $model): ?>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= Html::encode($model->name) ?></h5>
                    <?= Html::a('Просмотр', ['/product/view', 'id' => $model->id]) ?>
                    <p><?= Html::encode($model->description) ?></p>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="col-12 mt-2">
        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
    </div>

</div>