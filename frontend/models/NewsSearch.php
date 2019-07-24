<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\NewsItem;

/**
 * NewsSearch represents the model behind the search form of `frontend\models\NewsItem`.
 */
class NewsSearch extends NewsItem
{
     public $search;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'admin_id', 'cat_id', 'active'], 'integer'],
            [['title', 'previews', 'search', 'header', 'body', 'footer'], 'safe'],
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
        $query = NewsItem::find() ->andFilterWhere(['active'=>1]);

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
           // 'id' => $this->id,
           // 'date_add' => $this->date_add,
           // 'admin_id' => $this->admin_id,
            'cat_id' => $this->cat_id,
           // 'active' => $this->active,
        ]);

        $query->andFilterWhere([
    'or',
    ['like', 'title', $this->search],
            ['like', 'previews', $this->search],
    ['like', 'header', $this->search],
            ['like', 'body', $this->search],
            ['like', 'footer', $this->search]
            
]);
       /* $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'header', $this->title])
            ->andFilterWhere(['like', 'body', $this->title])
            ->andFilterWhere(['like', 'footer', $this->title]);*/

        return $dataProvider;
    }
}
