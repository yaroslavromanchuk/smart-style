<?php
/*
 * Кнопка подписки
 */
namespace common\widgets;
use yii\base\Widget;
use common\models\Credit;
class CreditWidget extends Widget {
    public $credit;
    public $cars;
    public function init() {
        $this->credit = new Credit();        
    }
    public function run() {
        if($this->cars){
    return $this->render('credit',[
            'model' => $this->credit,
            'cars' => $this->cars
        ]);
        }else{
            return $this->render('credit_page',[
            'model' => $this->credit,
            'cars' => $this->cars
        ]);
        }
    }
}

