<?php

namespace frontend\controllers;

class AboutController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
    public function actionAboutAs()
    {
        return $this->render('about-as');
    }
    public function actionVacancies()
    {
        return $this->render('vacancies');
    }
    public function actionPersonnel()
    {
        return $this->render('personnel');
    }

}
