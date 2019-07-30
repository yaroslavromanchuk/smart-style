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
       /* 'mailer' => [
         'class' => 'yii\swiftmailer\Mailer',
        // 'useFileTransport' => false,
         'transport' => [
             'class' => 'Swift_SmtpTransport',
             'host' => 'smart-style.com.ua',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
             'username' => 'info@smart-style.com.ua',
             'password' => 'ed$n.p%ThJbI',
             'port' => '465', // Port 25 is a very common port too
             'encryption' => 'ssl', // It is often used, check your provider or mail server specs
         ],
     ],*/
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
        'config' => [ // сам компонент прописываем
            'class' => 'common\components\Config',
        ],
      
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => true,
            'class' => 'common\components\LangUrlManager',
            'suffix' => '/',
            'rules' => [
                'languages' => 'languages/lang/index/', //для модуля мультиязычности
		'/' => 'site/index',
                'auto-blog' => 'news/index',
                'auto-blog/<id:\d+>/' => 'news/view',
		'pokupka-auto' => 'cars/index',
                'pokupka-auto/<id:\d+>/' => 'cars/view',
                'arkhiv-prodannykh-avto' => 'cars/archiv',
                'arkhiv-prodannykh-avto/<id:\d+>/' => 'cars/archiv-view',
                'leasing'=>'leasing/index',
                'contacts'=>'contacts/index',
                '<action:(traid-in|buyout|money-on-bail|commission-car)>' => 'sell/<action>',
                '<action:(usa|europa)>' => 'order/<action>',
                '<action:(credit|insurance|financing)>' => 'services/<action>',
                '<action:(about-as|personnel|vacancies)>' => 'about/<action>',
               // '<controller:\w+>/<id:\d+>/' => '<controller>/view',
                
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',        
            ],
        ],
	'language'=>'uk-UA',
        'i18n' => [
            'translations' => [
            'app*' => [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@common/messages',
            'sourceLanguage' => 'uk',
            'fileMap' => [
                'main' => 'main.php',
                'main/error' => 'error.php',
            ],
            'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']
        ],
                'news' => [
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
