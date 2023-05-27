<?php
/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 * @var \app\models\subjects\Seller $model
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
                <?= Html::a('Просмотр', ['/seller/view', 'id' => $model->id]) ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <div class="col-12 mt-2">
        <?= LinkPager::widget(['pagination' => $dataProvider->pagination]) ?>
    </div>

</div>
