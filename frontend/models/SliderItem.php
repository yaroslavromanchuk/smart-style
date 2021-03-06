<?php

namespace frontend\models;

use Yii;

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
            [['slider_id', 'src'], 'required'],
            [['slider_id'], 'integer'],
            [['src'], 'string', 'max' => 255],
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
            'slider_id' => Yii::t('app', 'Slider ID'),
            'src' => Yii::t('app', 'Src'),
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
