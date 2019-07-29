<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
$atrib = $model->attributeLabels();
?>
<div id="calc" class="leasing_form col-xs-12 col-md-6">
    <style>
        .form-group{
            margin-bottom: -15px;
        }
        .label-td{
            font-weight: bold;
    line-height: 2.3;
        }
    </style>
 <?php $form = ActiveForm::begin([
            'action' => yii\helpers\Url::to(['leasing/ajax']),
            'id'=>'l_f',
            'options' => [
                'data-pjax' => true,
            ],
        ]); ?>
    <?= $form->field($model, 'mouth')->hiddenInput(['value'=>12])->label(false)?>
    <?= $form->field($model, 'avans')->hiddenInput(['value'=> 20])->label(false) ?>
    <div class="row" >
        <table>
            <tr>
                <td class="label-td"><?=$atrib['currency_to']?></td>
                <td> <?= $form->field($model, 'currency_to')->dropdownList(
            ['UAH'=>'Гривня', 'USD'=> 'Доллар США', 'EUR' => 'Євро'],
           ['prompt'=>'',
               'options' =>[ 'USD' => ['Selected' => true]]
            ]
           )->label(false) ?></td>
            </tr>
            <tr>
                <td class="label-td"><?=$atrib['price']?></td>
                <td><?= $form->field($model, 'price')->textInput(['value'=>1])->label(false) ?></td>
            </tr>
            <tr>
                <td class="label-td"><?=$atrib['currency']?></td>
                <td> <?= $form->field($model, 'currency')->dropdownList(
            ['UAH'=>'Гривня', 'USD'=> 'Доллар США', 'EUR' => 'Євро'],
           ['prompt'=>'',
               'options' =>[ 'USD' => ['Selected' => true]]
            ]
           )->label(false) ?></td>
            </tr>
           <tr>
                <td colspan="2"><?=$this->render('leasing_slider',['proc'=>$atrib['avans'], 'mouth'=> $atrib['mouth']])?></td>
            </tr>
        </table>
        <div class="col-xs-12 text-center"> 
    <?= Html::submitButton(Yii::t('app', 'Розрахувати'), ['class' => 'single_add_to_cart_button button alt']) ?>
   </div>
        </div>
<?php ActiveForm::end(); ?>
</div>
<?php
Pjax::widget([
    'id' => 'res', 
    'enablePushState' => false, 
    'enableReplaceState' => false, 
    'formSelector' => '#l_f',// this form is submitted on change
    'submitEvent' => 'submit',]);
?>
<div id="res" class="post_container  col-xs-12 col-md-6"></div>



