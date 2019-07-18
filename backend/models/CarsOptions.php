<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars_options".
 *
 * @property int $id
 * @property int $cars_id
 * @property int $options_id
 * @property string $src
 *
 * @property Cars $cars
 * @property AutoOptions $options
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
            [['cars_id', 'options_id'], 'required'],
            [['cars_id', 'options_id'], 'integer'],
            [['cars_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['cars_id' => 'id']],
            [['options_id'], 'exist', 'skipOnError' => true, 'targetClass' => AutoOptions::className(), 'targetAttribute' => ['options_id' => 'id']],
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
}
