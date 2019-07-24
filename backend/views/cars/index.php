<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use \backend\models\CarsImages;

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
        <?= Html::a(Yii::t('app', 'Додати автівку'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id',
            'add_cars',
            [                                                  // name свойство зависимой модели owner
                        'attribute' => 'admin_id',
                        //'label' => 'Категорія',
                        'value' => function($data){ return $data->admin->lastName;},
                    ],
                [                                                  // name свойство зависимой модели owner
                        'attribute' => 'status_id',
                        //'label' => 'Категорія',
                        'value' => function($data){ return $data->status->name;},
                    ],                
            'year',
            'price',
                    [                                                  // name свойство зависимой модели owner
                        'attribute' => 'categories',
                        //'label' => 'Категорія',
                        'value' => 'categories.name',
                    ],
             [                                                  // name свойство зависимой модели owner
                        'attribute' => 'diller',
                        //'label' => 'Категорія',
                        'value' => 'diller.name',
                    ],
             'views',
            [
            'label' => 'Фото',
            'format' => 'raw',
            'value' => function($data){
        $list = '<div class="row"><div class="col-xs-1">'.Html::img(Yii::getAlias('@uploads').'/cars/180/'.$data->image,['alt'=>'yii2 - картинка в gridview','style' => 'width:30px; padding:1px;']).'</div>';
        foreach (CarsImages::find()->where('cars_id = '.$data->id)->all() as $value) {
                 $list.=   '<div class="col-xs-1" >'.Html::img(Yii::getAlias('@uploads').'/cars/180/'.$value->image,['alt'=>'yii2 - картинка в gridview','style' => 'width:30px; padding:1px;']).'</div>';  
                } 
                $list.= '</div>';
                 return $list;
            },
        ],
         
                    [
    //'label' => 'Додати',
    'format' => 'raw',
    'value' => function($data){
        return Html::a(
            '<span class="glyphicon glyphicon-eye-plus">+</span>',
             ['images/create', 'cars_id' => $data->id],
                ['style' => 'padding: 15px;'],
            [
                'title' => 'Додати фото',
                'target' => '_blank'
            ]
        );
    }
],
           
           // 'categories_id',
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
