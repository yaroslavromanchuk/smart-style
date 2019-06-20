<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "auto_categories".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoBodystyles[] $autoBodystyles
 * @property AutoDriverTypes[] $autoDriverTypes
 * @property AutoGearboxes[] $autoGearboxes
 * @property AutoMarks[] $autoMarks
 * @property AutoModels[] $autoModels
 * @property AutoOptions[] $autoOptions
 * @property Cars[] $cars
 */
class AutoCategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_categories';
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
    public function getAutoBodystyles()
    {
        return $this->hasMany(AutoBodystyles::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoDriverTypes()
    {
        return $this->hasMany(AutoDriverTypes::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoGearboxes()
    {
        return $this->hasMany(AutoGearboxes::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoMarks()
    {
        return $this->hasMany(AutoMarks::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoModels()
    {
        return $this->hasMany(AutoModels::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutoOptions()
    {
        return $this->hasMany(AutoOptions::className(), ['categories' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['categories_id' => 'id']);
    }
}
