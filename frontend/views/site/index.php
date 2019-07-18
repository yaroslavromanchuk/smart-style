<?php
/* @var $this yii\web\View */
//$this->title = 'Кріщі БУ автомобілі в Україні';
?> 
<div id="primary" class="content-area cars-index">
    <main id="main" class="site-main">
        <?=$this->render('../'.$page->template->url.'.php', ['model' => $page, 'block'=>$block])?>
    </main>
</div>
<?php 
$this->registerJsFile('js/jquery.min.js', ['depends' => [yii\web\JqueryAsset::className()]]); 


  