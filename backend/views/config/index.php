<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ConfigSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Configs');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="config-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Config'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'key_conf',
            'value',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
