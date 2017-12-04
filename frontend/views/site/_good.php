<?php 
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
		<img src="<?= yii::$app->params['domain']?><?= $model->g_thumb?>">
		<h4><?= $model->g_name?></h4>
