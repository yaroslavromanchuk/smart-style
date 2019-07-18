<?php

namespace backend\models;
use \common\models\User;
use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $cars_id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property int $admin_id
 * @property int $status
 * @property string $date_add
 *
 * @property OrdersStatus $status0
 * @property User $admin
 * @property Cars $cars
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cars_id', 'name', 'phone', 'email', 'admin_id', 'date_add', 'price'], 'required'],
            [['cars_id', 'admin_id', 'status', 'price'], 'integer'],
            [['date_add'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 150],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => OrdersStatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['admin_id' => 'id']],
            [['cars_id'], 'exist', 'skipOnError' => true, 'targetClass' => Cars::className(), 'targetAttribute' => ['cars_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№'),
            'cars_id' => Yii::t('app', 'Автомобіль'),
            'name' => Yii::t('app', 'Імя'),
            'phone' => Yii::t('app', 'Телефон'),
            'email' => Yii::t('app', 'Пошта'),
            'price' => Yii::t('app', 'Ціна'),
            'admin_id' => Yii::t('app', 'Відповідальний'),
            'status' => Yii::t('app', 'Статус'),
            'date_add' => Yii::t('app', 'Дата створення'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderstatus()
    {
        return $this->hasOne(OrdersStatus::className(), ['id' => 'status']);
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
    public function getCars()
    {
        return $this->hasOne(Cars::className(), ['id' => 'cars_id']);
    }
}
