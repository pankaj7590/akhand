<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
// echo "<pre>";print_r($exception);exit;
?>
<div class="span12">
	<div class="error-container">
		<h1><?= $exception->statusCode?></h1>
		<h2>Who! bad trip man. No more pixesl for you.</h2>
		<div class="error-details">
			Sorry, <?= nl2br(Html::encode($message)) ?>! Why not try going back to the <a href="<?= Yii::$app->urlManager->createAbsoluteUrl(['site/index']);?>">home page</a> or perhaps try following!
		</div> <!-- /error-details -->
		<div class="error-actions">
			<a href="<?= Yii::$app->request->referrer;?>" class="btn btn-large btn-primary">
				<i class="icon-chevron-left"></i>
				&nbsp;
				Back
			</a>
		</div> <!-- /error-actions -->
	</div> <!-- /error-container -->			
</div> <!-- /span12 -->
<?php
$this->registerCss("
	.main {
		padding-bottom: 2em;
		border-bottom: none!important;
	}
");
?>