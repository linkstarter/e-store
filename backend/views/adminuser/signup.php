<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '添加新用户';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="site-signup">
	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

			<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'nickname')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'password_repeat')->passwordInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

			<?= $form->field($model, 'profile')->textarea(['rows' => 6]) ?>
			
			<div class="form-group">
				<?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
			</div>
			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>