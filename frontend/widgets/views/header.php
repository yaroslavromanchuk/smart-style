<?php
use yii\helpers\Html; 
use yii\helpers\Url;
use \kartik\select2\Select2;
?>
<header id="masthead" class="site-header header-v3">
    <div class="container">
        <div class="row">
<div class="header-logo">
                <a href="<?=Yii::$app->homeUrl?>" class="header-logo-link">
                    <img class="logo" src="/images/logo.png">
                </a>
        </div>
<?=Html::beginForm(['cars/index'], 'get',['class'=>'navbar-search'])?>
   <label class="sr-only screen-reader-text" for="search">Пошук в:</label>
	<div class="input-group">
            <div class="input-group-addon search-categories">
<?=Select2::widget([
    'name' => 'CarsSearch[brand][]',                 
    'value' => 'Марка',
    'data' => $marks,
    'options' => ['multiple' => true, 'placeholder' => Yii::t('app', 'Пошук авто'), 'class' => 'form-control search-field']
])?>	
            </div>
		<div class="input-group-btn">
                        <?=Html::submitButton(
                '<i class="ec ec-search"></i>',
                ['class' => 'btn btn-secondary']
            )?>
		</div>
	</div>        
<?=Html::endForm()?>
   <!--
<ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item"><?=Html::beginTag('a', ['href'=>Url::toRoute('/wishlist/index/'), 'class'=>'nav-link']).'<i class="ec ec-favorites"></i>'.Html::endTag('a')?></li>
</ul>
<ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item"><?=Html::beginTag('a', ['href'=>Url::toRoute('/compare/index/'), 'class'=>'nav-link']).'<i class="ec ec-compare"></i>'.Html::endTag('a')?></li>
</ul>-->
   <div class="header-support-info hidden-xs">
	<div class="media">
		<span class="media-left support-icon media-middle"><i class="ec ec-support"></i></span>
		<div class="media-body">
			<span class="support-number"><b><a href="tel:+3800445003355" rel="nofollow">+38 (044) 500-33-55</a><br>
                                <a href="tel:+3800936885831" rel="nofollow">+38 (093) 688-58-31</a></b></span><br>
                                <span class="support-email"><a href="mailto:<?=Yii::$app->params['adminEmail']?>"><?=Yii::$app->params['adminEmail']?></a></span>
		</div>
	</div>
</div>
        </div>
    </div>
</header><!-- #masthead --> 