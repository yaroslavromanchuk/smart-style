<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use dosamigos\tinymce\TinyMce;


/* @var $this yii\web\View */
/* @var $model backend\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'currency_id')->dropdownList(
             \backend\models\Currency::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Виберіть валюту зі списку']
            ) ?>

    <?= $form->field($model, 'categories_id')->dropdownList(
             \backend\models\AutoCategories::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть тип автомобіля']
            ) ?>
    
    

    <?= $form->field($model, 'brand_id')->dropdownList(
             \backend\models\AutoMarks::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть марку автомобіля',
       'onchange' => '
                                                         $.post(
                                                          "'. Url::toRoute('cars/ajax') .'",
                                                          {id: $(this).val(), method: "models", category: $("#cars-categories_id").val()},
                                                          function(data){
                                                            $("select#cars-model_id").html(data).attr("disabled", false)
                                                          }
                                                         )
                                                     ' 
        ]
            ) ?>

    <?= $form->field($model, 'model_id')->dropdownList(
             \backend\models\AutoModels::find()->select(['name', 'id'])->indexBy('id')->column(),
    [
        'prompt'=>'Вкажіть модель автомобіля',
        'disabled' => $model->isNewRecord ? true : false
        ]
            ) ?>

    <?= $form->field($model, 'modification')->widget(TinyMce::className(), [
    'options' => ['rows' => 6],
    'language' => 'ru',
    'clientOptions' => [
        'plugins' => [
            'advlist autolink lists link charmap  print hr preview pagebreak',
            'searchreplace wordcount textcolor visualblocks visualchars code fullscreen nonbreaking',
            'save insertdatetime media table contextmenu template paste image'
        ],
        'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    ]
]);//->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_id')->dropdownList(
             \backend\models\AutoBodystyles::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть тип кузова']
            ) ?>

    <?= $form->field($model, 'mileage')->textInput() ?>

    <?= $form->field($model, 'region_id')->dropdownList(
            \backend\models\AutoStates::find()->select(['name', 'id'])->indexBy('id')->column(),
    [
        'prompt'=>'Вкажіть область',
         'onchange' => '
                                                         $.post(
                                                          "'. Url::toRoute('cars/ajax') .'",
                                                          {id: $(this).val(), method: "cities"},
                                                          function(data){
                                                            $("select#cars-city_id").html(data).attr("disabled", false)
                                                          }
                                                         )
                                                     ' 
        ]
            ) ?>

    <?= $form->field($model, 'city_id')->dropdownList(
             \backend\models\AutoCities::find()->select(['name', 'id'])->indexBy('id')->column(),
    [
        'prompt'=>'Вкажіть область',
        'disabled' => $model->isNewRecord ? true : false
        ]
            )?>

    <?= $form->field($model, 'file')->fileInput()->label('Головне фото') ?>

    <!--<?= $form->field($model, 'damage')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'custom')->dropDownList([ 1 => '1', 0 => '0', ], ['prompt' => '']) ?>-->
    
    
     <?= $form->field($model, 'damage')->checkbox([ 'value' => 1, 'label' => 'Після ДТП', ]) ?>
    
    <?= $form->field($model, 'custom')->checkbox([ 'value' => 1, 'label' => 'Не розмитнене', ]) ?>

    <?= $form->field($model, 'VIN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gearbox_id')->dropdownList(
             \backend\models\AutoGearboxes::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть коробку передач']
            ) ?>

    <?= $form->field($model, 'drive_id')->dropdownList(
             \backend\models\AutoDriverTypes::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть тип приводу']
            ) ?>

    <?= $form->field($model, 'fuel_id')->dropdownList(
             \backend\models\AutoOil::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть тип пального']
            ) ?>

    <?= $form->field($model, 'consumption_route')->textInput() ?>

    <?= $form->field($model, 'consumption_city')->textInput() ?>

    <?= $form->field($model, 'consumption_combine')->textInput() ?>

    <?= $form->field($model, 'engine')->textInput() ?>

    <?= $form->field($model, 'power_hp')->textInput() ?>

    <?= $form->field($model, 'power_kw')->textInput() ?>

    <?= $form->field($model, 'color_id')->dropdownList(
             \backend\models\AutoColors::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть колір авто']
            ) ?>

    <?= $form->field($model, 'metallic')->checkbox([ 'value' => 1, 'label' => 'Металік', ]) ?>

    <?= $form->field($model, 'post_auctions')->checkbox([ 'value' => 1, 'label' => 'Торг', ])  ?>

    <?= $form->field($model, 'video_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_ru')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description_uk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'doors')->textInput() ?>

    <?= $form->field($model, 'seats')->textInput() ?>

    <?= $form->field($model, 'country_id')->dropdownList(
             \backend\models\AutoCountries::find()->select(['name', 'id'])->indexBy('id')->column(),
    ['prompt'=>'Вкажіть колір авто']
            ) ?>

    <?= $form->field($model, 'spare_parts')->checkbox([ 'value' => 1, 'label' => 'На запчастини', ]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
