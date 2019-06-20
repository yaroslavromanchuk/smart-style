<?php
use yii\widgets\Menu;
use yii\bootstrap\NavBar;
 NavBar::begin([
        'options' => [
            'class' => 'navbar navbar-primary navbar-full yamm ',
        ],
    ]);   
   /* <!--<div class="clearfix">
			<button class="navbar-toggler hidden-sm-up pull-right flip" type="button" data-toggle="collapse" data-target="#header-v3">
				&#9776;
			</button>
		</div>-->
    */
    echo Menu::widget([
    'items' => $data,
    'options' => [
                    'class' => 'nav navbar-nav',
                  ],
    'itemOptions'=>['class'=>'menu-item'],
    'submenuTemplate' => "<ul class='dropdown-menu yamm departments-menu-dropdown' role='menu'>\n{items}\n</ul>",
]);
     NavBar::end();
