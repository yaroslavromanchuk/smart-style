<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Cars */

$this->title = Yii::t('app', 'Редагування: {name}', ['name' => $model->id.'-'.$model->brand->name.' '.$model->model->name,]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cars'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id.'-'.$model->brand->name.' '.$model->model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Редагування');
?>
<div class="cars-update">


    <?= $this->render('_form', [
        'model' => $model,
        'options' => $options
    ]) ?>

</div>
