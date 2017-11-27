<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Goodsstatus;
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
        <?= Html::a('仓库', ['inventory/index'], ['class' => 'btn btn-success']) ?>
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
            // 'g_status',
            [
                'attribute' => 'g_status',
                'value' =>'gStatus.name',
                'filter' => Goodsstatus::find()
                            ->select(['name','id'])
                            ->orderBy('position')
                            ->indexBy('id')
                            ->column(),
                'contentOptions' => function($model){
                    return ($model->g_status == 1)?['class' => 'bg-danger']:['class' => 'bg-success'];
                }
            ],
            'g_price',
            // 'g_num',
            // 'g_type',
            // 'g_description:ntext',
            // 'g_masterid',
            // 'create_at',
            // 'update_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete} {approve}',
                'buttons' =>
                [
                    'approve' => function($url,$model,$key)
                    {
                        $options = [
                            'title' => yii::t('yii', '入库'),
                            'aria-label' => yii::t('yii', '入库'),
                            'data-confirm' => yii::t('yii', '你确定这件商品入库吗？'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-check"></span>',$url,$options);
                    }
                ],
            ],
        ],
    ]); ?>
</div>
