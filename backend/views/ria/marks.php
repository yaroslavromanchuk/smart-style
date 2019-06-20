<?php

/* @var $this yii\web\View */
use yii\helpers\Html;

$this->title = 'Завантаження марок автівок з AUTO.RIA - Smart-Style';
?> 

<?=Html::beginTag('div', ['class'=>'row'])?>
<?=Html::beginTag('div', ['class'=> 'col-lg-12', 'style' => []])?>
<?php //echo print_r($model->getMarks());?>
<?=Html::beginTag('table', ['class'=>'table'])?>
<?php if(true){
foreach ($model as $m) { ?>
<tr><td><?=$m->id?></td><td><?=$m->name?></td></tr>
<?php }} ?>
<?=Html::endTag('table')?>
<?=Html::endTag('div')?>
<?=Html::endTag('div')?>



<h4>ria/marcs</h4>
<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

