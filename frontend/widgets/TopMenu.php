<?php
namespace frontend\widgets;

use yii\base\Widget;
//use frontend\models\Menu;

class TopMenu extends Widget{
     public function run() {
        return $this->render('top-menu');
    }
}