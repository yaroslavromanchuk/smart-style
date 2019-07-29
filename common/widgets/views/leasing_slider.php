<div class="price-slider">
                      <div class="title">
            <h3 class="great"><?=$proc?> %</h3>
            <span>Мінімум 20%</span>
            </div>
            <div class="col-sm-12 mb-3">
                <div id="slider_proc">
                    <span class="l-left">20%</span>
                    <span class="l-right">70%</span>
                </div>
            </div>
          </div>
          <div class="price-slider">
               <div class="title">
            <h3 class="great"><?=$mouth?>, міс.</h3>
            <span>Мінімум 12 місяців</span>
            </div>
            <div class="col-sm-12">
                <div id="slider_mouth">
                    <span class="l-left">12 міс</span>
                    <span class="l-right">60 міс</span>
                </div>
            </div>
          </div>
<?php

use yii\helpers\Url;
$this->registerJsFile(Url::to('js/jquery-1.11.1.min.js'), ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->registerJsFile(Url::to('js/jquery-ui.js'), ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->registerJsFile(Url::to('js/leasing.js'), ['depends' => [yii\web\JqueryAsset::className()]]);
