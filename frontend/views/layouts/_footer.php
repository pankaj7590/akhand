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
<!--FOOTER BEGIN-->
<footer class="footer">
    <div class="wrapper-overfllow">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="footer-left">
                        <div class="wrap">
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
								
								$footerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FOOTER])->all();
								$footerOptions = [];
								foreach($footerOptionModels as $model){
									$footerOptions[$model->name] = $model;
								}
								$footer_description = $footerOptions['footer_description']['value'];
								$footer_contact_address = $footerOptions['footer_contact_address']['value'];
								$footer_contact_email = $footerOptions['footer_contact_email']['value'];
								$footer_contact_phone = $footerOptions['footer_contact_phone']['value'];
								$footer_developer = $footerOptions['footer_developer']['value'];
								$footer_copyright = $footerOptions['footer_copyright']['value'];
								$footer_quick_links = [];
								for($i=1;$i<=6;$i++){
									$footer_quick_links[$footerOptions['footer_quick_link_'.$i.'_label']['value']] = $footerOptions['footer_quick_link_'.$i.'_link']['value'];
								}
							?>
                            <a href="<?= $urlManager->createAbsoluteUrl(['site/index'])?>" class="foot-logo"><img src="<?= ($logoUrl?$logoUrl:'/images/soccer/logo.png');?>" alt="footer-logo"></a>
                            <p><?= $footer_description;?></p>
                            <ul class="foot-left-menu">
								<?php foreach($footer_quick_links as $label => $link){?>
									<li><a href="<?= $link;?>"><?= $label;?></a></li>
								<?php }?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-lg-offset-1">
                    <div class="foot-news">
                        <h4>Recent news</h4>
                        <div class="item">
                            <a href="news.html" class="image"><img class="img-responsive" src="<?= $baseUrl;?>/images/soccer/foot-news-img.jpg" alt="news-image"></a>
                            <a href="news.html" class="name">When somersaulting Sanchez shouldered Mexico’s hopes</a>
                            <a href="news.html" class="date">25 Sep 2016</a>
                            <span class="separator">in</span>
                            <a href="news.html" class="category">Highlights</a>
                        </div>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 col-sm-12">
                    <div class="foot-contact">
                        <h4>Contact us</h4>
                        <ul class="contact-list">
                            <li><i class="fa fa-flag" aria-hidden="true"></i><span><?= $footer_contact_address;?></span></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?= $footer_contact_email;?>"><?= $footer_contact_email;?></a></li>
                            <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><a href="tel:<?= $footer_contact_phone;?>"><span><?= $footer_contact_phone;?></span></a></li>
                        </ul>
                        <ul class="socials">
                            <li><a href="<?= $facebook;?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $gplus;?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $pinterest;?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="<?= $instagram;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-menu-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="footer-menu">
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['site/index']);?>"><span>Home</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['match/index']);?>"><span>Matches</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['team/index']);?>"><span>Team</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['news/index']);?>"><span>News</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['event/index']);?>"><span>News</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['site/contact']);?>"><span>Contact</span></a></li>
						<?php if(Yii::$app->user->isGuest){?>
							<li><a href="<?= $urlManager->createAbsoluteUrl(['site/login']);?>"><span>Login</span></a></li>
							<li><a href="<?= $urlManager->createAbsoluteUrl(['site/signup']);?>"><span>Register</span></a></li>
						<?php }else{?>
							<li><a href="<?= $urlManager->createAbsoluteUrl(['site/logout']);?>" data-method="post"><span>Logout</span></a></li>
						<?php }?>
                    </ul>	
                    <a href="#top" class="foot-up"><span>up <i class="fa fa-caret-up" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="copyrights">
                        &copy; <?= date('Y') ?> <?= ($footer_copyright?$footer_copyright:Html::encode(Yii::$app->name)) ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="created">
                        <a href="#">Developed by <img src="<?= $baseUrl;?>/images/common/created-icon.png" alt="create-by-image"> <?= $footer_developer;?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER END-->