<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div id="primary" class="content-area site-error">
    		<main id="main" class="site-main">
			<h1><?= Html::encode($this->title) ?></h1>
                <div class="center-block">
                    <div class="info-404">
                        <div class="text-xs-center inner-bottom-xs">
                            <h2 class="display-3">404!</h2>
                            <p class="lead"><div class="alert alert-danger"><?= nl2br(Html::encode($message)) ?></div></p>
                            <hr class="m-y-2">
                            <div class="sub-form-row inner-bottom-xs">
                                <div class="widget woocommerce widget_product_search">
                                    <form class="woocommerce-product-search" method="get" role="search" action="">
                                        <label for="woocommerce-product-search-field" class="screen-reader-text">Search for:</label>
                                        <input type="search" title="Search for:" name="s" value="" placeholder="Пошук авто…" class="search-field" id="woocommerce-product-search-field">
                                        <input type="submit" value="Пошук">
                                        <input type="hidden" value="product" name="post_type">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
