<?php

namespace frontend\controllers;
use Yii;
class SellController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    /** Продати */
    public function actionBuyout()
    {
         $page =  $this->findModelPage(4);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('buyout',[
            'page' => $page
        ]);
    }
    public function actionTraidIn()
    {
         $page =  $this->findModelPage(5);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('traidin',[
            'page' => $page
        ]);
    }
    public function actionMoneyOnBail()
    {
         $page =  $this->findModelPage(6);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('money-on-bail',[
            'page' => $page
        ]);
    }
    public function actionCommissionCar()
    {
         $page =  $this->findModelPage(7);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('commission-car',[
            'page' => $page
        ]);
    }
     /** Продати */

}
