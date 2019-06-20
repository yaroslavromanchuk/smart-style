<?php

namespace backend\controllers;

use Yii;
use backend\models\SliderItem;
use backend\models\SliderItemSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

/**
 * SlideritemController implements the CRUD actions for SliderItem model.
 */
class SlideritemController extends Controller
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
     * Lists all SliderItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderItemSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SliderItem model.
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
     * Creates a new SliderItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SliderItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
               $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                  $dir = Yii::getAlias('@app/../frontend/web/uploads/bloks/slider/');
                         Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/bloks/slider')); //создаст папку если ее нет!
                  $fileName = time(). '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    Image::getImagine()->open($dir . $fileName)->thumbnail(new Box(1920, 466))->save($dir . $fileName, ['quality' => 90]);
                    $model->src = '/uploads/bloks/slider/'. $fileName;
                    
                    if($model->save()){
                         return $this->redirect(['view', 'id' => $model->id]);
                    }
                    
                }
            }
           // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model
        ]);
    }

    /**
     * Updates an existing SliderItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
         $current_image = $model->src;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             $file = UploadedFile::getInstance($model, 'file');
            if ($file && $file->tempName) {
                $model->file = $file;
                if ($model->validate(['file'])) {
                    $dir = Yii::getAlias('@app/../frontend/web/uploads/bloks/slider/');
                      
                    if(file_exists(Yii::getAlias('@app/../frontend/web'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web'.$current_image));
                            $model->src = '';
                        }
               
                 // Yii::$app->controller->createDirectory(Yii::getAlias('../../frontend/web/uploads/cars/'.$model->id)); 
                  $fileName = time() . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    Image::getImagine()->open($dir . $fileName)->thumbnail(new Box(1920, 466))->save($dir . $fileName, ['quality' => 90]);
                    $model->src = '/uploads/bloks/slider/'. $fileName;
                    
                    if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }
                }
            }
            
           // return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SliderItem model.
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
     * Finds the SliderItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SliderItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SliderItem::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
