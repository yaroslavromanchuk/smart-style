<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cars_options".
 *
 * @property int $id
 * @property int $cars_id
 * @property int $options_id
 * @property int $category_options_id
 *
 * @property Cars $cars
 * @property AutoOptions $options
 * @property AutoOptionsCategory $categoryOptions
 */
class CarsOptions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_options';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cars_id', 'options_id', 'category_options_id'], 'required'],
            [['cars_id', 'options_id', 'category_options_id'], 'integer'],
            [['cars_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['cars_id' => 'id']],
            [['options_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoOptions::className(), 'targetAttribute' => ['options_id' => 'id']],
            [['category_options_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoOptionsCategory::className(), 'targetAttribute' => ['category_options_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cars_id' => Yii::t('app', 'Cars ID'),
            'options_id' => Yii::t('app', 'Options ID'),
            'category_options_id' => Yii::t('app', 'Category Options ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasOne(AutoOptions::className(), ['id' => 'options_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoryOptions()
    {
        return $this->hasOne(AutoOptionsCategory::className(), ['id' => 'category_options_id']);
    }
}
