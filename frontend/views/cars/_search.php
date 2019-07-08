<?php

use yii\helpers\Html;
use \yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\CarsSearch */
/* @var $form yii\widgets\ActiveForm */
?>


     <h3 class="widget-title"><?=Yii::t('app', 'Фільтри')?></h3>
    <?php $form = ActiveForm::begin([
        'id' => 'sears_cars',
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
        'fieldConfig' => [
           'template' => "{label}\n{input}\n<p class=\"maxlist-more\"><a href=\"#\">+</a></p>\n{error}"
        ]
    ]); ?>
     <div class="cars-search widget widget_electro_products_filter">
         <aside id="woocommerce_layered_nav-1" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
        <h3 class="widget-title"><?=Yii::t('app', 'Тип авто')?></h3>
    <?= $form->field($model, 'categories')->checkboxList(
            ArrayHelper::map(\frontend\models\AutoCategories::find()->joinWith('cars',true,'INNER JOIN')->all(), 'id', 'name'),
            [
                  'tag' => 'ul',
                   'class' => 'woocommerce-widget-layered-nav-list',
               'item'=>function ($index, $label, $name, $checked, $value){
         $check = $checked ? 'checked' : '';
        return "<li class='woocommerce-widget-layered-nav-list__item wc-layered-nav-term '>
       <input id='{$index}-c' type='checkbox' {$check}  name='{$name}' value='{$value}' /><label for='{$index}-c'></span>{$label}<span></label>
                                    </li>";
                                    }
                         ]
            )->label(false); ?>
</aside>
         <aside id="woocommerce_layered_nav-2" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
        <h3 class="widget-title"><?=Yii::t('app', 'Марка авто')?></h3>
    <?= $form->field($model, 'brand')->checkboxList(
            ArrayHelper::map(\frontend\models\AutoMarks::find()->joinWith('cars',true,'INNER JOIN')->all(), 'id', 'name'),
            [
                  'tag' => 'ul',
                   'class' => 'woocommerce-widget-layered-nav-list',
               'item'=>function ($index, $label, $name, $checked, $value){
         $check = $checked ? 'checked' : '';
        return "<li class='woocommerce-widget-layered-nav-list__item wc-layered-nav-term '>
       <input id='{$index}-m' type='checkbox' {$check}  name='{$name}' value='{$value}' /><label for='{$index}-m'></span>{$label}<span></label>
                                    </li>";
                                    }
                         ]
            )->label(false); ?>
</aside>
<aside id="woocommerce_layered_nav-3" class="widget woocommerce widget_layered_nav woocommerce-widget-layered-nav">
        <h3 class="widget-title"><?=Yii::t('app', 'Рік випуску')?></h3>
         <?= $form->field($model, 'year')->checkboxList(
            ArrayHelper::map(\frontend\models\Cars::find()->select('year')->distinct('year')->where('status_id = 2')->all(), 'year', 'year'),
           [
                  'tag' => 'ul',
                   'class' => 'woocommerce-widget-layered-nav-list',
               'item'=>function ($index, $label, $name, $checked, $value){
         $check = $checked ? 'checked' : '';
        return "<li class='woocommerce-widget-layered-nav-list__item wc-layered-nav-term '>
       <input id='{$index}-y' type='checkbox' {$check}  name='{$name}' value='{$value}' /><label for='{$index}-y'></span>{$label}<span></label>
                                    </li>";
                                    }
                         ]
            )->label(false);
    ?>   
</aside>

    <?php // echo $form->field($model, 'min_price') ?>
    
    <?php // echo $form->field($model, 'max_price') ?>

    <?php // echo $form->field($model, 'currency_id') ?>

    <?php  //echo $form->field($model, 'brand_id') ?>

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
        <?= Html::submitButton(Yii::t('app', 'Підібрати'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Скинути'), ['class' => 'btn btn-default']) ?>
    </div>
</div>
    <?php ActiveForm::end(); ?>
   



