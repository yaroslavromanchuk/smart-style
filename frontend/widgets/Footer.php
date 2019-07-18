<?php
namespace frontend\widgets;

use yii\base\Widget;
use common\models\Menu;
use \frontend\models\Cars;

class Footer extends Widget
{
     public function run() {
        return $this->render('footer',[
            'data' => [],
            'f_menu_1' => Menu::find()->where('children in(2,7) and visible != 0')->all(),
            'f_menu_2' => Menu::find()->where('children = 15 and visible != 0')->all(),
            'f_menu_3' => Menu::find()->where('children = 11 and visible != 0')->all(),
            'recommended' => Cars::find()->where(['status_id'=> 2])->andWhere(' old_price is NULL')->orderBy('add_cars DESC')->limit(3)->all(),
            'akciya' => Cars::find()->where('status_id = 2')->andWhere(' old_price > 0 ')->limit(3)->all(),
            'top' => Cars::find()->where('status_id = 2')->andWhere(' views > 0 ')->orderBy('views DESC')->limit(3)->all(),
    ]);
    }
}