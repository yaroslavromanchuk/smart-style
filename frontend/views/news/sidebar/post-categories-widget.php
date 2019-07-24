<?php
use yii\helpers\Url; 

?>
<aside class="widget widget_categories">
    <h3 class="widget-title"><?=Yii::t('news', 'Категорії')?></h3>
    <ul>
        <li class="cat-item"><a href="<?=Url::to(['news/index'])?>" ><?=Yii::t('news', 'Всі новини')?></a></li>
        <?php
        foreach (\frontend\models\NewsCategory::find()->innerJoin('news_item')->all() as $cat) {?>
            <li class="cat-item"><a href="<?=Url::to(['news/index', 'NewsSearch'=>['cat_id'=>$cat->id]])?>" ><?=$cat->name?></a></li>
       <?php } ?>

	</ul>
</aside>

