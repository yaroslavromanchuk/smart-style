<?php
use yii\helpers\Html; 
use frontend\widgets\WLang;
use yii\helpers\Url;
?>
<nav class="top-bar navbar navbar-full">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top_men" aria-expanded="false"><span class="sr-only">Toggle navigation</span>
<span class="icon-bar" style="background-color: red;"></span>
<span class="icon-bar" style="background-color: red;"></span>
<span class="icon-bar" style="background-color: red;"></span></button></div>
<div class="navbar-collapse collapse" id="top_men">
    <ul id="menu-top-bar-left" class="nav navbar-nav nav-inline pull-left animate-dropdown flip hidden-xs hidden-sm ">
				<!--<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>'#',  'title'=>Yii::t('app', 'Автомобілі з пробігом')]).Yii::t('app', 'Автомобілі з пробігом').Html::endTag('a')?>
                                </li>-->
                                <li class="menu-item animate-dropdown">
                                    <a href="tel:+3800445003355" rel="nofollow">+38 (044) 500-33-55</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a href="mailto:hello@smart-style.com.ua">hello@smart-style.com.ua</a>
                                </li>
    </ul>
    <ul id="menu-top-bar-right" class="nav navbar-nav nav-inline pull-right animate-dropdown flip hidden-xs hidden-sm ">
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/contacts/index'),  'title'=>Yii::t('app', 'Адреса')]).'<i class="ec ec-transport"></i>'.Yii::t('app', 'Адреса').Html::endTag('a')?>
                                </li>
				<!--<li class="menu-item animate-dropdown"><a title="Track Your Order" href="index.php?page=track-your-order"><i class="ec ec-transport"></i>Track Your Order</a></li>-->
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/cars/index'),  'title'=>Yii::t('app', 'Каталог авто')]).'<i class="ec ec-shopping-bag"></i>'.Yii::t('app', 'Каталог авто').Html::endTag('a')?>
                                </li>
                                <li  class="menu-item animate-dropdown">
                                      <?=Html::beginTag('a', ['href'=>'#', 'rel'=>'nofollow', 'title'=>Yii::t('app', 'Lang')]).WLang::widget().Html::endTag('a')?>
                                    
                                </li>
				<!--<li class="menu-item animate-dropdown"><a title="My Account" href="index.php?page=login-and-register"><i class="ec ec-user"></i>My Account</a></li>-->
    </ul>
    <ul class="nav navbar-nav animate-dropdown flip hidden-md hidden-lg">
      <li class="menu-item animate-dropdown">
                                    <a href="tel:+3800445003355" rel="nofollow">+38 (044) 500-33-55</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <a href="mailto:hello@smart-style.com.ua">hello@smart-style.com.ua</a>
                                </li>
                                <li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/contacts/index'),  'title'=>Yii::t('app', 'Адреса')]).'<i class="ec ec-transport"></i>'.Yii::t('app', 'Адреса').Html::endTag('a')?>
                                </li>
				<!--<li class="menu-item animate-dropdown"><a title="Track Your Order" href="index.php?page=track-your-order"><i class="ec ec-transport"></i>Track Your Order</a></li>-->
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/cars/index'),  'title'=>Yii::t('app', 'Каталог авто')]).'<i class="ec ec-shopping-bag"></i>'.Yii::t('app', 'Каталог авто').Html::endTag('a')?>
                                </li>
                                <li  class="menu-item animate-dropdown">
                                      <?=Html::beginTag('a', ['href'=>'#', 'rel'=>'nofollow', 'title'=>Yii::t('app', 'Lang')]).WLang::widget().Html::endTag('a')?>
                                    
        </li>
    </ul>
</div>
    </div>
</nav>