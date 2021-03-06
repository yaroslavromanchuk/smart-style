<?php
//$this->registerCssFile('css/cars-list.css');
use yii\helpers\Url;

foreach ($recommended as $model) {
    $name = $model->getBrand()->one()->name.' '.$model->getModel()->one()->name;
$link = Url::to(['cars/view', 'id' => $model->id]);
    ?>
    <div class="product">
        <div class="product-outer ">
    <div class="product-inner list-card-body">
        <a href="<?=$link?>">
            <div class="product-thumbnail">
                <img src="/images/blank.gif" data-echo="<?=$model->getImages(270)?>" class="img-responsive" alt="">
            </div>
               
            </a>
        <h5 class="card-title" style="font-size:16px"><?=$name?> 
                <span class="car-year"> <?=$model->year?></span>
                </h5>
        <span class="old-car">
                <i class="fas old-car-icon"></i> <?=$model->mileage?> км
            </span>
        <div class="row car-info">
                
                    <div class="col-xs-6">
                            <i class="fas kuzov"></i><?=$model->body->name?>
                    </div>
            <div class="col-xs-6">
                 <i class="fas privod"></i><?=$model->drive->name?>
            </div>
                    <div class="col-xs-6">
                            <i class="fas engine"></i><?=$model->fuel->name?>
                    </div>
<div class="col-xs-6">
                            <i class="fas geadrsgift"></i><?=$model->gearbox->name?>
                        </div>
                    
            </div>
        <div class="price-add-to-cart">
            <span class="price">
                        <span class="icon-uah-grey"></span>
                                          
                            <span class="amount"><?=number_format($model->price, 0, ',', ' ').' '.$model->currency->symbol?></span>
                         <?php if($model->old_price){ ?><strike><?=number_format($model->old_price, 0, ',', ' ').' '.$model->currency->symbol?></strike><?php } ?>
                                            <!----></span>
        </div><!-- /.price-add-to-cart -->

        <div class="hover-area">
            <div class="action-buttons">
                <a href="<?=$link?>" rel="nofollow" class="views-link">
                                               <?=Yii::t('app', 'Деталі')?>
                                            </a>
            </div>
        </div>
    </div><!-- /.product-inner -->
</div><!-- /.product-outer -->
</div><!-- /.products -->
<?php }

