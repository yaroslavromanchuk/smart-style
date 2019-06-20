<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_cities".
 *
 * @property int $id
 * @property string $name
 * @property int $states
 *
 * @property AutoStates $states0
 */
class AutoCities extends \yii\db\ActiveRecord
{
    public $state;
    
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
            'state' => Yii::t('app', 'State'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatesParent()
    {
        return $this->hasOne(AutoStates::className(), ['id' => 'states']);
    }
    
    public function getStateName(){
          return $this->getStatesParent()->one()->name;
}
}
