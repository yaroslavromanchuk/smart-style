<?php
use yii\helpers\Html; 
use yii\helpers\Url;

?>
<header id="masthead" class="site-header header-v3">
    <div class="container">
        <div class="row">
<div class="header-logo">
                <a href="<?=Yii::$app->homeUrl?>" class="header-logo-link">
                    <img class="logo" src="/images/logo.png">
                </a>
        </div>
<?=Html::beginForm(['/search/'], 'get',['class'=>'navbar-search'])?>
   <label class="sr-only screen-reader-text" for="search">Пошук в:</label>
	<div class="input-group">
		<input type="text" id="search" class="form-control search-field" dir="ltr" value="" style="height: 100%" name="s" placeholder="<?=Yii::t('app', 'Пошук авто')?>" />
		<div class="input-group-addon search-categories">
			<select name='product_cat' id='product_cat' class='postform resizeselect' >
				<option value='0' selected='selected'><?=Yii::t('app', 'Всі марки')?></option>
                                <?php if($marks){
                                    foreach ($marks as $m) { ?>
                                <option class="level-<?=$m->id?>" value="<?=$m->id?>"><?=$m->name?></option>
                                <?php }
                                } ?>
			</select>
		</div>
		<div class="input-group-btn">
			<input type="hidden" id="search-param" name="post_type" value="mark" />
                        <?=Html::submitButton(
                '<i class="ec ec-search"></i>',
                ['class' => 'btn btn-secondary']
            )?>
		</div>
	</div>        
<?=Html::endForm()?>
<ul class="navbar-wishlist nav navbar-nav pull-right flip">
	<li class="nav-item"><?=Html::beginTag('a', ['href'=>Url::toRoute('/wishlist/index/'), 'class'=>'nav-link']).'<i class="ec ec-favorites"></i>'.Html::endTag('a')?></li>
</ul>
<ul class="navbar-compare nav navbar-nav pull-right flip">
	<li class="nav-item"><?=Html::beginTag('a', ['href'=>Url::toRoute('/compare/index/'), 'class'=>'nav-link']).'<i class="ec ec-compare"></i>'.Html::endTag('a')?></li>
</ul>
        </div>
    </div>
</header><!-- #masthead --> 