<?php $this->registerCssFile('/css/gallery/lightgallery.css');
?>
<div class="images electro-gallery">
	<div class="thumbnails-single owl-carousel carousel-inner gallery list-unstyled" id="image-gallery">
		<a href="<?=$model->getImages()?>" class="zoom carousel-item " title=""  data-rel="prettyPhoto[product-gallery]">
			<img src="<?=$model->getImages(600)?>"  class="wp-post-image" alt="">
		</a>
            <?php
            foreach ($model->getCarsImages()->all() as $m) {?>
                <a href="<?=$m->getImages()?>" class="zoom carousel-item" title=""  data-rel="prettyPhoto[product-gallery]">
			<img src="<?=$m->getImages(600)?>"  class="wp-post-image" alt="">
		</a>
          <?php  } ?>
	</div><!-- .thumbnails-single -->

	<div class="thumbnails-all columns-5 owl-carousel hidden-xs">
		<a href="<?=$model->getImages(180)?>" class="first" title="">
			<img src="/images/blank.gif" data-echo="<?=$model->getImages(180)?>"  class="wp-post-image" alt="<?=$model->image?>">
		</a>
 <?php
            foreach ($model->getCarsImages()->all() as $m) { ?>
                <a href="<?=$m->getImages(180)?>" class="last"  title="">
			<img src="/images/blank.gif" data-echo="<?=$m->getImages(180)?>" class="wp-post-image" alt="<?=$m->image?>">
		</a>
          <?php  } ?>
	</div><!-- .thumbnails-all -->
</div><!-- .electro-gallery -->		

