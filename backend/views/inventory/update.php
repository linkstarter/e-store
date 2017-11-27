<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Inventory */

$this->title = '更新: ' . $model->g->g_name;
$this->params['breadcrumbs'][] = ['label' => '仓库', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
