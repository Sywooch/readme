<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'urlManager' => [
            'showScriptName' => false,
            'enablePrettyUrl' => true,
            'rules' => array(
                '' => 'app/index',
                '/' => 'app/index',
                '<action:(about|contact|publishhouses|genres|login|logout|signup|request-password-reset)>' => 'app/<action>',
                '<controller:\w+>' => '<controller>/list',
                '<controller:\w+>/<id:\d+>' => '<controller>/single',
            ),
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'l1Gh3todXuW-8eMyTQV1B8d4yoURnqid',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
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
            'errorAction' => 'app/error',
        ],
    ],
    'params' => $params,
];
