<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Cars;

/**
 * CarsSearch represents the model behind the search form of `frontend\models\Cars`.
 */
class CarsSearch extends Cars
{
    
    public $categories;
    public $fuel;
    public $min_price;
    public $max_price;
    public $min_year;
    public $max_year;
    public $gearbox;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id',  'price',  'min_price', 'max_price', 'min_year', 'max_year', 'currency_id', 'status_id', 'diller_id',  'model_id', 'body_id', 'mileage', 'region_id', 'city_id', 'damage', 'custom', 'gearbox_id', 'drive_id', 'fuel_id', 'consumption_route', 'consumption_city', 'consumption_combine', 'power_hp', 'power_kw', 'color_id', 'metallic', 'post_auctions', 'doors', 'seats', 'country_id', 'spare_parts'], 'integer'],
            [['modification', 'image', 'VIN', 'video_key', 'description_ru', 'description_uk',  'categories',  'models', 'brand', 'body', 'diller', 'fuel', 'gearbox'], 'safe'],
            [['engine'], 'number'],
        ];
    }
     public function attributes()
{
    // делаем поле зависимости доступным для поиска
    return array_merge(parent::attributes(), ['categories', 'models', 'brand', 'body', 'diller', 'fuel', 'gearbox']);
}


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
        
       // echo  print_r($params);
      // exit();
       
       
       
       
        $query = Cars::find()->joinWith('categories')
                ->joinWith('brand')
                ->joinWith('diller')
                ->andFilterWhere(['in', 'status_id', [2,3,4]]);
                //->andFilterWhere(['status_id'=> 2]);

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
                 'defaultPageSize' => 3,
                'pageSizeLimit' => [3, 100],
    ]
 ]);
     
           
          
      
        $dataProvider->sort->enableMultiSort = true;

        $this->load($params);
        
         
         // $dataProvider->pagination->defaultPageSize = Yii::$app->request->cookies->getValue('page_size', 15);
        

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
             $query->joinWith(['auto_categories'])->joinWith(['auto_marks'])->joinWith(['cars_diller']);
            return $dataProvider;
        }
       
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
           // 'year' => $this->year,
          //  'price' => $this->price,
            'currency_id' => $this->currency_id,
           // 'categories_id' => $this->categories_id,
           // 'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'body_id' => $this->body_id,
            'mileage' => $this->mileage,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'damage' => $this->damage,
            'custom' => $this->custom,
            //'gearbox_id' => $this->gearbox_id,
            'drive_id' => $this->drive_id,
            //'fuel_id' => $this->fuel_id,
            'consumption_route' => $this->consumption_route,
            'consumption_city' => $this->consumption_city,
            'consumption_combine' => $this->consumption_combine,
            'engine' => $this->engine,
            'power_hp' => $this->power_hp,
            'power_kw' => $this->power_kw,
            'color_id' => $this->color_id,
            'metallic' => $this->metallic,
            'post_auctions' => $this->post_auctions,
            'doors' => $this->doors,
            'seats' => $this->seats,
            'country_id' => $this->country_id,
            'spare_parts' => $this->spare_parts,
            'status_id' => $this->status_id,
           // 'diller_id' => $this->diller_id,
        ]);

        $query->andFilterWhere(['like', 'modification', $this->modification])
           // ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'VIN', $this->VIN])
           // ->andFilterWhere(['like', 'video_key', $this->video_key])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_uk', $this->description_uk])
            ->andFilterWhere(['and', 
                ['>=', 'year', $this->min_year],
                ['<=', 'year', $this->max_year]])
            ->andFilterWhere(['and',
                ['>=', 'price', $this->min_price],
                ['<=', 'price', $this->max_price],
                    ])
            ->andFilterWhere(['in', 'categories_id', $this->categories])
            ->andFilterWhere(['in', 'fuel_id', $this->fuel])
            ->andFilterWhere(['in', 'gearbox_id', $this->gearbox])
                
            ->andFilterWhere(['in', 'body_id', $this->body])
            ->andFilterWhere(['in', 'diller_id', $this->diller])
            ->andFilterWhere(['in', 'brand_id', $this->brand]);
        return $dataProvider;
    }
}
