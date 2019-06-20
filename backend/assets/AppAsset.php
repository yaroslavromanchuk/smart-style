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
  //  public $sourcePath = '@vendor/almasaeed2010/adminlte/dist';
    public $css = [
      //  'css/site.css',
        'css/AdminLTE.min.css',
        'css/skin-black.min.css',
    ];
    public $js = [
         'js/adminlte.min.js'
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
         'yii\bootstrap\BootstrapPluginAsset',
    ];
}
