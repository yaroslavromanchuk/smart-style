<?php 
use yii\helpers\Html;
use yii\helpers\Url;
//echo '<pre>';
//print_r($sort);
//echo '</pre>';
?>

<div class="btn-group ">
   <!-- <span>Сортувати: </span>-->
    <span style=""  class="electro-wc-wppp-select c-select" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Сортування</span>
  <ul class="dropdown-menu sort">
       <li><?=$sort->link('year')?></li>
 <li><?=$sort->link('price')?></li>
 <li><?=$sort->link('brand_id')?></li>
</ul>
</div>

<?php
$values = [3, 15, 16, 100];
$current = $pagination->getPageSize();
?>
<div class="btn-group" style="float: right">
    <span>На сторінці: </span>
<select class="electro-wc-wppp-select c-select" onchange="location = this.value;">
    <?php foreach ($values as $value): ?>
        <option value="<?= Html::encode(Url::current(['page_size' => $value, 'page' => null])) ?>" <?php if ($current == $value): ?>selected="selected"<?php endif; ?>><?= $value ?></option>
    <?php endforeach; ?>
</select>
</div>

