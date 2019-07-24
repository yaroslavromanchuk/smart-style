<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<aside id="search-2" class="widget widget_search news-item-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <label>
    		<span class="screen-reader-text">Search for:</span>
    		<input type="search" class="search-field" placeholder="Пошук &hellip;" value="" name="NewsSearch[search]" />
    	</label>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('news', 'Search'), ['class' => 'btn btn-primary hide']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</aside>

