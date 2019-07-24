<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "news_category".
 *
 * @property int $id
 * @property int $name
 *
 * @property NewsItem[] $newsItems
 */
class NewsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string'], 
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('news', 'ID'),
            'name' => Yii::t('news', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsItems()
    {
        return $this->hasMany(NewsItem::className(), ['cat_id' => 'id']);
    }
}
