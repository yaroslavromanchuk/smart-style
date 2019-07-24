<?php
use yii\helpers\Url;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<article class="post type-post status-publish format-gallery has-post-thumbnail hentry" >
    <div class="media-attachment">
        <div class="media-attachment-gallery">
            <div class=" ">
                <div class="item">
                    <figure>
                        <?=$model->image?>
                    </figure>
                </div><!-- /.item -->
            </div>
        </div><!-- /.media-attachment-gallery -->
    </div>

    <header class="entry-header">
        <h1 class="entry-title" itemprop="name headline"><?=$model->title?></h1>

        <div class="entry-meta">
								<span class="cat-links">
									<a href="<?=Url::toRoute(['news/view', 'id' => $model->id])?>" rel="category tag"><?=$model->cat->name?></a>
								</span>

								<span class="posted-on">
									<a href="<?=Url::toRoute(['news/view', 'id' => $model->id])?>" rel="bookmark">
                                                                            <time class="entry-date published" datetime="<?=$model->date_add?>"><?=date('d.m.Y', strtotime($model->date_add))?></time>
										<time class="updated" datetime="<?=$model->date_add?>" itemprop="datePublished"><?=date('d.m.Y', strtotime($model->date_add))?></time>
									</a>
								</span>
							</div>
    </header><!-- .entry-header -->

    <div class="entry-content" itemprop="articleBody">
        <?=$model->previews?>
        </div><!-- .entry-content -->
</article>

