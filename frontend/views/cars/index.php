<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$view_grid = 'active';
$view_list = '';
 if(Yii::$app->request->cookies->has('view')) {
     switch (Yii::$app->request->cookies->getValue('view')){
         case 'grid':  $view_grid = 'active'; $view_list = ''; break;
         case 'list':  $view_grid = ''; $view_list = 'active'; break;
         default : $view_grid = 'active'; $view_list = ''; break;
     }
 }

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('css/cars-list.css'); 
?>
<header class="page-header">
	<h1 class="page-title"><?= Html::encode($this->title) ?></h1>
</header>
<?php Pjax::begin(); ?>  
<div id="primary" class="content-area cars-index">
        <main id="main" class="site-main">
            <section class="section-product-cards-carousel" style="display: none" >
		<header>
			<h2 class="h1"><?=Yii::t('app', 'Рекомендовані авто')?></h2>
			<div class="owl-nav">
                            <a href="#products-carousel-prev"  data-target="#recommended-product" class="slider-prev"><i class="fa fa-angle-left"></i></a>
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
   
    <div class="shop-control-bar">
	<ul class="shop-view-switcher nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link  <?=$view_grid?>" onclick="document.cookie = 'view=grid;'" data-toggle="tab" title="Grid View" href="#grid">
                    <i class="fa fa-th"></i>
                </a>
            </li>
            <li class="nav-item"><a class="nav-link <?=$view_list?>"  title="List View" data-toggle="tab" onclick="document.cookie = 'view=list;'" href="#list-view">
                    <i class="fa fa-list"></i>
                </a>
            </li>
	</ul>
        
<?php echo $this->render('_shop-control-bar', ['sort' => $dataProvider->sort, 'pagination'=> $dataProvider->pagination]); ?>
    </div>
<div class="tab-content card-car">
               <div role="tabpanel" id="grid" class="tab-pane <?=$view_grid?>" aria-expanded="true">
                                        <?=ListView::widget([
                                                'dataProvider' => $dataProvider,
                                                'itemView' => '_product-grid',
                                                'options' => [
                                                                'tag' => 'div',
                                                                'class' => 'products row', 
                                                                'style' => 'padding-top: 15px;'
                                                             ],
                                                'itemOptions' => [
                                                                 'tag' => 'div',
                                                                 'class' => 'product col-sm-12 col-md-6 col-lg-4 col-xl-4',
                                                                 ],
                                           'layout' => "{items}"
                                            . "<div class=\"col-md-12\"><p class=\"woocommerce-result-count\">{summary}</p></div>"
                                            . "<div class=\"col-md-12\"><nav class=\"woocommerce-pagination\" >{pager}</nav></div>",
                                          
                                            'pager' => [
       // 'firstPageLabel' => 'first',
       // 'lastPageLabel' => 'last',
       // 'prevPageLabel' => 'previous',
       // 'nextPageLabel' => 'next',
        'maxButtonCount' => 3,
        
        // Customzing options for pager container tag
        'options' => [
           'tag' => 'ul',
           'class' => 'pagination page-numbers',
           'id' => 'pager-container',
        ],
                                              
        
        // Customzing CSS class for pager link
        'linkOptions' => ['class' => 'page-numbers'],
        //'activePageCssClass' => 'current',
       // 'disabledPageCssClass' => 'disabled',
        
        // Customzing CSS class for navigating link
       // 'prevPageCssClass' => 'mypre',
       // 'nextPageCssClass' => 'mynext',
       // 'firstPageCssClass' => 'myfirst',
        //'lastPageCssClass' => 'mylast',
    ],
                                            
                                                            ])?>
                  
                   
                   </div>
                <div role="tabpanel" class="tab-pane <?=$view_list?>" id="list-view" aria-expanded="true">
                    <?=ListView::widget([
                                                'dataProvider' => $dataProvider,
                                                'itemView' => '_product-list-view',
                       
                                                'options' => [
                                                                'tag' => 'ul',
                                                                'class' => 'products columns-3',         
                                                             ],
                                                'itemOptions' => [
                                                                 'tag' => 'li',
                                                                 'class' => 'product list-view',
                                                                 ]
                                                            ])?>
                    
                </div>
				</div>
            
            <?php // echo LinkPager::widget(['pagination' => $dataProvider->pagination ]); ?>

        </main>
    
</div>
<div id="sidebar" class="sidebar" role="complementary">
    <?php echo $this->render('_product-filters-sidebar', ['model' => $searchModel] ); ?>
			<?php //require_once 'inc/components/sidebar/product-categories-widget.php'; ?>
			<?php //require_once 'inc/components/sidebar/product-filters-sidebar.php'; ?>
			<?php //require_once 'inc/components/sidebar/home-v2/home-v2-ad-block.php'; ?>
			<?php //require_once 'inc/components/sidebar/home-v2/latest-products.php'; ?>
		</div>

 <?php Pjax::end(); ?>

