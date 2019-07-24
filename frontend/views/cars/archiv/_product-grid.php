<?php 
use yii\helpers\Url;
$name = $model->brand->name.' '.$model->model->name;
$link = Url::to(['cars/archiv-view', 'id' => $model->id]);
?>
<div class="card"> 
    <div  style="position: relative">

        <div class="car-preview-img">
            <a href="<?=$link?>">
                <img src="/images/blank.gif" data-echo="<?=$model->getImages(270)?>"  class="card-img-top" title="<?=$name?>" alt="<?=$name?>" >
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="list-card-body">
            <a href="<?=$link?>">
                <h5 class="card-title"><?=$name?> 
                <span class="car-year"> <?=$model->year?></span>
                </h5>
            </a>
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
            <div class="no-padd price-card-list">
                <div class="w-100">
                    <span class="price">
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

