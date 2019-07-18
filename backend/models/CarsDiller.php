<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars_diller".
 *
 * @property int $id
 * @property string $name
 * @property string $logo
 *
 * @property Cars[] $cars
 */
class CarsDiller extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_diller';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'logo'], 'required'],
            [['name'], 'string', 'max' => 150],
            [['logo'], 'string', 'max' => 255],
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
            'logo' => Yii::t('app', 'Logo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['diller_id' => 'id']);
    }
}
