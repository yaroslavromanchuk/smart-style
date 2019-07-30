<?php
return yii\helpers\ArrayHelper::map(\common\models\Message::find(['autoload' => true])->where('lang_id = 1')->all(), 'name', 'translate');
/*
return [
    'Home' => 'Головна',
    'Women' =>'Жінкам',
    'Men' => 'Чоловікам',
    'Login' =>'Увійти',
    'Logout' => 'Вийти',
    'Blog' => 'Блог',
    'About' => 'Про нас',
    'Contact' => 'Контакти',
];

*/