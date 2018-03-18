<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use backend\components\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\web\View;
use common\models\NewsEvent;
use common\components\SportTypes;

AppAsset::register($this);

$urlManager = Yii::$app->urlManager;
$baseUrl = $urlManager->baseUrl;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
	<head>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<?= Html::csrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<![endif]-->
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
			<a class="brand" href="<?= $urlManager->createAbsoluteUrl(['site/index']);?>"><?= Yii::$app->name;?></a>
			<?php if(!Yii::$app->user->isGuest){?>
				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> Account <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="javascript:;">Settings</a></li>
								<li><a href="javascript:;">Help</a></li>
							</ul>
						</li>
						<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user"></i> EGrappler.com <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="javascript:;">Profile</a></li>
								<li><a href="<?= $urlManager->createAbsoluteUrl(['site/logout']);?>" data-method="post">Logout</a></li>
							</ul>
						</li>
					</ul>
					<!--<form class="navbar-search pull-right">
						<input type="text" class="search-query" placeholder="Search">
					</form>-->
				</div>
				<!--/.nav-collapse --> 
			<?php }?>
		</div>
		<!-- /container --> 
	</div>
	<!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<?php if(!Yii::$app->user->isGuest){?>
	<div class="subnavbar">
			<?php
			NavBar::begin([
				// 'brandLabel' => Yii::$app->name,
				// 'brandUrl' => Yii::$app->homeUrl,
				'options' => [
					'class' => 'subnavbar-inner',
					'tag' => 'div',
				],
				// 'renderInnerContainer' => false,
			]);
			$menuItems = [
				['label' => '<i class="icon-home"></i><span>Home</span> ', 'url' => ['site/index'],],
				['label' => '<i class="icon-user"></i><span>Users</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['user/create']],
						['label' => 'Manage ', 'url' => ['user/index']],
					]
				],
				['label' => '<i class="icon-certificate"></i><span>Organizations</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['organization/create']],
						['label' => 'Manage ', 'url' => ['organization/index']],
					]
				],
				['label' => '<i class="icon-flag-checkered"></i><span>Tournaments</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['tournament/create']],
						['label' => 'Manage ', 'url' => ['tournament/index']],
					]
				],
				['label' => '<i class="icon-group"></i><span>Teams</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['team/create']],
						['label' => 'Manage ', 'url' => ['team/index']],
					]
				],
				['label' => '<i class="icon-folder-open"></i><span>Galleries</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['gallery/create']],
						['label' => 'Manage ', 'url' => ['gallery/index']],
					]
				],
				['label' => '<i class="icon-flag"></i><span>Matches</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New Badminton Match', 'url' => ['badminton-match/create']],
						['label' => 'Add New Ball Badminton Match', 'url' => ['ball-badminton-match/create']],
						['label' => 'Add New Cricket Match', 'url' => ['match/create']],
						['label' => 'Manage Badminton Matches', 'url' => ['badminton-match/index']],
						['label' => 'Manage Ball Badminton Matches', 'url' => ['ball-badminton-match/index']],
						['label' => 'Manage Cricket Matches', 'url' => ['match/index']],
					]
				],
				['label' => '<i class="icon-plus-sign"></i><span>Members</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['member/create']],
						['label' => 'Manage ', 'url' => ['member/index']],
					]
				],
				['label' => '<i class="icon-calendar"></i><span>News & Events</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New News', 'url' => ['news-event/create', 'type' => NewsEvent::TYPE_NEWS]],
						['label' => 'Manage News', 'url' => ['news-event/index', 'type' => NewsEvent::TYPE_NEWS]],
						['label' => 'Add New Event', 'url' => ['news-event/create', 'type' => NewsEvent::TYPE_EVENT]],
						['label' => 'Manage Event', 'url' => ['news-event/index', 'type' => NewsEvent::TYPE_EVENT]],
					]],
				['label' => '<i class="icon-rupee"></i><span>Payments</span> ', 'url' => ['payment/index']],
				['label' => '<i class="icon-gears"></i><span>Settings</span> ', 'url' => '#',
					'items' => [
						['label' => 'Add New ', 'url' => ['setting/create']],
						['label' => 'Manage ', 'url' => ['setting/index']],
					]
				],
				['label' => '<i class="icon-envelope"></i><span>Contacts</span> ', 'url' => ['contact/index']],
			];
			if (Yii::$app->user->isGuest) {
				$menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
			} else {
				/* $menuItems[] = '<li>'
					. Html::beginForm(['/site/logout'], 'post')
					. Html::submitButton(
						'Logout (' . Yii::$app->user->identity->username . ')',
						['class' => 'btn btn-link logout']
					)
					. Html::endForm()
					. '</li>'; */
			}
			echo Nav::widget([
				'options' => ['class' => 'mainnav'],
				'items' => $menuItems,
				'encodeLabels' => false,
				'activateParents' => true,
			]);
			NavBar::end();
			?>
		<!-- /subnavbar-inner --> 
	</div>
	<!-- /subnavbar -->
<?php }?>
<div class="main">
	<div class="main-inner">
		<div class="container">
			<div class="row">
				<div class="span12">
					<?= Breadcrumbs::widget([
						'itemTemplate' => "<li>{link}</li> / ",
						'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
					]) ?>
				</div>
			</div>
			<div class="row">
				<div class="span12">
					<?= Alert::widget() ?>
				</div>
			</div>
			<div class="row">
				<?= $content ?>
			</div>
			<!-- /row --> 
		</div>
		<!-- /container --> 
	</div>
	<!-- /main-inner --> 
</div>
<!-- /main -->
<?php if(!Yii::$app->user->isGuest){?>
	<div class="extra">
		<div class="extra-inner">
			<div class="container">
				<div class="row">
					<div class="span3">
						<h4>About Free Admin Template</h4>
						<ul>
							<li><a href="javascript:;">EGrappler.com</a></li>
							<li><a href="javascript:;">Web Development Resources</a></li>
							<li><a href="javascript:;">Responsive HTML5 Portfolio Templates</a></li>
							<li><a href="javascript:;">Free Resources and Scripts</a></li>
						</ul>
					</div>
					<!-- /span3 -->
					<div class="span3">
						<h4>Support</h4>
						<ul>
							<li><a href="javascript:;">Frequently Asked Questions</a></li>
							<li><a href="javascript:;">Ask a Question</a></li>
							<li><a href="javascript:;">Video Tutorial</a></li>
							<li><a href="javascript:;">Feedback</a></li>
						</ul>
					</div>
					<!-- /span3 -->
					<div class="span3">
						<h4>Something Legal</h4>
						<ul>
							<li><a href="javascript:;">Read License</a></li>
							<li><a href="javascript:;">Terms of Use</a></li>
							<li><a href="javascript:;">Privacy Policy</a></li>
						</ul>
					</div>
					<!-- /span3 -->
					<div class="span3">
						<h4>Open Source jQuery Plugins</h4>
						<ul>
							<li><a href="">Open Source jQuery Plugins</a></li>
							<li><a href="">HTML5 Responsive Tempaltes</a></li>
							<li><a href="">Free Contact Form Plugin</a></li>
							<li><a href="">Flat UI PSD</a></li>
						</ul>
					</div>
					<!-- /span3 -->
					<div class="span12 text-center"> &copy; <?= date('Y') ?> <a href="#"><?= Html::encode(Yii::$app->name) ?></a>. </div>
				</div>
				<!-- /row --> 
			</div>
			<!-- /container --> 
		</div>
		<!-- /extra-inner --> 
	</div>
<?php }?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>