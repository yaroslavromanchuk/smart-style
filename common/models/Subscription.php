<?php

namespace common\models;
use Yii;
class Subscription extends \yii\db\ActiveRecord{
    public static function tableName()
    {
        return 'subscription';
    }
    public function rules(){
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['email'], 'trim'],
            [['email'], 'unique'],
            [['email', 'addtime'], 'string', 'max' => 150],
        ];
    }
    public function attributeLabels()
    {
        return [
            'id' => 'id',
            'email' => 'Email',
            'addtime' => 'Додано',
        ];
    }
    /**
     * 
     * @param type $from
     * @param type $to
     * @param type $subject
     * @param type $body
     * @return type
     */
    public function sendEmail($from, $to, $subject = '', $body = ''  )
    {
        return Yii::$app->mailer->compose()
            ->setTo($to)
            ->setFrom($from)
            ->setSubject($subject)
            ->setTextBody($body)
            ->send();
    }
}
