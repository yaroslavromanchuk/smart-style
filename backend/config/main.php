<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log', 'languages'],
    'modules' => [
        'languages' => [
        'class' => 'common\modules\languages\LModule',
        //Языки используемые в приложении
        'languages' => [
            'EN' => 'en',
            'RU' => 'ru',
            'UA' => 'uk',
        ],
        'default_language' => 'uk', //основной язык (по-умолчанию)
        'show_default' => false, //true - показывать в URL основной язык, false - нет
    ],
    ],
    //'sourceLanguage' => 'uk',
    'components' => [
        'request' => [
            'baseUrl' => '',
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
      /*  'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],*/
        'language'=>'uk-UA',
        'i18n' => [
            'translations' => [
            'app' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/messages',
            'sourceLanguage' => 'uk',
            'fileMap' => [
                'main' => 'main.php',
            ],
        ],
    ],
],
    ],
    'params' => $params,
];
