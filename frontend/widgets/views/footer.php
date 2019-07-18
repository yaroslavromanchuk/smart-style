<?php
use yii\helpers\Html; 
use yii\helpers\Url;
if($recommended and $akciya and $top){
    $calss = 'col-xs-12 col-md-6 col-lg-4';
}elseif(($recommended and $top) or ($top and $akciya) or ($recommended and $akciya)){
    $calss = 'col-xs-12 col-md-6 col-lg-6';
}else{
    $calss = 'col-xs-12';
}
?>
 <footer id="colophon" class="site-footer">
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
                             <?php if($recommended){ ?>
				<div class="<?=$calss?>">
					<aside class="widget clearfix">
						<div class="body">
							<h4 class="widget-title"><?=Yii::t('app', 'Рекомендовані')?></h4>
							<ul class="product_list_widget">
                                                          <?php foreach ($recommended as $r) {
                                                              $name = $r->brand->name.' '.$r->model->name.' '.$r->year;
                                                              ?>
                                                                 <li>
                                                                     <a href="<?=Url::toRoute(['cars/view', 'id' => $r->id])?>" title="<?=$name?>">
										<img class="wp-post-image" data-echo="<?=$r->getImages(180)?>" src="/images/blank.gif" alt="">
										<span class="product-title"><?=$name?></span>
									</a>
									<span class="electro-price"><span class="amount"><?=number_format($r->price, 0, ',', ' ').' '.$r->currency->symbol?></span></span>
								</li>   
                                                               <?php } ?> 
							</ul>
						</div>
					</aside>
				</div>
                             <?php }
                             if($akciya){ ?>
				<div class="<?=$calss?>">
					<aside class="widget clearfix">
						<div class="body"><h4 class="widget-title"><?=Yii::t('app', 'Акційні авто')?></h4>
							<ul class="product_list_widget">
								<?php foreach ($akciya as $r) {
                                                              $name = $r->brand->name.' '.$r->model->name.' '.$r->year;
                                                              ?>
                                                                 <li>
                                                                     <a href="<?=Url::toRoute(['cars/view', 'id' => $r->id])?>" title="<?=$name?>">
										<img class="wp-post-image" data-echo="<?=$r->getImages(180)?>" src="/images/blank.gif" alt="">
										<span class="product-title"><?=$name?></span>
									</a>
									<span class="electro-price">
                                                                            <ins><span class="amount"><?=number_format($r->price, 0, ',', ' ').' '.$r->currency->symbol?></span></ins>
                                                                            <del><span class="amount"><?=number_format($r->old_price, 0, ',', ' ').' '.$r->currency->symbol?></span></del>
                                                                        </span>
								</li>   
                                                               <?php } ?>
							</ul>
						</div>
					</aside>
				</div>
                             <?php }
                              if($top){ ?>
				<div class="<?=$calss?>">
					<aside class="widget clearfix">
						<div class="body">
							<h4 class="widget-title"><?=Yii::t('app', 'Популярні')?></h4>
							<ul class="product_list_widget">
								<?php foreach ($top as $r) {
                                                              $name = $r->brand->name.' '.$r->model->name.' '.$r->year;
                                                              ?>
                                                                 <li>
                                                                     <a href="<?=Url::toRoute(['cars/view', 'id' => $r->id])?>" title="<?=$name?>">
										<img class="wp-post-image" data-echo="<?=$r->getImages(180)?>" src="/images/blank.gif" alt="">
										<span class="product-title"><?=$name?></span>
									</a>
									<span class="electro-price"><span class="amount"><?=number_format($r->price, 0, ',', ' ').' '.$r->currency->symbol?></span></span>
								</li>   
                                                               <?php } ?>
							</ul>
						</div>
					</aside>
				</div>
                             <?php } ?>
			</div>
		</div>
	</div>
<?=common\widgets\SubscriptionWidget::widget()?>
	<div class="footer-bottom-widgets">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 col-md-push-5">
					<?php if(count($f_menu_1)){ ?><div class="columns">
						<aside id="nav_menu-2" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title"><?=Yii::t('app', 'Швидкий доступ')?></h4>
								<div class="menu-footer-menu-1-container">
									<ul id="menu-footer-menu-1" class="menu">
										<?php foreach ($f_menu_1 as $m1) {?>
                                                                            <li class="menu-item"><a href="<?=Url::toRoute($m1['url'])?>"><?=Yii::t('app', $m1['label'])?></a></li>
                                                                               <?php } ?>
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns --> <?php } ?>
                    <?php if(count($f_menu_2)){ ?>
					<div class="columns">
						<aside id="nav_menu-3" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title">&nbsp;</h4>
								<div class="menu-footer-menu-2-container">
									<ul id="menu-footer-menu-2" class="menu">
										 <?php foreach ($f_menu_2 as $m2) {?>
                                                                            <li class="menu-item"><a href="<?=Url::toRoute($m2['url'])?>"><?=Yii::t('app', $m2['label'])?></a></li>
                                                                               <?php } ?>
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns --><?php } ?>
                                        <?php if(count($f_menu_3)){ ?>
					<div class="columns">
						<aside id="nav_menu-4" class="widget clearfix widget_nav_menu">
							<div class="body">
								<h4 class="widget-title"><?=Yii::t('app', 'Послуги')?></h4>
								<div class="menu-footer-menu-3-container">
									<ul id="menu-footer-menu-3" class="menu">
                                                                            <?php foreach ($f_menu_3 as $m3) {?>
                                                                            <li class="menu-item"><a href="<?=Url::toRoute($m3['url'])?>"><?=Yii::t('app', $m3['label'])?></a></li>
                                                                               <?php } ?>
									</ul>
								</div>
							</div>
						</aside>
					</div><!-- /.columns -->
                                        <?php } ?>
				</div><!-- /.col -->
				<div class="footer-contact col-xs-12 col-sm-12 col-md-5 col-md-pull-7">
					<div class="footer-logo">
					<!--<img  src="/images/logo.png">-->
					<div class="footer-call-us">
						<div class="media">
							<span class="media-left call-us-icon media-middle"><i class="ec ec-support"></i></span>
							<div class="media-body">
								<span class="call-us-text"><?=Yii::t('app', 'Виникли питання? Телефонуйте нам')?> 10:00-19:00!</span>
								<span class="call-us-number">
                                                                    <a href="tel:+3800445003355" rel="nofollow">(044) 500 33 55</a><br>
                                                                    <a href="tel:+3800506885831" rel="nofollow">(050) 688-58-31</a><br>
                                                                    <a href="tel:+3800936885831" rel="nofollow">(093) 688-58-31</a><br>
                                                                </span>
							</div>
						</div>
					</div><!-- /.footer-call-us -->
					<div class="footer-address">
						<strong class="footer-address-title"><?=Yii::t('app', 'Контактна інформація')?></strong>
						<address><a href="https://goo.gl/maps/AKwSTthQqd62"><?=Yii::t('app', 'пр-т Перемоги, 34, Київ')?></a></address>
                                                <a href="mailto:hello@smart-style.com.ua">hello@smart-style.com.ua</a>
					</div><!-- /.footer-address -->
					<div class="footer-social-icons">
						<ul class="social-icons list-unstyled">
                                                    <li><a class="fa fa-facebook" href="<?=Yii::$app->params['facebook']?>"></a></li>
                                                    <li><a class="fa fa-instagram" href="<?=Yii::$app->params['instagram']?>"></a></li>
                                                    <li><a class="fa fa-youtube" href="<?=Yii::$app->params['youtube']?>"></a></li>
                                                    <li><a class="fa fa-rss" href="<?=Yii::$app->params['rss']?>"></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="copyright-bar">
		<div class="container">
			<div class="pull-left flip copyright"><?= date('Y') ?> &copy; "<?= Html::encode(Yii::$app->name) ?>" - <?=Yii::t('app', 'Всі права захищені')?></div>
			<div class="pull-right flip payment">
				<!--<div class="footer-payment-logo">
					<ul class="cash-card card-inline">
						<li class="card-item"><img src="assets/images/footer/payment-icon/1.png" alt="" width="52"></li>
						<li class="card-item"><img src="assets/images/footer/payment-icon/2.png" alt="" width="52"></li>
						<li class="card-item"><img src="assets/images/footer/payment-icon/3.png" alt="" width="52"></li>
						<li class="card-item"><img src="assets/images/footer/payment-icon/4.png" alt="" width="52"></li>
						<li class="card-item"><img src="assets/images/footer/payment-icon/5.png" alt="" width="52"></li>
					</ul>
				</div>--><!-- /.payment-methods -->
			</div>
		</div><!-- /.container -->
	</div><!-- /.copyright-bar -->
</footer><!-- #colophon -->

