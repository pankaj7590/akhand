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
            <div class="col-md-7 hidden-sm hidden-xs">
                <div class="top-contacts">
                    <ul class="socials">
                        <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="contacts">
                        <li class="phone"><i class="fa fa-phone-square" aria-hidden="true"></i>+61 3 8376 6284</li>
                        <li class="skype"><a href="callto:team.skype"><i class="fa fa-skype" aria-hidden="true"></i>team.skype</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-5">
                <div class="top-language">
                    <ul class="list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $baseUrl;?>/images/common/en-flag.png" alt="selected language">EN</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#"><img src="<?= $baseUrl;?>/images/common/fr-flag.png" alt="language">FR</a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?= $baseUrl;?>/images/common/en-flag.png" alt="language">EN</a>
                                </li>
                                <li>
                                    <a href="#"><img src="<?= $baseUrl;?>/images/common/ru-flag.png" alt="language">RU</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                    <div class="top-search">
                            <form>
                                    <input type="text" name="text">
                                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                    </div>

                    <div class="clear"></div>
            </div>
        </div>
    </div>
</div>

    <!--MAIN MENU WRAP BEGIN-->
<div class="main-menu-wrap sticky-menu">
    <div class="container">
        <a href="index-2.html" class="custom-logo-link"><img src="<?= $baseUrl;?>/images/soccer/logo.png" alt="logo" class="custom-logo"></a>
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
					'items' => [
						['label' => '<span>Home</span>', 'url' => ['/site/index'], 'encode' => false,],
					]
				],
				['label' => '<span>Matches</span>', 'url' => ['/site/matches'], 'encode' => false, 
					'items' => [
						['label' => '<span>Home</span>', 'url' => ['/site/index'], 'encode' => false, 
							'items' => [
								['label' => '<span>Home</span>', 'url' => ['/site/index'], 'encode' => false,],
							]
						],
					]],
				['label' => '<span>Team</span>', 'url' => ['/site/staff'], 'encode' => false],
				['label' => '<span>News</span>', 'url' => ['/site/news'], 'encode' => false],
				['label' => '<span>News Single</span>', 'url' => ['/site/news-single'], 'encode' => false],
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