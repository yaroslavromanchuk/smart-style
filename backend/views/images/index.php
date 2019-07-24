<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CarsImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Фото автівок');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-images-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   <!-- <p>
        <?= Html::a(Yii::t('app', 'Додати фото'), ['images/create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'cars_id',
            [
            'label' => 'Картинка',
            'format' => 'raw',
            'value' => function($data){
                return Html::img(Yii::getAlias('@uploads').'/cars/180/'.$data->image,
                        [
                            'alt'=>'yii2 - картинка в gridview',
                            'style' => 'width:50px;'
                        ]
                        );
            },
        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
