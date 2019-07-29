<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Замовлення'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Редагувати'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Видалити замовлення'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Дійсно видалити це замовлення?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //  'id',
            //'cars_id',
            [                                                  // name свойство зависимой модели owner
                'attribute' => 'cars_id',
                'format' => 'raw',
                'value' => function($data){ return Html::img(Yii::getAlias('@uploads').'/cars/180/'.$data->cars->image,['alt'=>'yii2 - картинка в gridview','style' => 'width:50px; padding:1px;']); },
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
        ],
    ]) ?>

</div>
