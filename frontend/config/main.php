<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'languages'],
    'controllerNamespace' => 'frontend\controllers',
    //'sourceLanguage' => 'uk',
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
    'components' => [
       'request' => [
                'baseUrl' => '',
                'class' => 'common\components\LangRequest',
		'csrfParam' => '_csrf-frontend',
                    'enableCookieValidation' => false,
                    'enableCsrfValidation' => false,
                          ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
      /*  
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'class' => 'common\components\LangUrlManager',
            'rules' => [
                        'languages' => 'languages/lang/index/', //для модуля мультиязычности
			'/' => 'site/index',
                       // '' => 'uk',
                        //'<action:(contact|login|logout|language|about|signup)>' => 'site/<action>',
			'<controller:\w+>/<action:\w+>/'=>'<controller>/<action>',
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
