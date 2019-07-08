<?php
namespace frontend\widgets;

use yii\base\Widget;
//use frontend\models\Menu;

class Filter extends Widget{
     public function run() {
        return $this->render('filter');
    }
}