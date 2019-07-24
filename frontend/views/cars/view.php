<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model frontend\models\Cars */
//use yii\helpers\Url;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Каталог авто'), 'url' => ['cars/index']];
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('css/cars-list.css', ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->registerJsFile('js/jquery.min.js', ['depends' => [yii\web\JqueryAsset::className()]]); 
\yii\web\YiiAsset::register($this);
?>

<div id="primary" class="content-area">
			<main id="main" class="site-main">		
				<div class="product">
					<div class="single-product-wrapper">
						<div class="product-images-wrapper">
							<!--<span class="onsale">Sale!</span>-->
                                             <?=$this->render('cart/_images-block', ['model' => $model])?>
						</div><!-- /.product-images-wrapper -->
                    <?=$this->render('cart/_single-product-summary', ['model' => $model, 'title' => Html::encode($this->title)])?>
					</div><!-- /.single-product-wrapper -->
	<?=$this->render('cart/_description', ['model' => $model])?>
                                        <?php if(count($recommended)){ ?><section class="section-product-cards-carousel">
		<header>
			<h2 class="h1"><?=Yii::t('app', 'Автомобілі які можуть Вас зацікавити')?></h2>
			<div class="owl-nav">
                            <a href="#products-carousel-prev"  data-target="#recommended-product" class="slider-prev"><i class="fa fa-angle-left"></i></a>
                            <a href="#products-carousel-next" data-target="#recommended-product" class="slider-next"><i class="fa fa-angle-right"></i></a>
			</div>
		</header>
                <div id="recommended-product" class="recommended-product">
			<div class="woocommerce columns-4 card-car" style="margin-top: 10px">
				<div class="products owl-carousel products-carousel columns-4">
                                    <?php foreach ($recommended as $t) {
                                         echo $this->render('_product-grid', ['model' => $t]);  
                                       } ?>
				</div>
			</div>
		</div>
    </section>
            <?php } ?>
				</div><!-- /.product -->
			</main><!-- /.site-main -->
		</div><!-- /.content-area -->         
<?php
$script = <<< JS
        $(document).ready(function () {
            $('.thumbnails-single .owl-stage').lightGallery();
        });
JS;


$this->registerJsFile('/js/gallery/lightgallery.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJs($script, yii\web\View::POS_READY);