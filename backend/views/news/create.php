<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\NewsItem */

$this->title = Yii::t('news', 'Create News Item');
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-item-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
