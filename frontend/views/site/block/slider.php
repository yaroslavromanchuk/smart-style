<?php
$slider = frontend\models\Slider::find()->where(['active'=>1])->one();
if($slider->id){

?>
<div class="home-v3-slider" >
	<!-- ========================================== SECTION – HERO : END========================================= -->

        <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
            
            <?php foreach ($slider->getSliderItems()->all() as $value) { ?>
                <div class="item" >
                    <img src="<?=$value->src?>">
		</div><!-- /.item -->
           <?php } ?>
        </div>
</div>
<?php } ?>