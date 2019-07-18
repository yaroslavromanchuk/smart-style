<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>
			<div class="row" style="padding: 15px;">
				
                                    <?php Pjax::begin(['enablePushState' => false, 'id' => 'pjax_form_create_order']); ?>
    <?php $form = ActiveForm::begin([
            'action' => yii\helpers\Url::to(['cars/createorder']),
            'options' => [
                'data-pjax' => true,
            ],
        ]); ?>
                                  
    <?= $form->field($model, 'cars_id')->hiddenInput(['value'=> $cars->id])->label(false) ?>
    <?= $form->field($model, 'price')->hiddenInput(['value'=> $cars->price])->label(false) ?>
                            <div class="col-xs-12 col-sm-12">
                                <p style="color: red;font-size: 22px;font-weight:  bold;">
                                <?=$cars->brand->name.' '.$cars->model->name.' '.$cars->year.', '.number_format($cars->price, 0, ',', ' ').' '.$cars->currency->symbol?>
                                </p>
                                <p><?=Yii::t('app','Залиште ваші контактні дані для зв\'язку з фахівцем з відділу продажів')?></p>
                            </div>         
    <div class="col-xs-12 col-sm-4"> 
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
   </div>
                            <div class="col-xs-12 col-sm-4"> 
    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
   </div>
                            <div class="col-xs-12 col-sm-4"> 
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
    
    <?= $form->field($model, 'status')->hiddenInput(['value'=> 1])->label(false) ?>
                            <div class="col-xs-12 col-sm-12"> 
    <div class="form-group" style="float: right">
        <?= Html::submitButton(Yii::t('app', 'Відправити заявку'), ['class' => 'btn btn-success']) ?>
    </div>  
                                </div>
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
    <div style="clear:both;"></div>
				
			</div>
