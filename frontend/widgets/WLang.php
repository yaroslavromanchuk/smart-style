<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Lang
 *
 * @author PHP
 */
//namespace common\modules\languages\widgets;
namespace frontend\widgets;
use common\models\Lang;
class WLang extends \yii\bootstrap\Widget{
    
    public function init(){}

    public function run() {
        return $this->render('list', [
            'current' => Lang::getCurrent(),
            'langs' => Lang::find()->where('id != :current_id and active != 0', [':current_id' => Lang::getCurrent()->id])->all(),
        ]);
    }
    
}
