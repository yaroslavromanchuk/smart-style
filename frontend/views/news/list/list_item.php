<?php
use yii\helpers\Url;
//print_r($model);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

					<div class="media-attachment">
						<a href="<?=Url::toRoute(['news/view', 'id' => $model->id])?>">
                                                    <?=$model->image?>
						<!--<img width="430" height="245" src="/images/blog/blog-1.jpg" class="wp-post-image" alt="1" />-->
                                                </a>
					</div><!-- .media-attachment -->

					<div class="content-body">
						<header class="entry-header">
							<h1 class="entry-title" itemprop="name headline">
								<a href="<?=Url::toRoute(['news/view', 'id' => $model->id])?>" rel="bookmark"><?=$model->title?></a>
							</h1>

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

						<div class="entry-content">

							<?=$model->previews?>

						</div><!-- .entry-content -->

						<div class="post-readmore">
                                                    <a href="<?=Url::toRoute(['news/view', 'id' => $model->id])?>" class="btn btn-primary"><?=Yii::t('app', 'Дивитись далі')?></a>
						</div><!-- .post-readmore -->

						<span class="comments-link">
							<a href="#">3</a>
						</span><!-- .comments-link -->
					</div><!-- .content-body -->
