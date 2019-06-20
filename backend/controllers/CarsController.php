<?php

namespace backend\controllers;

use Yii;
use backend\models\Cars;
use backend\models\CarsSearch;
use backend\models\AutoCities;
use backend\models\AutoMarks;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


/**
 * CarsController implements the CRUD actions for Cars model.
 */
class CarsController extends Controller
{
    public $option;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => [ 'view', 'create', 'update', 'delete','ajax'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
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
        $searchModel = new CarsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
    
    public function actionAjax()
    {
        if(Yii::$app->request->isAjax){
            
            $id = (int)Yii::$app->request->post('id');
            if(Yii::$app->request->post('method') == 'models'){
            
              if (($marks =  AutoMarks::findOne($id)) !== null) {
                 $this->option = '<option>Вкажіть модель автомобіля</option>';

            foreach ($marks->getAutoModels()->all() as $mark){
              $this->option .= '<option value="' . $mark->id . '">' . $mark->name . '</option>';
            }
              }else{
                  return false;
              }
            }elseif(Yii::$app->request->post('method') == 'cities'){
            
            $this->option = "<option >Вкажіть місто продажу автомобіля</option>";

            $cities = AutoCities::find()
                              ->where(['states' => $id])
                              ->orderBy('name')
                              ->all();
            foreach ($cities as $city){
                $this->option .= '<option value="' . $city->id . '">' . $city->name . '</option>';
            }

        }
        }
        return $this->option;
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
                 $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                  $dir = Yii::getAlias('@app/../frontend/web/uploads/cars/'.$model->id.'/');
                         Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$model->id)); //создаст папку если ее нет!
                  $fileName = $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    Image::getImagine()->open($dir . $fileName)->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                    $model->image = '/uploads/cars/'.$model->id.'/'. $fileName;
                    
                    if($model->save()){
                         return $this->redirect(['view', 'id' => $model->id]);
                    }
                    
                }
            }
            
               
           
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
         $current_image = $model->image;
        if ($model->load(Yii::$app->request->post())) {
             $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                    $dir = Yii::getAlias('@app/../frontend/web/uploads/cars/'.$model->id.'/');
                      
                    if(file_exists(Yii::getAlias('@app/../frontend/web'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web'.$current_image));
                            $model->image = '';
                        }
               
                 // Yii::$app->controller->createDirectory(Yii::getAlias('../../frontend/web/uploads/cars/'.$model->id)); 
                  $fileName = $model->file->baseName . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    Image::getImagine()->open($dir . $fileName)->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                    $model->image = '/uploads/cars/'.$model->id.'/'. $fileName;
                    
                    if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
                }
            }
            
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
      $model =  $this->findModel($id);
      
      if(file_exists(Yii::getAlias('@app/../frontend/web'.$model->image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web'.$model->image));
                        }
        $model->delete();

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

        throw new NotFoundHttpException(Yii::t('cars', 'The requested page does not exist.'));
    }
}
