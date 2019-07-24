<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile(Url::to('css/cars-list.css'), ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->registerJsFile(Url::to('js/jquery.min.js'), ['depends' => [yii\web\JqueryAsset::className()]]); 
?>
<?php Pjax::begin(); ?>  
<div id="primary" class="content-area cars-index">
        <main id="main" class="site-main">
            <header class="page-header">
	<h1 class="page-title"><?= Html::encode($this->title) ?></h1>
</header>
  <!--  <div class="shop-control-bar">
	
<?php //echo $this->render('../_shop-control-bar', ['sort' => $dataProvider->sort, 'pagination'=> $dataProvider->pagination])?>
        <style>
           .shop-view-switcher1 .nav-item{
                float: right;
            }
        </style>
    </div>-->
<div class="card-car">
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
                                                                 'class' => 'product col-sm-12 col-md-6 col-lg-3 col-xl-3',
                                                                 ],
                                           'layout' => "{items}"
                                            . "<div class=\"col-md-12\"><p class=\"woocommerce-result-count\">{summary}</p></div>"
                                            . "<div class=\"col-md-12\"><nav class=\"woocommerce-pagination\" >{pager}</nav></div>",
                                          
                                            'pager' => [
        'maxButtonCount' => 3,
        
        // Customzing options for pager container tag
        'options' => [
           'tag' => 'ul',
           'class' => 'pagination page-numbers',
           'id' => 'pager-container',
        ],
        'linkOptions' => ['class' => 'page-numbers'],
    ],
                                            
        ])?>
				</div>
        </main>
</div>
 <?php Pjax::end(); ?>

