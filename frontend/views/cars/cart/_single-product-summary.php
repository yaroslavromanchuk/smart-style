<?php 
use yii\helpers\Url;
$attribute = $model->attributeLabels();
?>
<div class="summary entry-summary">

	<!--<span class="loop-product-categories">
		<a href="<?=Url::to('cars/index').'&CarsSearch[brand]='.$model->brand_id?>" rel="tag"><?=$model->getBrand()->one()->name?></a>
	</span>--><!-- /.loop-product-categories -->

	<h1 itemprop="name" class="product_title entry-title"><?=$title?></span></h1>

	<!--<div class="woocommerce-product-rating">
		<div class="star-rating" title="Rated 4.33 out of 5">
			<span style="width:86.6%">
				<strong itemprop="ratingValue" class="rating">4.33</strong> 
				out of <span itemprop="bestRating">5</span>				based on
				<span itemprop="ratingCount" class="rating">3</span>
				customer ratings			
			</span>
		</div>

		<a href="#reviews" class="woocommerce-review-link">
			(<span itemprop="reviewCount" class="count">3</span> customer reviews)
		</a>	
	</div>--><!-- .woocommerce-product-rating -->

        <div class="card">
            <div class="card-body" style="padding: 15px">
                <div class="row cart-detail">
                    <div class="col-xs-12">
                        <div itemprop="offers" itemscope itemtype="http://schema.org/Offer">

		<p class="price">
                    <span class="electro-price">
                        <ins>
                            <span class="amount"><?=number_format($model->price, 0, ',', ' ').' '.$model->currency->symbol?></span>
                        </ins> 
                        <?php if(false){ ?>
                        <del>
                            <span class="amount">&#36;2,299.00</span>
                        </del>
                            <?php } ?>
                    </span>
                </p>
                <meta itemprop="price" content="<?=$model->price?>" />
                <meta itemprop="priceCurrency" content="<?=$model->currency->code?>" />
		<link itemprop="availability" href="http://schema.org/InStock" />

	</div><!-- /itemprop -->
                    </div>
                    <div class="col-xs-6">
                         <div>
                        <span class="label_attribut"><?=$attribute['status_id']?></span>
                        <span>
                            <?=$model->getStatus()->one()->name?>
                        </span>
                        </div>
                        <div>
                             <span class="label_attribut"><i class="fas kuzov"></i><?=$attribute['body_id']?></span>
                             <span>
                                <?=$model->getBody()->one()->name?>
                             </span>
                        </div>
                        <div>
                             <span class="label_attribut"><i class="fas engine"></i><?=$attribute['engine']?></span>
                            <span><?=$model->engine.' см³ / '.$model->getFuel()->one()->name?></span>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div>
                        <span class="label_attribut"><i class="fas old-car-icon"></i><?=$attribute['mileage']?></span>
                        <span>
                             <?=$model->mileage?> км
                        </span>
                        </div>
                        <div>
                             <span class="label_attribut"><i class="fas privod"></i><?=$attribute['drive_id']?></span>
                            <span><?=$model->getDrive()->one()->name?></span>
                        </div>
                        <div>
                             <span class="label_attribut"><i class="fas geadrsgift"></i><?=$attribute['gearbox_id']?></span>
                            <span><?=$model->getGearbox()->one()->name?></span>
                        </div>
                        <div>
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if($model->status_id == 2){ echo $this->render('_product-actions-wrapper', ['model'=>$model]); } ?>
	<?php //require_once 'inc/blocks/single-product/variations-form.php'; ?>


</div><!-- .summary -->