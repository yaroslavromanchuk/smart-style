<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'currency_id')->textInput() ?>

    <?= $form->field($model, 'categories_id')->textInput() ?>

    <?= $form->field($model, 'brand_id')->textInput() ?>

    <?= $form->field($model, 'model_id')->textInput() ?>

    <?= $form->field($model, 'modification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_id')->textInput() ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'damage')->textInput() ?>

    <?= $form->field($model, 'custom')->textInput() ?>

    <?= $form->field($model, 'VIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gearbox_id')->textInput() ?>

    <?= $form->field($model, 'drive_id')->textInput() ?>

    <?= $form->field($model, 'fuel_id')->textInput() ?>

    <?= $form->field($model, 'consumption_route')->textInput() ?>

    <?= $form->field($model, 'consumption_city')->textInput() ?>

    <?= $form->field($model, 'consumption_combine')->textInput() ?>

    <?= $form->field($model, 'engine')->textInput() ?>

    <?= $form->field($model, 'power_hp')->textInput() ?>

    <?= $form->field($model, 'power_kw')->textInput() ?>

    <?= $form->field($model, 'color_id')->textInput() ?>

    <?= $form->field($model, 'metallic')->textInput() ?>

    <?= $form->field($model, 'post_auctions')->textInput() ?>

    <?= $form->field($model, 'video_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_uk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doors')->textInput() ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <?= $form->field($model, 'country_id')->textInput() ?>

    <?= $form->field($model, 'spare_parts')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
