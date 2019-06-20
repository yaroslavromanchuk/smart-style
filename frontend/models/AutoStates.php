<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auto_states".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoCities[] $autoCities
 * @property Cars[] $cars
 */
class AutoStates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoCities()
    {
        return $this->hasMany(AutoCities::className(), ['states' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['region_id' => 'id']);
    }
}
