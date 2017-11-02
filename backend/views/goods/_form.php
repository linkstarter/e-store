<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Goods */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="goods-form">

    <?php $form = ActiveForm::begin(
        ['options' => ['enctype' => 'multipart/form-data']]
        ); ?>

    <?= $form->field($model, 'g_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_thumb')->widget('manks\FileInput',[]) ?>

   <!--  <?= $form->field($model, 'g_status')->textInput() ?> -->

    <?= $form->field($model, 'g_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'g_type')->textInput() ?>

    <?= $form->field($model, 'g_description')->textarea(['rows' => 6]) ?>

    <!-- <?= $form->field($model, 'g_masterid')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <?= $form->field($model, 'update_at')->textInput() ?> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
