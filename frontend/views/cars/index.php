<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;


/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Cars');
$this->params['breadcrumbs'][] = $this->title;
?>


<div id="primary" class="content-area cars-index">
        <main id="main" class="site-main">

    <section class="section-product-cards-carousel" >
					<header>
						<h2 class="h1">Recommended Products</h2>
						<div class="owl-nav">
							<a href="#products-carousel-prev" data-target="#recommended-product" class="slider-prev"><i class="fa fa-angle-left"></i></a>
							<a href="#products-carousel-next" data-target="#recommended-product" class="slider-next"><i class="fa fa-angle-right"></i></a>
						</div>
					</header>

					<div id="recommended-product">
						<div class="woocommerce columns-4">
							<div class="products owl-carousel products-carousel columns-4 owl-loaded owl-drag">
								<?php //require 'inc/components/product-carousel-item.php'; ?>
							</div>
						</div>
					</div>
    </section>
    <header class="page-header">
					<h1 class="page-title"><?= Html::encode($this->title) ?></h1>
					<!--<p class="woocommerce-result-count">Showing 1&ndash;15 of 20 results</p>-->
				</header>
    <div class="shop-control-bar">
					<ul class="shop-view-switcher nav nav-tabs" role="tablist">
						<li class="nav-item"><a class="nav-link active" data-toggle="tab" title="Grid View" href="#grid"><i class="fa fa-th"></i></a></li>
						<li class="nav-item"><a class="nav-link " data-toggle="tab" title="Grid Extended View" href="#grid-extended"><i class="fa fa-align-justify"></i></a></li>
						<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View" href="#list-view"><i class="fa fa-list"></i></a></li>
						<li class="nav-item"><a class="nav-link " data-toggle="tab" title="List View Small" href="#list-view-small"><i class="fa fa-th-list"></i></a></li>
					</ul>
					<?php //require_once 'inc/components/shop-control-bar.php'; ?>
				</div>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        <?= Html::a(Yii::t('app', 'Create Cars'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'year',
            'price',
            'currency_id',
            'categories_id',
            //'brand_id',
            //'model_id',
            //'modification',
            //'body_id',
            //'mileage',
            //'region_id',
            //'city_id',
            //'image',
            //'damage',
            //'custom',
            //'VIN',
            //'gearbox_id',
            //'drive_id',
            //'fuel_id',
            //'consumption_route',
            //'consumption_city',
            //'consumption_combine',
            //'engine',
            //'power_hp',
            //'power_kw',
            //'color_id',
            //'metallic',
            //'post_auctions',
            //'video_key',
            //'description_ru',
            //'description_uk',
            //'doors',
            //'seats',
            //'country_id',
            //'spare_parts',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
        </main>
</div>
<div id="sidebar" class="sidebar" role="complementary">
    <?php echo $this->render('_product-filters-sidebar', ['model' => []]); ?>
			<?php //require_once 'inc/components/sidebar/product-categories-widget.php'; ?>
			<?php //require_once 'inc/components/sidebar/product-filters-sidebar.php'; ?>
			<?php //require_once 'inc/components/sidebar/home-v2/home-v2-ad-block.php'; ?>
			<?php //require_once 'inc/components/sidebar/home-v2/latest-products.php'; ?>
		</div>
