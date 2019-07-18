<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auto_options".
 *
 * @property int $id
 * @property string $name
 * @property int $categories
 *
 * @property AutoCategories $categories0
 * @property CarsOptions[] $carsOptions
 */
class AutoOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'categories'], 'required'],
            [['id', 'categories'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['categories'], 'exist', 'skipOnError' => true, 'targetClass' => AutoCategories::className(), 'targetAttribute' => ['categories' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Характеристика'),
            'categories' => Yii::t('app', 'Categories'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategories0()
    {
        return $this->hasOne(AutoCategories::className(), ['id' => 'categories']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarsOptions()
    {
        return $this->hasMany(CarsOptions::className(), ['options_id' => 'id']);
    }
}
