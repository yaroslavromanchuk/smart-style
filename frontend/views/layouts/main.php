<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\GMenu;
use frontend\widgets\Header;
use frontend\widgets\Footer;
use frontend\widgets\TopMenu;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?= Yii::$app->language ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/images/fav-icon.png">
    <title><?= Html::encode($this->title) ?>  ➦ Smart-style Гарантія якості ☑ Найкраща ціна $</title>
    <?php $this->head() ?>
</head>
<body class="<?php if($this->body_class){ echo $this->body_class; }else{ echo 'page full-width'; } ?> ">
    <?=$this->beginBody()?>
    <div class="hfeed site" id="page">
        
<!--top-menu--><?=TopMenu::widget()?>
<!---header--><?=Header::widget()?><!---header-->  
<!--menu--><?=GMenu::widget()?><!--menu-->
<div class="site-content" id="content" tabindex="-1" >
<div class="container">

            <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],])?>
            <?=Alert::widget()?>
            <?php  echo $content ?>
</div>
</div>
<!--footer--><?=Footer::widget()?><!--footer-->
</div><!-- #page -->
<a id="scrollUp" href="#top" style="position: fixed; z-index: 1001;bottom: 6.25rem;" ><i class="fa fa-angle-up"></i></a>
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
