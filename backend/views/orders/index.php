<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Orders'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],

            'id',
           // 'cars_id',
            [                                                  // name свойство зависимой модели owner
                'attribute' => 'cars_id',
                'format' => 'raw',
                'value' => function($data){ return Html::img(Yii::getAlias('@uploads').'/cars/180-180/'.$data->cars->image,['alt'=>'yii2 - картинка в gridview','style' => 'width:50px; padding:1px;']); },
                ],
            'name',
            'phone',
            'email:email',
                        'price',
                [                                                  // name свойство зависимой модели owner
                'attribute' => 'admin_id',
                'value' => function($data){ return $data->admin->lastName;},
                ],
                [                                                  // name свойство зависимой модели owner
                'attribute' => 'status',
                'value' => function($data){ return $data->orderstatus->name;},
                ],
            'date_add',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
