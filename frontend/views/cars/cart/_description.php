<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="woocommerce-tabs wc-tabs-wrapper">
						<ul class="nav nav-tabs electro-nav-tabs tabs wc-tabs" role="tablist">
                                                    <li class="nav-item description_tab active">
								<a href="#tab-opis" data-toggle="tab"><?=Yii::t('app', 'Опис')?></a>
                                                    </li>
                                                    <li class="nav-item description_tab">
								<a href="#tab-specification" data-toggle="tab"><?=Yii::t('app', 'Характеристики')?></a>
                                                    </li>
                                                    <li class="nav-item specification_tab">
								<a href="#tab-description" data-toggle="tab"><?=Yii::t('app', 'Комплектація')?></a>
                                                    </li>
							<li class="nav-item foto_tab">
								<a href="#tab-foto" data-toggle="tab"><?=Yii::t('app', 'Фото')?></a>
							</li>
							<!--<li class="nav-item reviews_tab">
								<a href="#tab-reviews" data-toggle="tab"><?=Yii::t('app', 'Відгуки')?></a>
							</li>-->
						</ul>

<div class="tab-content">
    <div class="tab-pane panel active entry-content wc-tab" id="tab-opis">
<?=$this->render('_description_opis', ['model' => $model])?>
</div><!-- /.panel -->
<div class="tab-pane panel entry-content wc-tab" id="tab-specification">
<?=$this->render('_description_tehnik', ['model' => $model])?>
</div><!-- /.panel -->
<div class="tab-pane  in panel entry-content wc-tab" id="tab-description">
    <?=$this->render('_description_komplect', ['model' => $model])?>
</div>
<div class="tab-pane  panel entry-content wc-tab" id="tab-foto">
      <?=$this->render('_description_foto', ['model' => $model])?>      
</div>
<div class="tab-pane panel entry-content wc-tab" id="tab-reviews">
</div><!-- /.panel -->
						</div>
					</div><!-- /.woocommerce-tabs -->

