<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=smartstyle',
            'username' => 'root',
            'password' => '',
            'enableSchemaCache' => false, //  Вместо `true` поставить `false` и обновить через Ctrl+F5 или Cmd + R (Mac OS)
            'schemaCacheDuration' => 3600,
            'schemaCache' => 'cache',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
             'class' => 'Swift_SmtpTransport',
             'host' => 'smart-style.com.ua',  // e.g. smtp.mandrillapp.com or smtp.gmail.com
             'username' => 'info@smart-style.com.ua',
             'password' => '9Qmal-sfttr-3DhO6',
             'port' => '465', // Port 25 is a very common port too
             'encryption' => 'ssl', // It is often used, check your provider or mail server specs
         ],
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
    ],
];
