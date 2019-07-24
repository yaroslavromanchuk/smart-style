<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\NewsItem */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-item-view">

    <h1><?= Html::encode($this->title) ?></h1>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php echo $this->render('post/blog-single-post', ['model' => $model] ); ?>
    </main>
</div>
    <div id="sidebar" class="sidebar" role="complementary">
    <?php echo $this->render('sidebar/search-widget', ['model' => $model] ); ?>
    <?php echo $this->render('sidebar/about-widget'); ?>
    <?php echo $this->render('sidebar/post-categories-widget', ['model' => $model] ); ?>
    <?php echo $this->render('sidebar/recent-post-widget', ['model' => $model] ); ?>
</div>
  <!--  <p>
        <?= Html::a(Yii::t('news', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('news', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('news', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>-->

    <?php /*echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'date_add',
            'header:ntext',
            'body:ntext',
            'footer:ntext',
            'admin_id',
            'cat_id',
            'active',
        ],
    ])*/ ?>

</div>
