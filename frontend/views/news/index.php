<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div  id="primary" class="content-area news-item-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <main id="main" class="site-main">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!-- <p>
        <?= Html::a(Yii::t('news', 'Create News Item'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->
        
    <?php       // foreach ($dataProvider->models as $post) {
           // echo $this->render('list/list_item', ['model' => $post]);
      //  }
            ?>
<?=ListView::widget([
                                                'dataProvider' => $dataProvider,
                                                'itemView' => 'list/list_item',
                       
                                                'options' => [
                                                                'tag' => 'div',
                                                                'class' => 'posts',  
                                                                //'style' => 'padding-top: 15px;'
                                                             ],
                                                'itemOptions' => [
                                                                 'tag' => 'article',
                                                                 'class' => 'post format-gallery hentry',
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
                                              
        
        // Customzing CSS class for pager link
        'linkOptions' => ['class' => 'page-numbers'],
                        ]
                                                            ])?>
    </main>
</div>
<div id="sidebar" class="sidebar" role="complementary">
    <?php echo $this->render('sidebar/search-widget', ['model' => $searchModel] ); ?>
    <?php echo $this->render('sidebar/about-widget'); ?>
    <?php echo $this->render('sidebar/post-categories-widget', ['model' => $searchModel] ); ?>
    <?php echo $this->render('sidebar/recent-post-widget', ['model' => $searchModel] ); ?>
</div>
