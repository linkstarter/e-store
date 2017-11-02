<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\GoodsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'g_id') ?>

    <?= $form->field($model, 'g_name') ?>

    <?= $form->field($model, 'g_thumb') ?>

    <?= $form->field($model, 'g_status') ?>

    <?= $form->field($model, 'g_price') ?>

    <?php // echo $form->field($model, 'g_type') ?>

    <?php // echo $form->field($model, 'g_description') ?>

    <?php // echo $form->field($model, 'g_masterid') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <?php // echo $form->field($model, 'update_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
