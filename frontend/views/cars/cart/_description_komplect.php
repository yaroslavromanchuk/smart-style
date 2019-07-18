<?php 
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
$dataProvider = new ActiveDataProvider([
    'query' => $model->getCarsOptions(),
]);
echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '_list',
    'options' => [
                    'tag' => 'ul',
                    'class' => '', 
                    'style' => ''
                ],
    'itemOptions' => [
                    'tag' => 'li',
                    'class' => '',
                ],
    'layout' => "{items}",
    'summary' => false
]);

