<?php 
use yii\helpers\Url;
$name = $model->getBrand()->one()->name.' '.$model->getModel()->one()->name;
$link = Url::toRoute(['cars/view', 'id' => $model->id]);
?>
<div class="card <?=($model->status_id==3)?'deposit':''?> <?=($model->status_id==4)?'deposit':''?>">
    <?php if($model->status_id==3){ ?>
        <div class="deposit-sales-bg"></div>
        <span class="deposit-title"><?=Yii::t('app','Резерв')?></span>
   <?php  }elseif($model->status_id==4){ ?>
        <div class="deposit-sales-bg"></div>
        <span class="deposit-title"><?=Yii::t('app','Внесено задаток')?></span>
  <?php  } ?>
    <div class="row">
        
        <div class="col-md-4">
            <div  style="position: relative">
        <div class="car-preview-img">
            <a href="<?=$link?>">
                <img src="<?=$model->getImages(270)?>" class="card-img-top-list" title="<?=$name?>" alt="<?=$name?>" >
            </a>
        </div>
    </div>
        </div>
        <div class="col-md-8">
            <div class="card-body card-list row">
        <div class="list-card-body col-md-6">
            <a href="<?=$link?>">
                <h5 class="card-title"><?=$name?> 
                <span class="car-year"> <?=$model->year?></span>
                </h5>
            </a>
            <span class="old-car">
                <i class="fas old-car-icon"></i> <?=$model->mileage?> км
            </span>
            <div class="row car-info">
                
                    <div class="col-xs-6 float-left" style="padding-right: 0px;">
                        <div>
                            <i class="fas kuzov"></i><?=$model->getBody()->one()->name?>
                        </div>
                        <div>
                            <i class="fas privod"></i><?=$model->getDrive()->one()->name?>
                        </div>
                    </div>
                    <div class="col-xs-6 float-left">
                        <div>
                            <i class="fas engine"></i><?=$model->getFuel()->one()->name?>
                        </div>
                        <div>
                            <i class="fas geadrsgift"></i><?=$model->getGearbox()->one()->name?>
                        </div>
                    </div>
            </div>
            
        </div>
                <div class="float-left no-padd price-card-list col-md-6" style="padding-top: 30px;">
                <div class="w-100 text-center">
                    <span class="price" >
                       <span class="icon-uah-grey"></span>
                                            <?=number_format($model->price, 0, ',', ' ').' '.$model->currency->symbol?>
                        <?php if($model->old_price){ ?><strike><?=number_format($model->old_price, 0, ',', ' ').' '.$model->currency->symbol?></strike><?php } ?>
                                            <!----></span>
                    <a href="<?=$link?>" rel="nofollow" class="btn btn-primary">
                                               <?=Yii::t('app', 'Деталі')?>
                                            </a>
                </div>
            </div>
    </div>
        </div>
    </div>
</div>

