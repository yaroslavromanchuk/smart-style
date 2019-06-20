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
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Cars'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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
</div>
