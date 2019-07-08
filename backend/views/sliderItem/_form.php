<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SliderItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-item-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'slider_id')->dropdownList(
             \backend\models\Slider::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Виберіть слайдер якому належитиме фото']
            ) ?>

   
    
     <?= $form->field($model, 'href')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'file')->fileInput()->label('Фото для слайду') ?>
    <?php if($model->src){ ?>
    <img src="<?=Yii::getAlias('@frontend/web').$model->src?>" style="width: 300px;">
   <?php } ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Зберегти'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
