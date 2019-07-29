<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "config".
 *
 * @property int $id
 * @property string $key_conf
 * @property string $value
 */
class Config extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'config';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['key_conf', 'value'], 'required'],
            [['key_conf', 'value'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'key_conf' => Yii::t('app', 'Ключ'),
            'value' => Yii::t('app', 'Значення'),
        ];
    }
}
