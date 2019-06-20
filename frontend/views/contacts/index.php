<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = Yii::t('app', 'Контакти');
$this->params['breadcrumbs'][] = $this->title;
?>
				<article class="hentry">

					<header class="entry-header">
						<h1 class="entry-title"><?= Html::encode($this->title) ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<div class="row">
							<div class="col-sm-6">
								<div class="wpb_wrapper outer-bottom-xs">
									<h2 class="contact-page-title"> <?=Yii::t('app', 'Виникли запитання?').' '.Yii::t('app', 'Звяжіться з нами!')?></h2>
								</div>

								<div role="form" class="wpcf7">
									<div class="screen-reader-response"></div>
									<?php $form = ActiveForm::begin(['id' => 'contact-form', 'class'=>'wpcf7-form']); ?>

                <?= $form->field($model, 'name')->textInput(['autofocus' => true,'class'=>'wpcf7-form-control input-text']) ?>

                <?= $form->field($model, 'email')->textInput(['class'=>'wpcf7-form-control input-text']) ?>

                <?= $form->field($model, 'subject')->textInput(['class'=>'wpcf7-form-control input-text']) ?>

                <?= $form->field($model, 'body')->textarea(['rows' => 6, 'class'=>'wpcf7-form-control input-text wpcf7-textarea']) ?>

                <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton(Yii::t('app', 'Відправити'), ['class' => 'btn btn-primary wpcf7-form-control wpcf7-submit', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
								</div>
							</div><!-- .col -->
						
							<div class="store-info store-info-v2 col-sm-6">
								<div class="vc_column-inner ">
									<div class="wpb_wrapper">
										<div class="inner-left-xs outer-bottom-xs">
                                                                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2540.397573639501!2d30.458663641305083!3d50.45232086386336!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce8993cb3283%3A0xffc2c9f4d0249781!2sSmart+Style!5e0!3m2!1sru!2sua!4v1560849888144!5m2!1sru!2sua" width="600" height="288" frameborder="0" style="border:0" allowfullscreen></iframe>

										</div>

										<div class="inner-left-xs">
											<div class="wpb_wrapper">
												<h2 class="contact-page-title"><?=Yii::t('app', 'Наша адреса')?></h2>
												<p><?=$config['addres']?><br />
												<?=Yii::t('app', 'Телефон')?>: 
                                                                                                <?php foreach ($config['phone'] as $p) {
              echo   Html::beginTag('a', ['href'=>'tel:+'.$p['tel'], 'class'=>'phone', 'rel'=>'nofollow']).'<i class="ec ion-ios-call"></i>'.$p['phone'].Html::endTag('a').'<br>';
            } ?>
												Email: <a href="mailto:<?=$config['email']?>"><?=$config['email']?></a></p>
												<h3><?=Yii::t('app', 'Графік роботи')?></h3>
												<p><?=$config['grafik']?></p>
												

											</div>
										</div>
									</div>
								</div>
							</div><!-- .col -->
						</div><!-- .row -->
					</div><!-- .entry-content -->

				</article><!-- #post-## -->

