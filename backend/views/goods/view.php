<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */

$this->title = $model->g_id;
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->g_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->g_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'g_id',
            'g_name',
            'g_thumb',
            // 'g_status',
            [
                'attribute' => 'g_status',
                'value' =>$model->gStatus->name,
            ],
            'g_price',
            'g_type',
            'g_description:ntext',
            // 'g_masterid',
            [
                'attribute' => 'g_masterid',
                'value' => $model->gMaster->nickname,
            ],
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>
