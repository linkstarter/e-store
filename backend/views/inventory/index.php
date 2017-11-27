<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\InventorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '仓库';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- <?= Html::a('Create Inventory', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'goods.g_name',
                'label' => '商品名称',
                'value' => 'g.g_name',
            ],
            // 'g_masterid',
            [
                'attribute' => 'g_masterid',
                'value' => 'gMaster.nickname',
            ],
            'inventory',
            'sales_volume',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
