<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model backend\models\CarsImages */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-images-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cars_id')->textInput(['value'=> $id]);//->widget(TinyMce::className());  ?>

    <!--<?= $form->field($model, 'image')->textInput(['maxlength' => true])?>-->
 <?= $form->field($model, 'file')->fileInput()->label('Фото') ?>
    <div class="form-group">
        
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
