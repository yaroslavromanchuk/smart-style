<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_add')->widget(DatePicker::class, [
    'language' => 'uk',
    'dateFormat' => 'yyyy-MM-dd',
]) ?>

    <?= $form->field($model, 'image')->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'previews')->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'header')->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'body')->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'footer')->widget(TinyMce::className()) ?>

    <?= $form->field($model, 'admin_id')->dropdownList(
           \common\models\User::find()->select(['lastName', 'id'])->where('status = 10')->indexBy('id')->column(),
           ['prompt'=>'Виберіть відповідального']
           ) ?>

    <?= $form->field($model, 'cat_id')->dropdownList(
         \backend\models\NewsCategory::find()->select(['id', 'name'])->indexBy('id')->column(),
           ['prompt'=>'Виберіть відповідального']
           ) ?>

    <?= $form->field($model, 'active')->checkbox([ 'value' => 1, 'label' => 'Публікувати', ]) ?>
    
    <?= $form->field($model, 'keywords')->textInput() ?>

    <?= $form->field($model, 'description')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('news', 'Зберегти'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
