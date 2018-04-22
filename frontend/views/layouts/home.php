<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Setting;
use common\models\Media;
use common\components\MediaHelper;

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
    
    <!-- 
    
    Enable one styles which the you want
    
    <link href="css-min/soccer.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/hockey.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/basketball.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/football.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/baseball.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/dota.min.css" rel="stylesheet" type="text/css" />
    <link href="css-min/csgo.min.css" rel="stylesheet" type="text/css" />
    
    All libraries included in this css, concating rules in /grunt/cssmin.js
    Use grunt default task for creating this files
    
    -->
</head>

<body>
	<?php $this->beginBody() ?>
	<?= $this->render('_header');?>
			<?= $content?>
			<?= $this->render("_footer")?>
		<?php $this->endBody() ?>
	</body>
</html>
<?php $this->endPage() ?>