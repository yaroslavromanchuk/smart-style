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
        return $this->render('index',[
            'page' => $page
        ]);
    }
    /** Лізинг */

}
