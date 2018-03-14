<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
		'css/style.css',
		'css/pages/dashboard.css',
		'css/font-awesome.css',
        'css/site.css',
    ];
    public $js = [
		'js/excanvas.min.js',
		'js/chart.min.js',
		'js/full-calendar/fullcalendar.min.js',
		'js/base.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
