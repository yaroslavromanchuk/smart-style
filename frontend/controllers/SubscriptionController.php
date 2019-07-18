<?php
namespace frontend\controllers;
use Yii;
use \yii\helpers\Html;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * CarsController implements the CRUD actions for Cars model.
 */
class SubscriptionController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
		
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
     //Форма подписки из виджета    
    public function actionSubscription(){
    $model = new \common\models\Subscription();
    
    if ($model->load(Yii::$app->request->post()) && $model->validate()){
        $email = Html::encode($model->email);
        $model->email = $email;
        $model->addtime =(string)time();
        $body = 'Ви щойно оформили підписку на новини від Smart-style.<br> Дякуємо за проявлену цікавість.<br> Ми будемо тримати Вас в курсі новин автопрому Укріїни.';
        if ($model->save() && $model->sendEmail(Yii::$app->params['adminEmail'], $email, Yii::t('app', 'Підписка на новини').' Smart-style.com.ua', Yii::t('app', $body))) {
            Yii::$app->response->refresh(); //очистка данных из формы
            echo "<p class='message_sub ok'>Подписка оформлена!</p>";
            exit;
        } 
    } else {
       // print_r($model->errors);
        //Проверяем наличие фразы в массиве ошибки
        if(strpos($model->errors['email'][0], 'вже зайнято') !== false) {
            echo "<p class='message_sub error'>Ви вже підписані на наші новини!</p>";
        }else{
             echo "<p class='message_sub error'>Помилка оформлення підписки.</p>";
        }          
    }        
    exit;
}
}
