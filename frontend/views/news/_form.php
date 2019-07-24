<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\NewsItem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-item-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_add')->textInput() ?>

    <?= $form->field($model, 'header')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'footer')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'admin_id')->textInput() ?>

    <?= $form->field($model, 'cat_id')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('news', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
