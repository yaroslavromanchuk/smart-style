<?php
use yii\helpers\Html; 
use frontend\widgets\WLang;
use yii\helpers\Url;
?>
<div class="top-bar">
    <div class="container">
		<nav>
			<ul id="menu-top-bar-left" class="nav nav-inline pull-left animate-dropdown flip">
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>'#',  'title'=>Yii::t('app', 'Автомобілі з пробігом')]).Yii::t('app', 'Автомобілі з пробігом').Html::endTag('a')?>
                                </li>
			</ul>
		</nav>
		<nav>
			<ul id="menu-top-bar-right" class="nav nav-inline pull-right animate-dropdown flip">
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/contacts/index'),  'title'=>Yii::t('app', 'Адреса')]).'<i class="ec ec-transport"></i>'.Yii::t('app', 'Адреса').Html::endTag('a')?>
                                </li>
				<!--<li class="menu-item animate-dropdown"><a title="Track Your Order" href="index.php?page=track-your-order"><i class="ec ec-transport"></i>Track Your Order</a></li>-->
				<li class="menu-item animate-dropdown">
                                    <?=Html::beginTag('a', ['href'=>Url::toRoute('/cars/index'),  'title'=>Yii::t('app', 'Каталог авто')]).'<i class="ec ec-shopping-bag"></i>'.Yii::t('app', 'Каталог авто').Html::endTag('a')?>
                                </li>
                                <li  class="menu-item menu-item-has-children animate-dropdown dropdown">
                                    <?=WLang::widget()?>
                                </li>
				<!--<li class="menu-item animate-dropdown"><a title="My Account" href="index.php?page=login-and-register"><i class="ec ec-user"></i>My Account</a></li>-->
			</ul>
		</nav>
    </div>
</div>