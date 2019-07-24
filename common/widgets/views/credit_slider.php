
<?php
use yii\helpers\Url;
?>
<div class="col-xs-6">
                  <h5 class="card-title" style="font-weight: bold;">
                               <?=$cars->brand->name.' '.$cars->model->name.' '.$cars->year?>
                              <span style="padding: 15px;font-weight: 400;display: block;"><?=number_format($cars->price, 0, ',', ' ').' '.$cars->currency->symbol?></span>
                    </h5>
<div class="price-slider">
                      <div class="title">
            <h3 class="great">Початковий внесок %</h3>
            <span>Мінімум 25%</span>
            </div>
            <div class="col-sm-12 mb-3">
                <div id="slider">
                    <span class="l-left">25%</span>
                    <span class="l-right">70%</span>
                </div>
            </div>
          </div>
          <div class="price-slider">
               <div class="title">
            <h3 class="great">Термін кредиту, місяців</h3>
            <span>Мінімум 12 місяців</span>
            </div>
            <div class="col-sm-12">
                <div id="slider2">
                    <span class="l-left">12 міс</span>
                    <span class="l-right">72 міс</span>
                </div>
            </div>
          </div>
    </div>
<div class="col-xs-6">
    <div class="card">
                    
                      <div class="card-body" style="padding: 20px;display: inline;">
                          
            <div class="price-form card-text">
            <div class="form-group">
              <label class="col-sm-6 control-label">Перший внесок ($): </label>
              <div class="col-sm-6">
                <p class="price_label" id="amount-label"></p>
                <span class="price_label_span"> $</span>
              </div>
            </div>
            <div class="form-group">
              <label  class="col-sm-6 control-label">Термін кредиту: </label>
              <div class="col-sm-6">
                <p class="price_label" id="duration-label"></p>
                <span class="price_label_span"> місяців</span>
              </div>
            </div>
                <div class="form-group">
              <label  class="col-sm-6 control-label">Ставка: </label>
              <div class="col-sm-6">
                <p class="price_label" id="stavka-label">17</p>
                <span class="price_label_span"> %</span>
              </div>
            </div>
                 <div class="form-group">
              <label  class="col-sm-6 control-label">Залишковий платіж: </label>
              <div class="col-sm-6">
                <p class="price_label" id="credit-label"></p>
                <span class="price_label_span"> $</span>
              </div>
            </div>
          
            <div class="form-group">
              <label class="col-sm-6 control-label">Платіж в місяц: </label>
              <div class="col-sm-6">
                <p class="price_label" id="total-label"></p>
                <span class="price_label_span">$</span>
              </div>
            </div>
          </div>
                        
                      </div>
                  </div>
</div>
<?php
$this->registerJsFile(Url::to('js/jquery-1.11.1.min.js'), ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->registerJsFile(Url::to('js/jquery-ui.js'), ['depends' => [yii\web\JqueryAsset::className()]]); 



