<?php
namespace frontend\widgets;

use yii\base\Widget;
use \frontend\models\AutoMarks;

class Header extends Widget
{
     public function run() {
        return $this->render('header',[
            'marks' => AutoMarks::find()->limit(10)->all(),
    ]);
    }
}
