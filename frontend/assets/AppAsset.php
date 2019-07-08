<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,700italic,800,800italic,600italic,400italic,300italic',
        'css/font-awesome.min.css',
        'css/animate.min.css',
        'css/font-smart.css',
        'css/owl-carousel.css',
        'css/style.css',
        'css/colors/red.css'
        
    ];
    public $js = [
             //   'js/jquery.min.js',
        'js/tether.min.js',
        'js/bootstrap-hover-dropdown.min.js',
        'js/owl.carousel.min.js',
        'js/echo.min.js',
        'js/wow.min.js',
        'js/jquery.easing.min.js',
        'js/jquery.waypoints.min.js',
        'js/smart.js',
        
    ];
    public $depends = [
        'yii\web\YiiAsset',

        'yii\bootstrap\BootstrapAsset',
    ];
}
