<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
?>

<div class="footer-newsletter">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-7">
					<h5 class="newsletter-title"><?=Yii::t('app', 'Підпишіться на наші новини')?></h5>
					<span class="newsletter-marketing-text"> ...<?=Yii::t('app', 'будьте разом із')?> <strong>Smart-style</strong></span>
				</div>
				<div class="col-xs-12 col-sm-5">
                                    <?php Pjax::begin(['enablePushState' => false, 'id' => 'pjax_form']); ?>
    <?php $form = ActiveForm::begin([
            'action' => yii\helpers\Url::to(['subscription/subscription']),
            'options' => [
                'data-pjax' => true,
            ],
        ]); ?>
                                    <div class="" style="display: block">
                                        <div class="" style="display: inline-block">
                                             <?=$form->field($model, 'email')->textInput(['placeholder'=>Yii::t('app', 'Введіть email адресу'), 'class'=>'form-control', 'style'=>'height: 100%'])->label(false);?>
                                        </div>
                              <div class="" style="display: inline-block">       
                    
    <?=Html::submitButton(Yii::t('app', 'Підписатись'),  ['class' => 'submit btn btn-secondary']); ?>  
                                  </div> 
                                    </div>                  
    
                       
                   
    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>
    <div style="clear:both;"></div>
				</div>
			</div>
		</div>
	</div>