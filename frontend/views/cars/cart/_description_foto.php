<?php 
use yii\helpers\Html;
?>
<div class="thumbnails-single text-center"> 
    <div class="owl-stage">
        <a href="<?=$model->getImages()?>?>" class="zoom1" title="" >
			<img  src="<?=$model->getImages(270)?>?>"  class="img_description" alt="">
		</a>

<?php 
foreach ($model->getCarsImages()->all() as $m) { ?>

        <a href="<?=$m->getImages()?>?>" class="zoom1" title="" >
			<img src="<?=$m->getImages(270)?>"  class="img_description" alt="">
		</a>
   
<?php }
?>
 </div>
</div>