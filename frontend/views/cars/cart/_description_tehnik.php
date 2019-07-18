<h3>Технічні характеристики</h3>
<?php 
use yii\widgets\DetailView;
echo DetailView::widget([
    'model' => $model,
    'attributes' => [
        'year',
        [                                                  // name свойство зависимой модели owner
            'attribute' => 'mileage',
            'value' => $model->mileage.' км.', 
        ],
        [                                                  // name свойство зависимой модели owner
            'attribute' => 'body_id',
            'value' => $model->body->name, 
        ],
        [
            'attribute' => 'engine',
            'value' => $model->engine.' см³ / '.$model->fuel->name, 
        ],
        [
            'attribute' => 'drive_id',
            'value' => $model->drive->name, 
        ],
        [
            'attribute' => 'gearbox',
            'value' => $model->gearbox->name, 
        ]
        
        
    ],
    'options' => [
        'class' => 'table'
    ]
]);