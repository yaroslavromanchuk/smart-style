<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->getFullName()?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
      <!--  <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Пошук..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                   ['label' => 'Меню', 'options' => ['class' => 'header']],
                   ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                   ['label' => Yii::t('app', 'Автомобілі'), 'icon' => 'file-code-o', 'url' => ['/cars/index']],
                    [
                        'label' => Yii::t('app', 'Банери'),
                        'icon' => 'file-code-o',
                       // 'url' => ['/slider/index']
                        'items' =>[
                             ['label' => 'Головний слайдер', 'icon' => 'file-code-o', 
                                 'items'=>[
                                     ['label' => 'Всі слайдери', 'icon' => 'file-code-o', 'url' => ['/slider/index']],
                                     ['label' => 'Фото слайдерів', 'icon' => 'file-code-o', 'url' => ['/slideritem/index']],
                                 ]
                                 ],
                        ]
                        ],
                   /*  ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                    [
                        'label' => 'AUTO.RIA',
                        'url' => ['/ria/index'],
                            'items' => [
                                ['label' => 'Тип транспорту', 'url' => ['/autocategories/index']],
                                ['label' => 'Марки', 'url' => ['/marks/index']],
                                ['label' => 'Моделі', 'url' => ['/models/index']],
                                ['label' => 'Тип кузова', 'url' => ['/ria/bodystyles']],
                                ['label' => 'Області', 'url' => ['/ria/states']],
                                ['label' => 'Міста', 'url' => ['/ria/cities']],
                                ['label' => 'Тип приводу', 'url' => ['/ria/drivertypes']],
                                ['label' => 'Тип палива', 'url' => ['/ria/oil']],
                                ['label' => 'Коробка передач', 'url' => ['/ria/gearboxes']],
                                ['label' => 'Кольори', 'url' => ['/ria/colors']],
                                ['label' => 'Опції авто', 'url' => ['/ria/options']],
                                ['label' => 'Країна виробник', 'url' => ['/ria/countries']],
                                
                                
                                
                            ]
                    ]
                ],
            ]
        ) ?>

    </section>

</aside>
