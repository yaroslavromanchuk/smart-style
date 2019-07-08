<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "slider_item".
 *
 * @property int $id
 * @property int $slider_id
 * @property string $src
 *
 * @property Slider $slider
 */
class SliderItem extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['file'], 'file', 'extensions' => 'png, jpg'],
            [['slider_id'], 'required'],
            [['slider_id'], 'integer'],
            [['src'], 'string', 'max' => 255],
            [['href'], 'string', 'max' => 150],
            [['slider_id'], 'exist', 'skipOnError' => true, 'targetClass' => Slider::className(), 'targetAttribute' => ['slider_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'slider_id' => Yii::t('app', 'Слайдер'),
            'src' => Yii::t('app', 'Картинка'),
            'href' => Yii::t('app', 'Посилання'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSlider()
    {
        return $this->hasOne(Slider::className(), ['id' => 'slider_id']);
    }
}
