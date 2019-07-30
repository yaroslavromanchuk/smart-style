<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'session' =>[
            'class' => 'yii\web\DbSession',
            'writeCallback' => function(){ return ['user_id' => Yii::$app->user->id]; }
        ],
        'cache' => [
            //'class' => 'yii\caching\FileCache',
            'class' => 'yii\caching\DummyCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'cache' => 'cache'
            //'class' => 'yii\rbac\PhpManager',
            //зададим куда будут сохраняться наши файлы конфигураций RBAC
           // 'itemFile' => '@common/components/rbac/items.php',
           // 'assignmentFile' => '@common/components/rbac/assignments.php',
            //'ruleFile' => '@common/components/rbac/rules.php'
        ],
    ],
];
