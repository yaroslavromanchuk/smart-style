<!-- Modal -->
<div class="modal fade" id="modal_credit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Кредитний калькулятор</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row" style="display: none">
              <div class="col-xs-12 col-md-6">
                  
                  <div class="price-slider">
            <h4 class="great">Amount</h4>
            <span>Minimum $10 is required</span>
            <div class="col-sm-12">
              <div id="slider"></div>
            </div>
          </div>
          <div class="price-slider">
            <h4 class="great">Duration</h4>
            <span>Minimum 1 day is required</span>
            <div class="col-sm-12">
              <div id="slider2"></div>
            </div>
          </div>
              </div>
              <div class="col-xs-12 col-md-6">
                  <div class="card">
                      <div class="card-body">
                          <div class="price-form">

            <div class="form-group">
              <label for="amount" class="col-sm-6 control-label">Amount ($): </label>
              <span class="help-text">Please choose your amount</span>
              <div class="col-sm-6">
                <input type="hidden" id="amount" class="form-control">
                <p class="price lead" id="amount-label"></p>
                <span class="price">.00</span>
              </div>
            </div>
            <div class="form-group">
              <label for="duration" class="col-sm-6 control-label">Duration: </label>
              <span class="help-text">Choose your commitment</span>
              <div class="col-sm-6">
                <input type="hidden" id="duration" class="form-control">
                <p class="price lead" id="duration-label"></p>
                <span class="price">days</span>
              </div>
            </div>
            <hr class="style">
            <div class="form-group total">
              <label for="total" class="col-sm-6 control-label"><strong>Total: </strong></label>
              <span class="help-text">(Amount * Days)</span>
              <div class="col-sm-6">
                <input type="hidden" id="total" class="form-control">
                <p class="price lead" id="total-label"></p>
                <span class="price">.00</span>
              </div>
            </div>
          </div>
                      </div>
                  </div>
                  
              </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрити</button>
        <button type="button" class="btn btn-primary">Відправити заявку</button>
      </div>
    </div>
  </div>
</div>

<?php

$this->registerJsFile('https://code.jquery.com/jquery-1.11.1.min.js', ['depends' => [yii\web\JqueryAsset::className()]]);
$this->registerJsFile('https://code.jquery.com/ui/1.10.4/jquery-ui.min.js', ['depends' => [yii\web\JqueryAsset::className()]]); 

$this->registerJsFile('js/slider_kredit.js', ['depends' => [yii\web\JqueryAsset::className()]]);
