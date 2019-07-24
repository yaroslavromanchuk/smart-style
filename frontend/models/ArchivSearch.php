<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `frontend\models\Cars`.
 */
class ArchivSearch extends Cars
{

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['id',  'price',  'currency_id', 'status_id', 'diller_id',  'model_id', 'body_id', 'mileage', 'region_id', 'city_id', 'damage', 'custom', 'gearbox_id', 'drive_id', 'fuel_id', 'consumption_route', 'consumption_city', 'consumption_combine', 'power_hp', 'power_kw', 'color_id', 'metallic', 'post_auctions', 'doors', 'seats', 'country_id', 'spare_parts'], 'integer'],
           // [['modification', 'image', 'VIN', 'video_key', 'description_ru', 'description_uk',  'categories',  'models', 'brand', 'body', 'diller', 'fuel', 'gearbox', 'status'], 'safe'],
           // [['engine'], 'number'],
        ];
    }
    // public function attributes()
//{
    // делаем поле зависимости доступным для поиска
   // return array_merge(parent::attributes(), ['categories', 'models', 'brand', 'body', 'diller', 'fuel', 'gearbox', 'status']);
//}


    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
       // echo '<pre>';
      //  echo  print_r($params);
        // echo '</pre>';
       // exit();
        $query = Cars::find()->where(['status_id'=>5]);
        // add conditions that should always apply here
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'attributes' => [
                    'id' =>[
                        'default' => SORT_ASC,
                    ],
                    'year',
                    'price' => [
                        'asc' => ['price' => SORT_ASC],
                         'desc' => ['price' => SORT_DESC],
                        'label' => 'Ціна'
                    ],
                    'brand_id' => [
                                'asc' => ['brand_id' => SORT_ASC],
                               // 'desc' => ['brand_id' => SORT_DESC],
                                //'default' => SORT_ASC,
                                'label' => 'Марка',
                    ],
        ],
                'defaultOrder' => ['id' => SORT_DESC]
    ],
    'pagination' => [
                 'defaultPageSize' => 15,
                'pageSizeLimit' => [15, 100],
    ]
            
 ]);
        $dataProvider->sort->enableMultiSort = true;
        $this->load($params);      
        if (!$this->validate()) {
            // $query->where('0=1');
            // $query->joinWith(['auto_categories'])->joinWith(['auto_marks'])->joinWith(['cars_diller']);
            return $dataProvider;
        }
        // grid filtering conditions
        return $dataProvider;
    }
}
