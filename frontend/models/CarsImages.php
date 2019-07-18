<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "cars_images".
 *
 * @property int $id
 * @property int $cars_id
 * @property string $src
 *
 * @property Cars $cars
 */
class CarsImages extends \yii\db\ActiveRecord
{
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
            [['cars_id', 'src'], 'required'],
            [['cars_id'], 'integer'],
            [['src'], 'string', 'max' => 150],
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
            'cars_id' => Yii::t('app', 'Cars ID'),
            'src' => Yii::t('app', 'Src'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }
    
    public function getImages($width = 0)
    {
       switch ($width){
            case 600: return '/uploads/cars/600-600/'.$this->image;
            case 270: return '/uploads/cars/270-190/'.$this->image;
            case 180: return '/uploads/cars/180-180/'.$this->image;
            default : return '/uploads/cars/img/'.$this->image;
               
       }
    }
}
