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
<!DOCTYPE html >
<html lang="<?= Yii::$app->language ?>" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/images/fav-icon.png">
    <title><?= Html::encode($this->title) ?> | Smart-style</title>
    <?php $this->head() ?>
</head>
<body class="page <?php if(Yii::$app->controller->id == 'site'){echo 'home page-template-default'; }elseif(Yii::$app->controller->id == 'cars'){ echo 'left-sidebar';}else{ echo 'full-width'; } ?> ">
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
<?=$this->endBody()?>
</body>
</html>
<?=$this->endPage()?>
