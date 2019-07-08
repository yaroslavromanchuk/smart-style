<?php 
use yii\helpers\Url;
$name = $model->getBrand()->one()->name.' '.$model->getModel()->one()->name;
$link = Url::toRoute(['cars/view', 'id' => $model->id]);
?>
<div class="card">
    <div class="row">
        <div class="col-md-4">
            <div  style="position: relative">
        <div class="car-preview-img">
            <a href="<?=$link?>">
                <img src="/uploads/cars/<?=$model->id.'/270-190/'.$model->image?>" class="card-img-top-list" title="<?=$name?>" alt="<?=$name?>" >
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
                
                    <div class="col-sm-6 float-left" style="padding-right: 0px;">
                        <div>
                            <i class="fas kuzov"></i><?=$model->getBody()->one()->name?>
                        </div>
                        <div>
                            <i class="fas privod"></i><?=$model->getDrive()->one()->name?>
                        </div>
                    </div>
                    <div class="col-sm-6float-left">
                        <div>
                            <i class="fas engine"></i><?=$model->getFuel()->one()->name?>
                        </div>
                        <div>
                            <i class="fas geadrsgift"></i><?=$model->getGearbox()->one()->name?>
                        </div>
                    </div>
            </div>
            
        </div>
                <div class="float-left no-padd price-card-list col-md-6">
                <div class="w-100">
                    <span class="price text-center" >
                        <span class="icon-uah-grey"></span>
                                            <?=$model->price.' '.$model->getCurrency()->one()->symbol?>
                                            <!----></span>
                    <a href="<?=$link?>" class="btn btn-primary">
                                               <?=Yii::t('app', 'Деталі')?>
                                            </a>
                </div>
            </div>
    </div>
        </div>
    </div>
</div>

