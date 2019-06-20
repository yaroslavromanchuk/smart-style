<?php
namespace frontend\widgets;


use yii\base\Widget;
//use yii\helpers\Html;
use common\models\Menu;

class GMenu extends Widget
{
     public function run() {
         $menu = Menu::getStructure();
        return $this->render('menu',[
            'data' => $menu,
    ]);
    }
}
