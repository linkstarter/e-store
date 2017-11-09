<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\grid\GridView;
$this->title = 'Mirror电子商城';
?>
<?= ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_good',
]);?>