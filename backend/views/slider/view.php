<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;



/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
$dataProvider = new ActiveDataProvider([
    'query' => \backend\models\SliderItem::find()->where(['slider_id'=>$model->id])->orderBy('id'),
    'pagination' => [
        'pageSize' => 20,
    ],
]);
$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Слайдер'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Змінити'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Видалити'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Ви дійсно хочете видалити цей слайдер?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'active',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'src',
            'href'

           // ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
