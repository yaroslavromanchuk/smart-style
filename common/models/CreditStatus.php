<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "credit_status".
 *
 * @property int $id
 * @property string $name
 * @property int $active
 *
 * @property Credit[] $credits
 */
class CreditStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credit_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['active'], 'integer'],
            [['name'], 'string', 'max' => 100],
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
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCredits()
    {
        return $this->hasMany(Credit::className(), ['status' => 'id']);
    }
}
