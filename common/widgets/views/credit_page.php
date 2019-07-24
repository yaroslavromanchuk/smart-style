<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\helpers\Url;
?>
<div class="row">
               <div class="col-xs-12">
                   <?php
                   
                   ?>
<?=$this->render('credit_slider_page', ['cars'=>$cars])?>
               </div>
          </div>
<?php
$this->registerJsFile(Url::to('js/slider_kredit.js'), ['depends' => [yii\web\JqueryAsset::className()]]);