<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cars;
use frontend\models\CarsSearch;
use frontend\models\ArchivSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
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

    /**
     * Lists all Cars models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->view->body_class = 'page left-sidebar';
        $PageSize = 15;
        if(Yii::$app->request->queryParams['page_size']){
       // $cookies = Yii::$app->response->cookies;
        if (Yii::$app->request->cookies->has('page_size')){
         Yii::$app->response->cookies->remove('page_size');
        }
        // добавление новой куки в HTTP-ответ
       Yii::$app->response->cookies->add(new \yii\web\Cookie([
    'name' => 'page_size',
    'value' => Yii::$app->request->queryParams['page_size']
]));
       $PageSize = Yii::$app->request->queryParams['page_size'];
        }else{
            $PageSize = Yii::$app->request->cookies->getValue('page_size', 15);
        }
        
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->pagination->PageSize = $PageSize;
        
        $page =  $this->findModelPage(2);
        if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
       $this->view->title = Yii::t('app', $page->title);
       $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('index', [
            'page' => $page,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'recommended' => Cars::find()->where(['status_id'=> 2, 'top' => 1])->limit(4)->all()
        ]);
    }

    /**
     * Displays a single Cars model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      //  print_r(Yii::$app->request);
        $this->view->body_class = 'single-product full-width';
        $model = $this->findModel($id);
        $model->views = (int)($model->views+1);
        $model->save();
         $this->view->title = $model->brand->name.' '.$model->model->name.' '.$model->year;//Yii::t('app', 'Каталог автомобілів');
         $page =  $this->findModelPage(3);
         
         if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
       $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');

        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Купити '.$model->brand->name.' '.$model->model->name.' '.$model->year.' '.$page->description.' '.$model->price.'$'], 'description');
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/cars/180/'.$model->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/cars/180/'.$model->image],'property');
        return $this->render('view', [
            'page' => $page,
            'model' => $model,
           // 'recommended' => Cars::find()->where(['status_id'=> 2, 'top' => 1])->limit(1)->all(),
            'recommended' => Cars::find()->where(['status_id'=>2])->andWhere(' id != '.$model->id.' and price <='.($model->price+1000).' and price >='.($model->price-1000))->orderBy('views DESC')->limit(4)->all(),
        ]);
    }
    public function actionArchiv()
    {
        $this->view->body_class = 'page home page-template-default';
        $page =  $this->findModelPage(18);
        if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
       $this->view->title = Yii::t('app', $page->title);
       $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        $searchModel = new ArchivSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('archiv/index', [
            'page' => $page,
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
           // 'recommended' => Cars::find()->where(['status_id'=> 2, 'top' => 1])->limit(4)->all()
        ]);
    }
    public function actionArchivView($id)
    {
        $this->view->body_class = 'single-product full-width';
        $model = $this->findModel($id);
        $model->views = (int)($model->views+1);
        $model->save(false);
         $this->view->title = $model->brand->name.' '.$model->model->name.' '.$model->year;//Yii::t('app', 'Каталог автомобілів');
         $page =  $this->findModelPage(19);
         
         if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
       $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');

        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Купити '.$model->brand->name.' '.$model->model->name.' '.$model->year.' '.$page->description.' '.$model->price.'$'], 'description');
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/cars/180/'.$model->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/cars/180/'.$model->image],'property');
        return $this->render('archiv/view', [
            'page' => $page,
            'model' => $model,
           // 'recommended' => Cars::find()->where(['status_id'=> 2, 'top' => 1])->limit(1)->all(),
            'recommended' => Cars::find()->where(['status_id'=>2])->andWhere(' id != '.$model->id.' and price <='.($model->price+1000).' and price >='.($model->price-1000))->orderBy('views DESC')->limit(4)->all(),
        ]);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreateorder()
    {
        $model = new \common\models\Orders();
      //  print_r(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->admin_id = 1;
            $model->date_add = date('Y-m-d');
            if ($model->save()) {
                $car  = $this->findModel($model->cars_id);
                $car->status_id = 3;
                $car->save();
            Yii::$app->response->refresh(); //очистка данных из формы
            echo "<p class='message_sub ok' style='color: green;padding: 15px 30px;text-align: center;'>Ваше замовлення прийняте! Найближчим часом з Вами звяжеться наш менеджер</p>";
            exit;
        }
           // return $this->redirect(['view', 'id' => $model->id]);
        }else {
       // print_r($model->errors);
        //Проверяем наличие фразы в массиве ошибки
        if(strpos($model->errors['email'][0], 'вже зайнято') !== false) {
            echo "<p class='message_sub error' style='color: red;padding: 15px 30px;text-align: center;'>Ви вже підписані на наші новини!</p>";
        }elseif(strpos($model->errors['phone'][0], 'вже зайнято') !== false){
             echo "<p class='message_sub error' style='color: red;padding: 15px 30px;text-align: center;'>Ви вже підписані на наші новини!</p>";
        }else{
             echo "<p class='message_sub error' style='color: red;padding: 15px 30px;text-align: center;'>Помилка оформлення замовлення.</p>";
        }          
    }        
    exit;
    }
    
    public function actionCreatecredit()
    {
        $model = new \common\models\Credit();
      //  print_r(Yii::$app->request->post());
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $model->admin_id = 1;
            $model->date_add = date('Y-m-d');
            if ($model->save()) {
            Yii::$app->response->refresh(); //очистка данных из формы
            echo "<p class='message_sub ok' style='color: green;padding: 15px 30px;text-align: center;'>Ваше заявка прийнята! Наш консультант зв'яжеться з вами найближчим часом.</p>";
            exit();
        }
           // return $this->redirect(['view', 'id' => $model->id]);
        }else{
            $err = "";
            foreach ($model->errors as $er) {
                foreach ($er as $value) {
                    $err.="<p  class='message_sub error' style='color: red;padding: 5px 30px;'>".$value."</p>";
                }
            }
            //echo $err;
             echo "<p class='message_sub error' style='color: red;padding: 15px 30px;text-align: center;'>Помилка оформлення заявки. Оновіть сторінку і спробуйте знову.</p>";        
    }        
    exit();
    }
    

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }/*

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
  /*  public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Cars model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Cars the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Cars::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
