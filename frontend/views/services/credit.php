<?php
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('css/cars-list.css', ['depends' => [yii\web\JqueryAsset::className()]]);
?>
<h1><?=$this->title?></h1>
<?=common\widgets\CreditWidget::widget(['cars'=>$model])?>

