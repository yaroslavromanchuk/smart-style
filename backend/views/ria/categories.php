<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Міста України автівок з AUTO.RIA - Smart-Style';
?> 

<?=Html::beginTag('div', ['class'=>'row'])?>
<?=Html::beginTag('div', ['class'=> 'col-lg-12', 'style' => []])?>
<?php //echo print_r($model);?>
<?=Html::beginTag('table', ['class'=>'table'])?>
<?php if(true){
foreach ($model as $m) { ?>
<tr><td><?=$m->id?></td><td><?=$m->name?></td></tr>
<?php }} ?>
<?=Html::endTag('table')?>
<?=Html::endTag('div')?>
<?=Html::endTag('div')?>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

