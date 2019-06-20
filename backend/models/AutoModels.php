<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_models".
 *
 * @property int $id
 * @property string $name
 * @property int $categories
 * @property int $marks
 *
 * @property AutoCategories $categories0
 * @property AutoMarks $marks0
 * @property Cars[] $cars
 */
class AutoModels extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_models';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'name', 'categories', 'marks'], 'required'],
            [['id', 'categories', 'marks'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['categories'], 'exist', 'skipOnError' => true, 'targetClass' => AutoCategories::className(), 'targetAttribute' => ['categories' => 'id']],
            [['marks'], 'exist', 'skipOnError' => true, 'targetClass' => AutoMarks::className(), 'targetAttribute' => ['marks' => 'id']],
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
            'marks' => Yii::t('app', 'Marks'),
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
    public function getMarks0()
    {
        return $this->hasOne(AutoMarks::className(), ['id' => 'marks']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasMany(Cars::className(), ['model_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return AutoModelsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutoModelsQuery(get_called_class());
    }
}
