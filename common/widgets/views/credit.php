<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
?>
<div class="row">
               <div class="col-xs-12"><?=$this->render('credit_slider', ['cars'=>$cars])?></div>
    <div class="col-xs-12">
                      <?php Pjax::begin(['enablePushState' => false, 'id' => 'pjax_form_create_credit']); ?>
    <?php $form = ActiveForm::begin([
            'action' => yii\helpers\Url::to(['cars/createcredit']),
            'options' => [
                'data-pjax' => true,
            ],
        ]); ?>
        <div class="col-xs-12 col-sm-12">
            <p><span class="price_label_span" style="display: block"><?=Yii::t('app','Зацікавила пропозиція?')?></span>
                <span><?=Yii::t('app','Заповніть форму нижче і наш консультант зв\'яжеться з вами найближчим часом.')?></span>
            </p>
        </div>                           
    <?= $form->field($model, 'cars_id')->hiddenInput(['value'=> $cars->id])->label(false) ?>
    <?= $form->field($model, 'price')->hiddenInput(['value'=> $cars->price])->label(false) ?>
                      
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
        <input type="hidden" value="25" id="amount">
        <?= $form->field($model, 'vnesok')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'month')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'stavka')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'credit')->hiddenInput()->label(false) ?>
        <?= $form->field($model, 'platij')->hiddenInput()->label(false) ?>
                      
                        <div class="col-xs-12 col-sm-12"> 
    <div class="form-group" style="float: right">
        <?= Html::submitButton(Yii::t('app', 'Відправити заявку'), ['class' => 'single_add_to_cart_button button alt']) ?>
    </div>  
                                </div>
                      <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
    <div style="clear:both;"></div>

        
    </div>
          </div>
<?php
$this->registerJsFile(Url::to('js/slider_kredit.js'), ['depends' => [yii\web\JqueryAsset::className()]]);