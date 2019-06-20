<?php
use yii\helpers\Html; 
?>
 <footer id="colophon" class="site-footer">
	<div class="footer-widgets">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-xs-12">
					<aside class="widget clearfix">
						<div class="body">
							<h4 class="widget-title"><?=Yii::t('app', 'Рекомендовані')?></h4>
							<ul class="product_list_widget">
								<li>
									<a href="index.php?page=single-product" title="Tablet Thin EliteBook  Revolve 810 G6">
										<img class="wp-post-image" data-echo="/images/footer/1.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Tablet Thin EliteBook  Revolve 810 G6</span>
									</a>
									<span class="electro-price"><span class="amount">&#36;1,300.00</span></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Smartphone 6S 128GB LTE">
										<img class="wp-post-image" data-echo="/images/footer/2.jpg" src="/images/blank.gif" alt=""><span class="product-title">Smartphone 6S 128GB LTE</span>
									</a>
									<span class="electro-price"><span class="amount">&#36;780.00</span></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Smartphone 6S 64GB LTE">
										<img class="wp-post-image" data-echo="/images/footer/3.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Smartphone 6S 64GB LTE</span>
									</a>
									<span class="electro-price"><span class="amount">&#36;1,215.00</span></span>
								</li>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-12">
					<aside class="widget clearfix">
						<div class="body"><h4 class="widget-title"><?=Yii::t('app', 'Акційні авто')?></h4>
							<ul class="product_list_widget">
								<li>
									<a href="index.php?page=single-product" title="Notebook Black Spire V Nitro  VN7-591G">
										<img class="wp-post-image" data-echo="/images/footer/3.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
									</a>
									<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Tablet Red EliteBook  Revolve 810 G2">
										<img class="wp-post-image" data-echo="/images/footer/4.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Tablet Red EliteBook  Revolve 810 G2</span>
									</a>
									<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Widescreen 4K SUHD TV">
										<img class="wp-post-image" data-echo="/images/footer/5.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Widescreen 4K SUHD TV</span>
									</a>
									<span class="electro-price"><ins><span class="amount">&#36;2,999.00</span></ins> <del><span class="amount">&#36;3,299.00</span></del></span>
								</li>
							</ul>
						</div>
					</aside>
				</div>
				<div class="col-lg-4 col-md-4 col-xs-12">
					<aside class="widget clearfix">
						<div class="body">
							<h4 class="widget-title"><?=Yii::t('app', 'Популярні')?></h4>
							<ul class="product_list_widget">
								<li>
									<a href="index.php?page=single-product" title="Notebook Black Spire V Nitro  VN7-591G">
										<img class="wp-post-image" data-echo="/images/footer/6.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Notebook Black Spire V Nitro  VN7-591G</span>
									</a>
									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><ins><span class="amount">&#36;1,999.00</span></ins> <del><span class="amount">&#36;2,299.00</span></del></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Apple MacBook Pro MF841HN/A 13-inch Laptop">
										<img class="wp-post-image" data-echo="/images/footer/7.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Apple MacBook Pro MF841HN/A 13-inch Laptop</span>
									</a>
									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,800.00</span></span>
								</li>

								<li>
									<a href="index.php?page=single-product" title="Tablet White EliteBook Revolve  810 G2">
										<img class="wp-post-image" data-echo="/images/footer/2.jpg" src="/images/blank.gif" alt="">
										<span class="product-title">Tablet White EliteBook Revolve  810 G2</span>
									</a>
									<div class="star-rating" title="Rated 5 out of 5"><span style="width:100%"><strong class="rating">5</strong> out of 5</span></div>		<span class="electro-price"><span class="amount">&#36;1,999.00</span></span>
								</li>
							</ul>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>

	<div class="footer-newsletter">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-7">
					<h5 class="newsletter-title"><?=Yii::t('app', 'Підпишіться на наші новини')?></h5>
					<span class="newsletter-marketing-text"> ...<?=Yii::t('app', 'будьте разом із')?> <strong>Smart-style</strong></span>
				</div>
				<div class="col-xs-12 col-sm-5">
                                    <form action="/subscribe/on/" method="get">
						<div class="input-group">
                                                    <input type="email" class="form-control" name="email" required="true" style="height: 100%" placeholder="<?=Yii::t('app', 'Введіть email адресу')?>">
							<span class="input-group-btn">
                                                            <button class="btn btn-secondary" type="submit"><?=Yii::t('app', 'Підписатись')?></button>
							</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

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
                                                                            <li class="menu-item"><a href="<?=$m1['url']?>"><?=Yii::t('app', $m1['label'])?></a></li>
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
                                                                            <li class="menu-item"><a href="<?=$m2['url']?>"><?=Yii::t('app', $m2['label'])?></a></li>
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
                                                                            <li class="menu-item"><a href="<?=$m3['url']?>"><?=Yii::t('app', $m3['label'])?></a></li>
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
							<li><a class="fa fa-facebook" href="https://www.facebook.com/smart.style.ua/"></a></li>
							<li><a class="fa fa-instagram" href="http://www.instagram.com/smart.style.ua/"></a></li>
							<li><a class="fa fa-youtube" href="https://www.youtube.com/channel/UC03TmJgQ8P2DHGBmDtSvDBA"></a></li>
							<li><a class="fa fa-rss" href="#"></a></li>
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

