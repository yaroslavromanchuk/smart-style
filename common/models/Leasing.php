<?php

namespace common\models;
use Yii;


class Leasing extends \yii\base\Model
{
   // public $type;
    public $price;
    public $currency_to;
    public $currency;
    public $avans;
    public $mouth;

    
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           // [['type',  'price', 'v_engine', 'avans', 'currency_to', 'currency', 'mouth', 'schema', 'lico' ], 'required'],
            [['price',  'currency_to', 'currency', 'avans',  'mouth' ], 'required'],
            [['price', 'avans', 'mouth'], 'integer'],
            [['currency', 'currency_to'], 'string','max' => 3],
            [['mouth'], 'integer', 'max' => 60],
           // [['phone'], 'string', 'max' => 15],
           // [['email'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'type' => Yii::t('app', 'Тип транспорту'),
            'v_engine' => Yii::t('app', 'Обєм двигуна'),
            'price' => Yii::t('app', 'Вартість'),
            'currency_to' => Yii::t('app', 'Валюта вартості'),
            'currency' => Yii::t('app', 'Валюта фінансівання'),
            'avans' => Yii::t('app', 'Аванс'),
            'mouth' => Yii::t('app', 'Період'),
            'schema' => Yii::t('app', 'Схема виплат'),
            'lico' => Yii::t('app', 'Категорія'),
        ];
    }

    
}
