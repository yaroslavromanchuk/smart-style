<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "template".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property int $active
 *
 * @property Page[] $pages
 */
class Template extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'template';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['active'], 'integer'],
            [['name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Назва шаблону'),
            'url' => Yii::t('app', 'Адреса'),
            'active' => Yii::t('app', 'Активність'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPages()
    {
        return $this->hasMany(Page::className(), ['template_id' => 'id']);
    }
}
