<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = Yii::t('app', 'About');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Це сторінка Про нас. Ви можете змінити наступний файл, щоб змінити його вміст:</p>

    <code><?= __FILE__ ?></code>
</div>
