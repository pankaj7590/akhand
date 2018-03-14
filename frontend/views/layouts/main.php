<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<link href="https://fonts.googleapis.com/css?family=Montserrat%7COpen+Sans:700,400%7CRaleway:400,800,900" rel="stylesheet" />
		<link rel="icon" href="favicon.ico" type="image/x-icon">
		<link href="<?= $baseUrl;?>/css/library/bootstrap.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<?php $this->beginBody() ?>
			<?= $this->render('_header');?>
			<section class="image-header">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<div class="info">
								<div class="wrap">
									<?= Breadcrumbs::widget([
										'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
										'options' => ['class' => 'breadcrumbs'],
										'itemTemplate' => '<li>{link}</li> / ',
									]) ?>
									<h1><?= $this->title;?></h1>
								</div>
							</div>
						</div>	
					</div>
				</div>
			</section>
			<!--BREADCRUMBS END-->
			<?= $content;?>
			<?= $this->render("_footer")?>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>