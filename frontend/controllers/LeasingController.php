<?php

namespace frontend\controllers;
use Yii;
class LeasingController extends \yii\web\Controller
{
    
    /** Лізинг */
    public function actionIndex()
    {
        $page =  $this->findModelPage(10);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
       
        $result = [];
        
        if(Yii::$app->request->isAjax){
            $result = Yii::$app->request->post('Leasing');
             return $this->renderAjax('leasing_result',['model'=>Yii::$app->request->post('Leasing')]);
        }
        return $this->render('index',[
            'page' => $page,
            'model' =>  \common\widgets\LeasingWidget::widget()
        ]);
    }
    public function actionAjax(){
        //$page =  $this->findModelPage(10);
        $result = '';
        if(Yii::$app->request->isAjax){
            return $this->renderAjax('leasing_result',['model'=>Yii::$app->request->post('Leasing')]);
        }
        
        return $this->render('index',[
           'model' => \common\widgets\LeasingWidget::widget(['result'=>$result])
        ]);
    }
    /** Лізинг */
}
