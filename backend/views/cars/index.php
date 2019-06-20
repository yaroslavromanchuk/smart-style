<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Автомобілі');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
</div>
