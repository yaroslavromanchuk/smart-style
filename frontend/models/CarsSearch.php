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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'year', 'price', 'currency_id', 'categories_id', 'brand_id', 'model_id', 'body_id', 'mileage', 'region_id', 'city_id', 'damage', 'custom', 'gearbox_id', 'drive_id', 'fuel_id', 'consumption_route', 'consumption_city', 'consumption_combine', 'power_hp', 'power_kw', 'color_id', 'metallic', 'post_auctions', 'doors', 'seats', 'country_id', 'spare_parts'], 'integer'],
            [['modification', 'image', 'VIN', 'video_key', 'description_ru', 'description_uk'], 'safe'],
            [['engine'], 'number'],
        ];
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
        $query = Cars::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'price' => $this->price,
            'currency_id' => $this->currency_id,
            'categories_id' => $this->categories_id,
            'brand_id' => $this->brand_id,
            'model_id' => $this->model_id,
            'body_id' => $this->body_id,
            'mileage' => $this->mileage,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'damage' => $this->damage,
            'custom' => $this->custom,
            'gearbox_id' => $this->gearbox_id,
            'drive_id' => $this->drive_id,
            'fuel_id' => $this->fuel_id,
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
        ]);

        $query->andFilterWhere(['like', 'modification', $this->modification])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'VIN', $this->VIN])
            ->andFilterWhere(['like', 'video_key', $this->video_key])
            ->andFilterWhere(['like', 'description_ru', $this->description_ru])
            ->andFilterWhere(['like', 'description_uk', $this->description_uk]);

        return $dataProvider;
    }
}
