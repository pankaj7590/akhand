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
<!--FOOTER BEGIN-->
<footer class="footer">
    <div class="wrapper-overfllow">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <div class="footer-left">
                        <div class="wrap">
                            <a href="index-2.html" class="foot-logo"><img src="<?= $baseUrl;?>/images/soccer/footer-logo.png" alt="footer-logo"></a>
                            <p>Activated charcoal trust fund ugh prism af, beard marfa air plant stumptown gastropub farm-to-table jianbing.</p>
                            <ul class="foot-left-menu">
                                <li><a href="staff.html">First team</a></li>
                                <li><a href="staff.html">Second team</a></li>
                                <li><a href="amateurs.html">Amateurs</a></li>
                                <li><a href="donations.html">Donation</a></li>
                                <li><a href="trophies.html">trophies</a></li>
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
                            <li><i class="fa fa-flag" aria-hidden="true"></i><span>276 Upper Parliament Street, Liverpool L8, Great Britain</span></li>
                            <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:team@email.com">team@email.com</a></li>
                            <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><span>+61 3 8376 6284</span></li>
                        </ul>
                        <ul class="socials">
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
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
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['site/matches']);?>"><span>Matches</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['site/staff']);?>"><span>Team</span></a></li>
                        <li><a href="<?= $urlManager->createAbsoluteUrl(['site/news']);?>"><span>News</span></a></li>
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
                        &copy; <?= date('Y') ?> <?= Html::encode(Yii::$app->name) ?>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="created">
                        <a href="http://salokhe.in">Developed by <img src="<?= $baseUrl;?>/images/common/created-icon.png" alt="create-by-image"> Pankaj Salokhe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER END-->