<?php

namespace backend\models;

use Yii;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

class Upload
{
    public function createImage($model, $id) {
       $dir = Yii::getAlias('@app/../frontend/web/uploads/cars/img/');
                        Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/img')); //создаст папку если ее нет!
                        
                  $fileName = $id.'_'.time() . '.' . $model->file->extension;
                  
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                    
                   $mig =  Image::getImagine()->open($dir . $fileName);
                   //$mig->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                   $mig->save($dir . $fileName, ['quality' => 90]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600')); //создаст папку если ее нет!
                    Image::thumbnail($dir . $fileName, 600, 600)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/') . $fileName, ['quality' => 70]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190')); //создаст папку если ее нет!
                   
                   Image::thumbnail($dir . $fileName, 270, 190)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/') . $fileName, ['quality' => 60]);
                   
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 180, 180)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/') . $fileName, ['quality' => 50]);
        return $fileName;
    }
    
     public function updateImage($model, $current_image) {
       
                    $dir = Yii::getAlias('@app/../frontend/web/uploads/cars/img/');
                        Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/img')); //создаст папку если ее нет!
                        
                     if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/img/'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/img/'.$current_image));
                           // $model->image = '';
                        }   
                    if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/'.$current_image)))
                        {
                            //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/'.$current_image));
                           // $model->image = '';
                        }
                        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/'.$current_image))){
                                 //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/'.$current_image));
                           // $model->image = '';
                        }
                        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/'.$current_image))){
                                 //удаляем файл
                            unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/'.$current_image));
                          //  $model->image = '';
                        }
                 // Yii::$app->controller->createDirectory(Yii::getAlias('../../frontend/web/uploads/cars/'.$model->id)); 
                  $fileName = $model->id.'_'.time() . '.' . $model->file->extension;
                    $model->file->saveAs($dir . $fileName);
                    $model->file = $fileName; // без этого ошибка
                   // Image::getImagine()->open($dir . $fileName)->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                    $mig =  Image::getImagine()->open($dir . $fileName);
                    
                    $mig->save($dir . $fileName, ['quality' => 70]);
                   //$mig->thumbnail(new Box(600, 600))->save($dir . $fileName, ['quality' => 90]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 600, 600)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/') . $fileName, ['quality' => 70]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 270, 190)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/') . $fileName, ['quality' => 60]);
                   Yii::$app->controller->createDirectory(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180')); //создаст папку если ее нет!
                   Image::thumbnail($dir . $fileName, 180, 180)->save(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/') . $fileName, ['quality' => 50]);
                    
        return $fileName;
    }
    public function deleteImage($model) {
        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/img/'.$model->image)))
            {
                //удаляем файл
                unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/img/'.$model->image));
            }
        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/'.$model->image)))
            {
                //удаляем файл
                unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/600-600/'.$model->image));
            }
        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/'.$model->image)))
                {
                    //удаляем файл
                    unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/270-190/'.$model->image));
                }
        if(file_exists(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/'.$model->image)))
                {
                    //удаляем файл
                    unlink(Yii::getAlias('@app/../frontend/web/uploads/cars/180-180/'.$model->image));
                }
        return true;
    }
    
    
}