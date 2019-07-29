<?php
print_r(\common\models\Message::find()->select(['name', 'translate'])->where('lang_id = 1')->indexBy('name')->column());
return \common\models\Message::find()->select(['name', 'translate'])->where('lang_id = 1')->indexBy('name')->column();
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