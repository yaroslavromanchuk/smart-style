<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Menu;

class Footer extends Widget
{
     public function run() {
        return $this->render('footer',[
            'data' => [],
            'f_menu_1' => Menu::find()->where('children in(2,7) and visible != 0')->all(),
            'f_menu_2' => Menu::find()->where('children = 15 and visible != 0')->all(),
            'f_menu_3' => Menu::find()->where('children = 11 and visible != 0')->all(),
    ]);
    }
}