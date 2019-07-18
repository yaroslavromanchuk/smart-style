<?php
/*
 * Кнопка подписки
 */
namespace common\widgets;
use Yii;
use yii\base\Widget;
use common\models\Orders;
class NewOrderWidget extends Widget {
    public $orders;
    public $cars;
    public function init() {
        $this->orders = new Orders();        
    }
    public function run() {
    return $this->render('order',[
            'model' => $this->orders,
            'cars' => $this->cars
        ]);
    }
}

