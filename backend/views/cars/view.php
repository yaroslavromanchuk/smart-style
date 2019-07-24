<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model backend\models\Cars */

$this->title = $model->brand->name.' '.$model->model->name;//$model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Автомобілі'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cars-view">

    <!---<h1><?= Html::encode($this->title) ?></h1>-->

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
            //'id',
            'year',
            'price',
            ['attribute' => 'currency_id', 'value' => $model->currency->code, ],
            ['attribute' => 'categories_id', 'value' => $model->categories->name,],
            ['attribute' => 'brand_id', 'value' => $model->brand->name,],
            ['attribute' => 'model_id', 'value' => $model->model->name,],
            ['attribute' => 'modification', 'value' => $model->modification, 'format' => 'raw',],
            ['attribute' => 'body_id', 'value' => $model->body->name,],
            ['attribute' => 'mileage', 'value' => $model->mileage.' км.',], 
            ['attribute' => 'region_id', 'value' => $model->region->name,],
            ['attribute' => 'city_id', 'value' => $model->city->name,],
            ['attribute' => 'image', 'format' => 'raw', 'value' => function($data){return Html::img(Yii::getAlias('@uploads').'/cars/180/'.$data->image,['alt'=>'yii2 - картинка в gridview','style' => 'width:70px; padding:1px;']);},],
            ['attribute' => 'damage', 'value' => $model->damage?'Так':'Ні',],
            ['attribute' => 'custom', 'value' => $model->custom?'Ні':'Так',],
            'VIN',
            ['attribute' => 'gearbox_id', 'value' => $model->gearbox->name,],
            ['attribute' => 'drive_id', 'value' => $model->drive->name,],
            ['attribute' => 'fuel_id', 'value' => $model->fuel->name,],
            ['attribute' => 'engine', 'value' => $model->engine.'  см³',],
            'consumption_route',
            'consumption_city',
            'consumption_combine',
            'power_hp',
            'power_kw',
            ['attribute' => 'color_id', 'value' => $model->color->name,],
            ['attribute' => 'metallic', 'value' => $model->metallic?'Так':'Ні',],
            ['attribute' => 'post_auctions', 'value' => $model->post_auctions?'Так':'Ні',],
            'video_key',
            'description_ru',
            'description_uk',
            'doors',
            'seats',
            ['attribute' => 'country_id', 'value' => $model->country->name,],
            ['attribute' => 'spare_parts', 'value' => $model->spare_parts?'Так':'Ні',],
            ['attribute' => 'options', 'format' => 'raw', 'value' => function($data){
                 $list = '<div class="row">';
                             foreach ($data->getCarsOptions()->all() as $op) {
                             $list.='<div class="col-xs-12" >'.$op->options->name.'</div>';    
                             }
                $list.='</div>';
                return $list; 
                
                             },],
        ],
    ]) ?>

</div>
