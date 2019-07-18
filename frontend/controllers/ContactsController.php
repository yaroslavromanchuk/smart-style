<?php

namespace frontend\controllers;
use Yii;
use yii\web\Controller;
use frontend\models\ContactForm;
class ContactsController extends Controller
{
    public function actionIndex()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Дякуємо, що зв\'язалися з нами. Ми відповімо Вам якнайшвидше.'));
            } else {
                Yii::$app->session->setFlash('error', Yii::t('app', 'Під час надсилання повідомлення сталася помилка.'));
            }

            return $this->refresh();
        } else {
            $config = [];
            $config['phone'][] = ['tel'=>'3800445003355', 'phone'=>'+38(044) 500-33-55'];
            $config['email'] = 'hello@smart-style.com.ua';
            $config['grafik'] = 'Пн-Нд 10:00 - 19:00';
            $config['addres'] = 'пр-т Перемоги, 34, Київ';
            
            
            return $this->render('index', [
                'model' => $model,
                'config' => $config,
            ]);
        }
    }

}
