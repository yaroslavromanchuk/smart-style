<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Сторінки');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Додати сторінку'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           //['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'url:url',
            'title',
            'page_body:ntext',
            'page_footer:ntext',
            'keywords',
            'description',
            'image',
            'nofollow',
            'sitemap',
            'template_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
