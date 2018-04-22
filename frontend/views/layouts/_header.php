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
<div class="preloader-wrapper" id="preloader">
	<div class="motion-line dark-big"></div>
	<div class="motion-line yellow-big"></div>
	<div class="motion-line dark-small"></div>
	<div class="motion-line yellow-normal"></div>
	<div class="motion-line yellow-small1"></div>
	<div class="motion-line yellow-small2"></div>
</div>
<div class="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12 hidden-sm hidden-xs">
                <div class="top-contacts">
                    <ul class="socials">
						<?php
							$headerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HEADER])->all();
							$headerOptions = [];
							foreach($headerOptionModels as $model){
								$headerOptions[$model->name] = $model;
							}
							$facebook = $headerOptions['facebook']['value'];
							$twitter = $headerOptions['twitter']['value'];
							$gplus = $headerOptions['gplus']['value'];
							$pinterest = $headerOptions['pinterest']['value'];
							$instagram = $headerOptions['instagram']['value'];
							$header_phone = $headerOptions['header_phone']['value'];
							$header_email = $headerOptions['header_email']['value'];
							$menu_bar_logo = $headerOptions['menu_bar_logo'];
							if($menu_bar_logo->media){
								$logoUrl = MediaHelper::getImageUrl($menu_bar_logo->media->file_name);
							}else{
								$logoUrl = $baseUrl.'/images/logo.png';
							}
						?>
                        <li><a href="<?= $facebook;?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="<?= $twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="<?= $gplus;?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        <li><a href="<?= $pinterest;?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="<?= $instagram;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="contacts">
                        <li class="phone"><a href="tel:<?= $header_phone;?>"><i class="fa fa-phone-square" aria-hidden="true"></i><?= $header_phone;?></a></li>
                        <li class="skype"><a href="mailto:<?= $header_email;?>"><i class="fa fa-envelope" aria-hidden="true"></i><?= $header_email;?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

    <!--MAIN MENU WRAP BEGIN-->
<div class="main-menu-wrap sticky-menu">
    <div class="container">
        <a href="<?= $urlManager->createAbsoluteUrl(['site/index'])?>" class="custom-logo-link"><img src="<?= ($logoUrl?$logoUrl:'/images/soccer/logo.png');?>" alt="logo" class="custom-logo"></a>
		<?php
			NavBar::begin([
				// 'brandLabel' => Yii::$app->name,
				// 'brandUrl' => Yii::$app->homeUrl,
				'renderInnerContainer' => false,
				'containerOptions' => [
					'id' => 'team-menu',
				],
				'options' => [
					'class' => 'navbar',
				],
			]);
			$menuItems = [
				[
					'label' => '<span>Home</span>', 'url' => ['/site/index'], 'encode' => false,
				],
				['label' => '<span>Matches</span>', 'url' => ['/match/index'], 'encode' => false, 
					'items' => [
						['label' => '<span>Tournaments</span>', 'url' => ['/tournament/index'], 'encode' => false],
						['label' => '<span>All</span>', 'url' => ['/match/index'], 'encode' => false],
					]],
				['label' => '<span>Teams</span>', 'url' => ['/team/index'], 'encode' => false],
				['label' => '<span>News</span>', 'url' => ['/news/index'], 'encode' => false],
				['label' => '<span>Events</span>', 'url' => ['/event/index'], 'encode' => false],
				['label' => '<span>Gallery</span>', 'url' => ['/site/gallery'], 'encode' => false],
				['label' => '<span>Contact</span>', 'url' => ['/site/contact'], 'encode' => false],
			];
			if (Yii::$app->user->isGuest) {
				$menuItems[] = ['label' => '<span>Register</span>', 'url' => ['/site/signup'], 'encode' => false];
				$menuItems[] = ['label' => '<span>Login</span>', 'url' => ['/site/login'], 'encode' => false];
			} else {
				$menuItems[] = '<li>'
					. Html::beginForm(['/site/logout'], 'post')
					. Html::submitButton(
						'<span>Logout (' . Yii::$app->user->identity->username . ')</span>',
						['class' => 'btn btn-link logout']
					)
					. Html::endForm()
					. '</li>';
			}
			echo Nav::widget([
				'options' => ['class' => 'main-menu nav'],
				'items' => $menuItems,
			]);
			NavBar::end();
		?>
    </div>
</div>
<!--MAIN MENU WRAP END-->