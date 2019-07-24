<?php 
echo $this->render('modal/_modal_credit', ['model' => $model]);
echo $this->render('modal/_modal_orders', ['model' => $model]);
?>
<div class="card">
            <div class="card-body" style="padding: 15px">
                <div class="row">
                    <div class="col-xs-12 col-md-4 text-center">
                        <button class="single_add_to_cart_button button alt" type="button"  data-toggle="modal" data-target="#modal_orders"><?=Yii::t('app', 'Купити')?></button>
                    </div>
                    <div class="col-xs-12 col-md-4 text-center">
                        <button class="single_add_to_cart_button button alt" type="button"  data-toggle="modal" data-target="#modal_credit"><?=Yii::t('app', 'Кредит')?></button>
                    </div>
                    <div class="col-xs-12 col-md-4 text-center">
                        <button class="single_add_to_cart_button button alt">Trade-in</button>
                    </div>
                </div>
            </div>
        </div>
