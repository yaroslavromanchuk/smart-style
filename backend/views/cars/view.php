<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Cars */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Автомобілі'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редагувати'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Дійсно видалити цей запис?'),
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
