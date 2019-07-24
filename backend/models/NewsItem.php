<?php

namespace backend\models;

use Yii;
use \common\models\User;
/**
 * This is the model class for table "news_item".
 *
 * @property int $id
 * @property string $title
 * @property string $date_add
 * @property string $image
 * @property string $previews
 * @property string $header
 * @property string $body
 * @property string $footer
 * @property int $admin_id
 * @property int $cat_id
 * @property int $active
 *
 * @property NewsCategory $cat
 * @property User $admin
 */
class NewsItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'date_add', 'image', 'previews', 'header', 'body', 'footer', 'admin_id', 'cat_id','keywords', 'description'], 'required'],
            [['date_add'], 'safe'],
            [['previews', 'header', 'body', 'footer','keywords', 'description'], 'string'],
            [['admin_id', 'cat_id', 'active'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => NewsCategory::className(), 'targetAttribute' => ['cat_id' => 'id']],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['admin_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('news', 'ID'),
            'title' => Yii::t('news', 'Title'),
            'date_add' => Yii::t('news', 'Date Add'),
            'image' => Yii::t('news', 'Image'),
            'previews' => Yii::t('news', 'Previews'),
            'header' => Yii::t('news', 'Header'),
            'body' => Yii::t('news', 'Body'),
            'footer' => Yii::t('news', 'Footer'),
            'admin_id' => Yii::t('news', 'Admin ID'),
            'cat_id' => Yii::t('news', 'Cat ID'),
            'active' => Yii::t('news', 'Active'),
             'keywords' => Yii::t('news', 'Ключові слова'),
            'description' => Yii::t('news', 'Опис сторінки'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(NewsCategory::className(), ['id' => 'cat_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'admin_id']);
    }
}
