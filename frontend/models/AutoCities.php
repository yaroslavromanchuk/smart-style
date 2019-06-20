<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auto_cities".
 *
 * @property int $id
 * @property string $name
 * @property int $states
 *
 * @property AutoStates $states0
 * @property Cars[] $cars
 */
class AutoCities extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'states'], 'required'],
            [['id', 'states'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['states'], 'exist', 'skipOnError' => true, 'targetClass' => AutoStates::className(), 'targetAttribute' => ['states' => 'id']],
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
            'states' => Yii::t('app', 'States'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStates0()
    {
        return $this->hasOne(AutoStates::className(), ['id' => 'states']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['city_id' => 'id']);
    }
}
