<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CarsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>
    
    <?= $form->field($model, 'add_cars') ?> 
 
   <?= $form->field($model, 'admin_id') ?>

    <?= $form->field($model, 'year') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'currency_id') ?>

    <?= $form->field($model, 'categories_id') ?>

    <?php // echo $form->field($model, 'brand_id') ?>

    <?php // echo $form->field($model, 'model_id') ?>

    <?php // echo $form->field($model, 'modification') ?>

    <?php // echo $form->field($model, 'body_id') ?>

    <?php // echo $form->field($model, 'mileage') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'damage') ?>

    <?php // echo $form->field($model, 'custom') ?>

    <?php // echo $form->field($model, 'VIN') ?>

    <?php // echo $form->field($model, 'gearbox_id') ?>

    <?php // echo $form->field($model, 'drive_id') ?>

    <?php // echo $form->field($model, 'fuel_id') ?>

    <?php // echo $form->field($model, 'consumption_route') ?>

    <?php // echo $form->field($model, 'consumption_city') ?>

    <?php // echo $form->field($model, 'consumption_combine') ?>

    <?php // echo $form->field($model, 'engine') ?>

    <?php // echo $form->field($model, 'power_hp') ?>

    <?php // echo $form->field($model, 'power_kw') ?>

    <?php // echo $form->field($model, 'color_id') ?>

    <?php // echo $form->field($model, 'metallic') ?>

    <?php // echo $form->field($model, 'post_auctions') ?>

    <?php // echo $form->field($model, 'video_key') ?>

    <?php // echo $form->field($model, 'description_ru') ?>

    <?php // echo $form->field($model, 'description_uk') ?>

    <?php // echo $form->field($model, 'doors') ?>

    <?php // echo $form->field($model, 'seats') ?>

    <?php // echo $form->field($model, 'country_id') ?>

    <?php // echo $form->field($model, 'spare_parts') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
