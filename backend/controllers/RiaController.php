<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

//use common\models\LoginForm;
use backend\models\Ria;

use backend\models\Categories;
use backend\models\Marks;
use backend\models\Models;
use backend\models\Bodystyles;
use backend\models\Cities;
use backend\models\Colors;
use backend\models\Countries;
use backend\models\DriverTypes;
use backend\models\Gearboxes;
use backend\models\Oil;
use backend\models\Options;
use backend\models\States;

class RiaController extends Controller
{
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
                        'actions' => ['error', 'categories', 'marks', 'models', 'states', 'bodystyles', 'cities', 'colors', 'countries', 'drivertypes', 'gearboxes', 'oil', 'options'],
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
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    public function actionIndex()
    {
        return $this->render('index',[
            'data' => []
        ]);
    }
    
     public function actionCategories()
    {
        // $model = new Ria();
       /*  foreach ($model->getCategories() as $c) {
             $cat = new Categories();
             $cat->id = $c->value;
             $cat->name = $c->name;
             $cat->save();
         }*/
          $сategories =  Categories::find()->all(); 
        return $this->render('categories',[
            'model' => $сategories,
        ]);
        
    }
     public function actionMarks()
    {
       //  $model = new Ria();
        
        // foreach ($model->getMarks(1) as $c) {
             
            /* foreach ($model->getModels(['category'=> 1, 'marks'=>1]) as $m) {
             $cat = new Models();
             $cat->id = $m->value;
             $cat->name = $m->name;
             $cat->categories = 1;
             $cat->marks = 1;
             $cat->save();
             }*/
            // $cat = new Marks();
             //$cat->id = $c->value;
           //  $cat->name = $c->name;
            // $cat->categories = 1;
            // $cat->save();
            
       // }
          
        return $this->render('marks',[
            'model' => Marks::find()->all(),
        ]);
    }
    public function actionModels()
    {
        // $model = new Ria();
        return $this->render('models',[
            'model' => Models::find()->all(),
        ]);
    }
    public function actionBodystyles()
    {
        /* $model = new Ria();
         foreach ($model->getBodystyles(1) as $c) {
         $cat = new Bodystyles();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->categories = 1;
            $cat->save();
         }
         */
        return $this->render('bodystyles',[
            'model' =>Bodystyles::find()->all(),
        ]);
    }
    public function actionStates()
    {
     /*    $model = new Ria();
         foreach ($model->getStates() as $c) {
         $cat = new States();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->save();
            
            foreach ($model->getCities($c->value) as $ci) {
            $cc = new Cities();
            $cc->id = $ci->value;
            $cc->name = $ci->name;
            $cc->states = $c->value;
            $cc->save();
                
            }
         }*/
         
        return $this->render('states',[
            'model' =>States::find()->all(),
        ]);
    }
    public function actionCities()
    {
       /*  $model = new Ria();
        
          $id = 25;
        foreach ($model->getCities($id) as $ci) {
            $cc = new Cities();
            $cc->id = $ci->value;
            $cc->name = $ci->name;
            $cc->states = $id;
            $cc->save();
                
            }
            */
          
            
        return $this->render('cities',[
            'model' =>Cities::find()->all(),
        ]);
    }
     public function actionColors()
    {
      /*   $model = new Ria();
         foreach ($model->getColors() as $c) {
            $cat = new Colors();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->save();
         }*/
        return $this->render('colors',[
            'model' =>Colors::find()->all(),
        ]);
    }
     public function actionCountries()
    {
        /* $model = new Ria();
         foreach ($model->getCountries() as $c) {
            $cat = new Countries();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->save();
         }*/
        return $this->render('countries',[
            'model' =>Countries::find()->all(),
        ]);
    }
     public function actionDrivertypes()
    {
        /* $model = new Ria();
         foreach ($model->getDriverTypes(1) as $c) {
            $cat = new DriverTypes();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->categories = 1;
            $cat->save();
         }*/
        return $this->render('drivertypes',[
            'model' =>DriverTypes::find()->all(),
        ]);
    }
     public function actionGearboxes()
    {
       /*  $model = new Ria();
         foreach ($model->getGearboxes(1) as $c) {
            $cat = new Gearboxes();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->categories = 1;
            $cat->save();
         }*/
        return $this->render('gearboxes',[
            'model' =>Gearboxes::find()->all(),
        ]);
    }
     public function actionOil()
    {
      /*   $model = new Ria();
         foreach ($model->getTypeOil() as $c) {
            $cat = new Oil();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->save();
         }
         */
        return $this->render('oil',[
            'model' =>Oil::find()->all(),
        ]);
    }
     public function actionOptions()
    {
       /*  $model = new Ria();
         foreach ($model->getOptions(1) as $c) {
            $cat = new Options();
            $cat->id = $c->value;
            $cat->name = $c->name;
            $cat->categories = 1;
            $cat->save();
         }*/
        return $this->render('options',[
            'model' =>Options::find()->all(),
        ]);
    }

}
