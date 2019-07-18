<?php
namespace frontend\widgets;

use yii\base\Widget;
use \frontend\models\AutoMarks;

class Header extends Widget
{
     public function run() {
        return $this->render('header',[
            'marks' => AutoMarks::find()->innerjoinWith('cars')->select(['auto_marks.name', 'auto_marks.id'])->indexBy('id')->column(),
    ]);
    }
}
