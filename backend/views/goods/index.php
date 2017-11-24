<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\GoodsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '商品管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加商品', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => \yii\grid\CheckboxColumn::className(),
                'checkboxOptions' => function ($model, $key, $index, $column){
                    return ['value' => $model->g_id,'class' => 'checkbox'];
                }
            ],
            ['class' => 'yii\grid\SerialColumn'],

            'g_id',
            'g_name',
            'g_thumb',
            'g_status',
            'g_price',
            // 'g_num',
            // 'g_type',
            // 'g_description:ntext',
            // 'g_masterid',
            // 'create_at',
            // 'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
