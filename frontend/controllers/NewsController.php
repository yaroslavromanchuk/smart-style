<?php

namespace frontend\controllers;

use Yii;
use frontend\models\NewsItem;
use frontend\models\NewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NewsController implements the CRUD actions for NewsItem model.
 */
class NewsController extends Controller
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
     * Lists all NewsItem models.
     * @return mixed
     */
    public function actionIndex()
    {
         $this->view->body_class = 'blog blog-list right-sidebar';
        
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        
        $page =  $this->findModelPage(17);
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
        ]);
    }

    /**
     * Displays a single NewsItem model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->view->body_class = 'single-post right-sidebar'; 
        $model = $this->findModel($id);
        $this->view->title = $model->title;
         $this->view->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords],'keywords');

        $this->view->registerMetaTag(['name' => 'description', 'content' => $model->description], 'description');
        //$this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/cars/180-180/'.$model->image],'image');
       // $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/cars/180-180/'.$model->image],'property');
         
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new NewsItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new NewsItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NewsItem model.
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
     * Deletes an existing NewsItem model.
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
     * Finds the NewsItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return NewsItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = NewsItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('news', 'The requested page does not exist.'));
    }
}
