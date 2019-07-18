<?php
use yii\helpers\Html; 
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
 NavBar::begin([
        'brandLabel' => Html::img('/images/logo.png',['class'=>'logo_moby']),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-primary navbar-full yamm ',
        ],
    ]);  
?> 
  
    <?php 
    echo Menu::widget([
    'items' => $data,
    'options' => [
                    'class' => 'nav navbar-nav',
                  ],
    'itemOptions'=>['class'=>'menu-item'],
    'submenuTemplate' => "<ul class='dropdown-menu yamm departments-menu-dropdown' role='menu'>\n{items}\n</ul>",
]);
     NavBar::end();
