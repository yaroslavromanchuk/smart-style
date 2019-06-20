<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cars */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'year',
            'price',
            'currency_id',
            'categories_id',
            'brand_id',
            'model_id',
            'modification',
            'body_id',
            'mileage',
            'region_id',
            'city_id',
            'image',
            'damage',
            'custom',
            'VIN',
            'gearbox_id',
            'drive_id',
            'fuel_id',
            'consumption_route',
            'consumption_city',
            'consumption_combine',
            'engine',
            'power_hp',
            'power_kw',
            'color_id',
            'metallic',
            'post_auctions',
            'video_key',
            'description_ru',
            'description_uk',
            'doors',
            'seats',
            'country_id',
            'spare_parts',
        ],
    ]) ?>

</div>
