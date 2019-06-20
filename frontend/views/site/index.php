<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->registerJsFile('js/jquery.min.js', ['depends' => [yii\web\JqueryAsset::className()]]); 
$this->title = 'Smart-Style - Продаж кращих БУ авто в Україні';
?> 
<div id="primary" class="content-area cars-index">
    <main id="main" class="site-main">
<?php if(count($block)){
     foreach ($block as $value) {
        echo $this->render('block/'.$value['block'].'.php', ['model' => $value['model']]);
    } 
     }
     ?>
</main>
</div>



  