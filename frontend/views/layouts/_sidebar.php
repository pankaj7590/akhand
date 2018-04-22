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
							
$footerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_FOOTER])->all();
$footerOptions = [];
foreach($footerOptionModels as $themeOption){
	$footerOptions[$themeOption->name] = $themeOption;
}
$footer_contact_address = $footerOptions['footer_contact_address']['value'];
$footer_contact_email = $footerOptions['footer_contact_email']['value'];
$footer_contact_phone = $footerOptions['footer_contact_phone']['value'];

$headerOptionModels = Setting::find()->where(['setting_group' => Setting::GROUP_HEADER])->all();
$headerOptions = [];
foreach($headerOptionModels as $themeOption){
	$headerOptions[$themeOption->name] = $themeOption;
}
$facebook = $headerOptions['facebook']['value'];
$twitter = $headerOptions['twitter']['value'];
$gplus = $headerOptions['gplus']['value'];
$pinterest = $headerOptions['pinterest']['value'];
$instagram = $headerOptions['instagram']['value'];
?>

                <h4>Head office</h4>
                <ul class="contact-list">
                    <li><i class="fa fa-flag" aria-hidden="true"></i><span><?= $footer_contact_address;?></span></li>
                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="mailto:<?= $footer_contact_email;?>"><?= $footer_contact_email;?></a></li>
                    <li class="phone"><i class="fa fa-phone" aria-hidden="true"></i><span><?= $footer_contact_phone;?></span></li>
                </ul>
                <ul class="contact-bar">
                    <li class="facebook"><a href="<?= $facebook;?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                    <li class="twitter"><a href="<?= $twitter;?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li class="google"><a href="<?= $gplus;?>"><i class="fa fa-google" aria-hidden="true"></i></a></li>
                    <li class="instagram"><a href="<?= $instagram;?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li class="pinterest"><a href="<?= $pinterest;?>"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                </ul>