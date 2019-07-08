<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Cars;
use frontend\models\CarsSearch;
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
        
        $PageSize = 15;
        if(Yii::$app->request->queryParams['page_size']){
          
       // $cookies = Yii::$app->response->cookies;
        if (Yii::$app->request->cookies->has('page_size')){
         Yii::$app->response->cookies->remove('page_size');
         
         
            //$cookies->getValue('page_size', Yii::$app->request->queryParams['page_size']);
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
        
       //$filter  = new stdClass();
       // $filter->year = [];
        $this->view->title = Yii::t('app', 'Купити автомобіль');
        
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'smart, smart-style, купити, бу авто'],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Кращі бу атомобілі – купити в ➦ Smart-style ☎:(044) 500-33-55,(050) 688-58-31,(093) 688-58-31. Гарантія якості ☑ Найкраща ціна $'], 'description');
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider
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
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Cars model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Cars();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cars model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cars model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

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
