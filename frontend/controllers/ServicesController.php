<?php

namespace frontend\controllers;
use Yii;
class ServicesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /** Послуги */
    public function actionCredit()
    {
        $page =  $this->findModelPage(11);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('credit',[
            'page' => $page
        ]);
    }
    /** Послуги */
    
    /** Замовити */
    public function actionInsurance()
    {
         $page =  $this->findModelPage(12);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('insurance',[
            'page' => $page
        ]);
    }
    public function actionFinancing()
    {
         $page =  $this->findModelPage(13);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('financing',[
            'page' => $page
        ]);
    }
    /** Замовити */

}
