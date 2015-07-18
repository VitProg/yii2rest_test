<?php

$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'modules' => [
        'common' => [
            'class' => 'app\modules\common\CommonModule',
        ],
        'api' => [
            'class' => 'app\modules\api\ApiModule',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'app\modules\common\models\User',
            'enableAutoLogin' => false,
            'loginUrl' => null,
            'enableSession' => false,
        ],
        'response' => [
            'format' => \yii\web\Response::FORMAT_JSON,
            'charset' => 'UTF-8',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'request' => [
            'class' => '\yii\web\Request',
            'enableCookieValidation' => false,
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'urlManager' => [
            'class' => 'yii\\web\\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                '' => 'common/default/index',
                'login' => 'common/default/login',
                'logout' => 'common/default/logout',
                'signup' => 'common/default/signup',
                'request-password-reset' => 'common/default/requestPasswordReset',
                'reset-password' => 'common/default/resetPassword',
                ['class' => 'yii\\rest\\UrlRule', 'controller' => ['model' => 'api/model']],
                ['class' => 'yii\\rest\\UrlRule', 'controller' => ['my/cars' => 'api/car']],
                'OPTIONS user/login' => 'api/user/login',
                'POST user/login' => 'api/user/login',
            ],
        ],
//        'errorHandler' => [
////            'class' => 'app\modules\api\components\ApiErrorHandler',
//            'errorAction' => 'common/default/error',
//        ],
//        'mailer' => [
//            'class' => 'yii\swiftmailer\Mailer',
//            // send all mails to a file by default. You have to set
//            // 'useFileTransport' to false and configure a transport
//            // for the mailer to send real emails.
//            'useFileTransport' => true,
//        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['*'],
    ];
}

return $config;
