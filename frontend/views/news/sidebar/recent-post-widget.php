<?php
use yii\helpers\Url;

?>
<aside class="widget electro_recent_posts_widget"><h3 class="widget-title"><?=Yii::t('news', 'Останні новини')?></h3>
    <ul>
         <?php
         if($model->id){
             $where = ' id!='.$model->id;
         }else{
             $where = '';
         }
        foreach (\frontend\models\NewsItem::find()->where(['active'=>1])
                ->andWhere($where)
                ->orderBy('id DESC')->limit(5)->all() as $post) {?>
        <li>
            <a class="post-thumbnail" href="<?=Url::toRoute(['news/view', 'id' => $post->id])?>">
                <?=$post->image?>
            </a>
            <div class="post-content">
                <a class ="post-name" href="<?=Url::toRoute(['news/view', 'id' => $post->id])?>"><?=$post->title?></a>
                <span class="post-date"><?=date('d.m.Y', strtotime($post->date_add))?></span>
            </div>
        </li>
       <?php } ?>
	</ul>
</aside>

