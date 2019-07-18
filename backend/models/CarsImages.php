<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "cars_images".
 *
 * @property int $id
 * @property int $cars_id
 * @property string $image
 *
 * @property Cars $cars
 */
class CarsImages extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['cars_id', 'image', 'file'], 'required'],
            [['cars_id'], 'integer'],
            [['image'], 'string', 'max' => 150],
            [['cars_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['cars_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cars_id' => Yii::t('app', '№ авто'),
            'image' => Yii::t('app', 'Фото'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }
}
