<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "auto_options_category".
 *
 * @property int $id
 * @property string $name
 *
 * @property AutoOptions[] $autoOptions
 */
class AutoOptionsCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'auto_options_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
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
    public function getAutoOptions()
    {
        return $this->hasMany(AutoOptions::className(), ['cat_id' => 'id']);
    }
}
