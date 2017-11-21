<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="row">
	<div class="col-md-4">
		<img src="<?= yii::$app->params['domain']?>/<?= $model->g_thumb?>">
		<h4><?= $model->g_name?></h4>
	</div>
</div>