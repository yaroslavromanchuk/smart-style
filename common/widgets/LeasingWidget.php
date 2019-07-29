<?php
/*
 * Кнопка подписки
 */
namespace common\widgets;
use yii\base\Widget;
use common\models\Leasing;
class LeasingWidget extends Widget {
    public $lising;
    public $result;
    public function init() {
        $this->lising = new Leasing();        
    }
    public function run() {
    return $this->render('leasing',[
            'model' => $this->lising,
            'result' => $this->result
        ]);
    }
}