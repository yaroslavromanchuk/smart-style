<?php

namespace backend\controllers;

use Yii;
use backend\models\CarsImages;
use backend\models\CarsImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Upload;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;


/**
 * CarsImagesController implements the CRUD actions for CarsImages model.
 */
class ImagesController extends Controller
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
     * Lists all CarsImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarsImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CarsImages model.
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
     * Creates a new CarsImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($cars_id)
    {
        $model = new CarsImages();

        if ($model->load(Yii::$app->request->post())) {
            
             $id = CarsImages::find()->one()->id;
       $id++;
      // $model->id = $id;
            $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                /*  $dir = Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/600-600/');
                         Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/600-600')); //создаст папку если ее нет!
                  $fileName = time() . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                   $mig =  Image::getImagine()->open($dir . $fileName);
                   $mig->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/270-190')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 270, 190)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/270-190/') . $fileName, ['quality' => 70]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/180-180')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 180, 180)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/'.$cars_id.'/180-180/') . $fileName, ['quality' => 70]);
                   */
                    $model->image =   Upload::createImage($model, $id);
                }
            }
            if($model->save()){
                         return $this->redirect(['view', 'id' => $model->id]);
                    }
        }

        return $this->render('create', [
            'model' => $model,
            'cars_id' => $cars_id
        ]);
    }

    /**
     * Updates an existing CarsImages model.
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
            
            $model->image = Upload::updateImage($model,$current_image);
           if($model->save()){ return $this->redirect(['view', 'id' => $model->id]);}
             }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CarsImages model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model =  $this->findModel($id);

       Upload::deleteImage($model);
       
       $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarsImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CarsImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarsImages::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
