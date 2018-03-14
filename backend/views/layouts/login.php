<?php
/* @var $this \yii\web\View */
/* @var $content string */
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<title><?= Html::encode($this->title) ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes"> 
		<?php $this->head() ?>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<link href="css/pages/signin.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<?php $this->beginBody() ?>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">
						<?= Yii::$app->name;?>
					</a>
					<div class="nav-collapse">				
					</div><!--/.nav-collapse -->
				</div> <!-- /container -->
			</div> <!-- /navbar-inner -->
		</div> <!-- /navbar -->
		<div class="account-container">
			<div class="content clearfix">
				<?= $content;?>
			</div> <!-- /content -->
		</div> <!-- /account-container -->
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>