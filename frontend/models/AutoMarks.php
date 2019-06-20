<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auto_marks".
 *
 * @property int $id
 * @property string $name
 * @property int $categories
 *
 * @property AutoCategories $categories0
 * @property AutoModels[] $autoModels
 * @property Cars[] $cars
 */
class AutoMarks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_marks';
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
            'name' => Yii::t('app', 'Марка'),
            'categories' => Yii::t('app', 'Тип авто'),
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
    public function getAutoModels()
    {
        return $this->hasMany(AutoModels::className(), ['marks' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['brand_id' => 'id']);
    }
    
    public function getTopMenu(){
        return $this->find()->limit(10);
    }
}
