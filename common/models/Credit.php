<?php

namespace common\models;

use Yii;
use frontend\models\Cars;

/**
 * This is the model class for table "credit".
 *
 * @property int $id
 * @property int $cars_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $admin_id
 * @property int $status
 * @property string $date_add
 * @property int $price
 * @property int $vnesok
 * @property int $month
 * @property double $stavka
 * @property int $credit
 * @property int $platij
 *
 * @property Cars $cars
 * @property User $admin
 * @property CreditStatus $status0
 */
class Credit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'credit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cars_id', 'name', 'phone', 'email',  'price', 'vnesok', 'month', 'stavka', 'credit', 'platij'], 'required'],
            [['cars_id', 'admin_id', 'status', 'price', 'vnesok', 'month', 'credit', 'platij'], 'integer'],
            [['date_add'], 'safe'],
            [['stavka'], 'number'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 150],
            [['cars_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['cars_id' => 'id']],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['admin_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => CreditStatus::className(), 'targetAttribute' => ['status' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'cars_id' => Yii::t('app', 'Автомобіль'),
            'name' => Yii::t('app', 'Ім\'я'),
            'phone' => Yii::t('app', 'Телефон'),
            'email' => Yii::t('app', 'Пошта'),
            'admin_id' => Yii::t('app', 'Відповідальний'),
            'status' => Yii::t('app', 'Статус'),
            'date_add' => Yii::t('app', 'Дата створення'),
            'price' => Yii::t('app', 'Ціна авто'),
            'vnesok' => Yii::t('app', 'Перший внесок'),
            'month' => Yii::t('app', 'Термін кредиту'),
            'stavka' => Yii::t('app', 'Процентна ставка'),
            'credit' => Yii::t('app', 'Залишковий платіж'),
            'platij' => Yii::t('app', 'Платіж в місяць'),
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
    public function getAdmin()
    {
        return $this->hasOne(User::className(), ['id' => 'admin_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(CreditStatus::className(), ['id' => 'status']);
    }
}
