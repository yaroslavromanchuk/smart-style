<?php

namespace frontend\controllers;
use Yii;
class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAboutAs()
    {
        $page =  $this->findModelPage(14);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('about-as',[
            'page' => $page
        ]); 
    }
    public function actionPersonnel()
    {
         $page =  $this->findModelPage(15);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('personnel',[
            'page' => $page
        ]);
    }
    public function actionVacancies()
    {
         $page =  $this->findModelPage(16);
         $this->view->title = Yii::t('app', $page->title);
            if(!$page->nofollow){$this->view->registerMetaTag(['name' => 'robots', 'content' => 'noindex, follow'],'robots'); }
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => $page->keywords],'keywords');
        $this->view->registerMetaTag(['name' => 'description', 'content' => $page->description], 'description');
        
        $this->view->registerMetaTag(['name' => 'image', 'content' => '/uploads/page/'.$page->image],'image');
        $this->view->registerMetaTag(['property' => 'og:image', 'content' => '/uploads/page/'.$page->image],'property');
        return $this->render('vacancies',[
            'page' => $page
        ]);
    }
    

}
