<?php

namespace backend\models;

use Yii;
use common\models\Lang;
/**
 * This is the model class for table "message".
 *
 * @property int $id
 * @property string $name
 * @property string $translate
 * @property int $lang_id
 *
 * @property Lang $lang
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['translate'], 'required'],
            [['lang_id'], 'integer'],
            [['name', 'translate'], 'string', 'max' => 255],
            [['lang_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lang::className(), 'targetAttribute' => ['lang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Ключ'),
            'translate' => Yii::t('app', 'Переклад'),
            'lang_id' => Yii::t('app', 'Мова'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLang()
    {
        return $this->hasOne(Lang::className(), ['id' => 'lang_id']);
    }
}
