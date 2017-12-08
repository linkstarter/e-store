<?php

/* @var $this yii\web\View */
use yii\widgets\ListView;
use yii\grid\GridView;
use yii\helpers\Url;
$this->title = '漫商城';
?>
<div class="search-box">
	<div class="row">
		<div class="col-lg-6 col-lg-offset-3">
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Search for...">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button">Go!</button>
				</span>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
	</div><!-- /.row -->
</div>
<div class="content-box">
	<ul class="nav nav-tabs">
		<li role="presentation" class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
				全部商品分类<span class="caret"></span>
			</a>
			<ul class="dropdown-menu">
				<li role="presentation"><a href="#">图书音像</a></li>
				<li role="separator" class="divider"></li>
				<li role="presentation"><a href="#">手办</a></li>
				<li role="separator" class="divider"></li>
				<li role="presentation"><a href="#">服饰鞋帽</a></li>
				<li role="separator" class="divider"></li>
				<li role="presentation"><a href="#">卡通箱包</a></li>
			</ul>
		</li>
		<li role="presentation"><a href="#">新品预售</a></li>
		<li role="presentation"><a href="#">限时特价</a></li>
	</ul>

	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="<?= yii::$app->params['domain']?>uploads/timg.jpg" alt="...">
				<div class="carousel-caption">
					<h3>Galaxy BlackShooter</h3>
					<p>The most beautiful girl</p>
				</div>
			</div>
			<div class="item">
				<img src="<?= yii::$app->params['domain']?>uploads/timg.jpg" alt="...">
				<div class="carousel-caption">
					<h3>Galaxy BlackShooter</h3>
					<p>The most beautiful girl</p>
				</div>
			</div>
			<div class="item">
				<img src="<?= yii::$app->params['domain']?>uploads/timg.jpg" alt="...">
				<div class="carousel-caption">
					<h3>Galaxy BlackShooter</h3>
					<p>The most beautiful girl</p>
				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<?php foreach($category as $category_key => $category_value)
	{
	?>
		<h3><?= $category_value['name']?></h3>

		<div class="row">
			<?php foreach($model as $model_key => $model_value)
			{
				if($model_value['g_type'] == $category_value['id']){
			?>
				<a href="<?= Url::to(['detail', 'id' => $model_value['g_id']])?>">
					<div class="col-md-3">
						<img src="<?= yii::$app->params['domain']?><?= $model_value['g_thumb']?>">
						<h3><?= $model_value['g_name']?></h3>
						<span>$<?= $model_value['g_price']?></span>
					</div>
				</a>
			<?php 
				}
			}
			?>
		</div>
	<?php } ?>
	

</div>






