<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\NewsItem */

$this->title = Yii::t('news', 'Update News Item: {name}', [
    'name' => $model->title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('news', 'News Items'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('news', 'Update');
?>
<div class="news-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
