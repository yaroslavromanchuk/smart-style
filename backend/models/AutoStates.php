<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_states".
 *
 * @property int $id
 * @property string $name
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
    public function getName(){
        return $this->name;
    }
    
     public function getCitiesChildren()
    {
        return $this->hasMany(AutoCities::className(), ['states' => 'id']);
    }
    public function getListCity(){
        
        return $this->getCitiesChildren()->all();
    }
    
}
