<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_bodystyles".
 *
 * @property int $id
 * @property string $name
 * @property int $categories
 *
 * @property AutoCategories $categories0
 * @property Cars[] $cars
 */
class AutoBodystyles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_bodystyles';
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
            'name' => Yii::t('app', 'Name'),
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
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['body_id' => 'id']);
    }
}
