<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'language' => 'id',
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log','gii'],
    'homeUrl' => '/new_simpel',
     'modules' => [
     'mimin' => [
        'class' => 'hscstudio\mimin\Module',
    ],],
     'as access' => [
     'class' => 'hscstudio\mimin\components\AccessControl',
     'allowActions' => [
        // add wildcard allowed action here!
        'site/login/',
        'site/logout',
        'site/index/',
        'simpel-keg/spd/*',
        'simpel-personil/*',
        //'debug/*',
        '*',
        //'mimin/*', // only in dev mode
        ],
    ],
    'components' => [
      'assetManager' => [
            'bundles' => [
                'yii\bootstrap\BootstrapAsset' => [
                    'js' => ['js/bootstrap.js']
                ],
            ],
        ],
         'request' => [
           'baseUrl' => '/new_simpel',
       ],
          'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            //'enableStrictParsing' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
               //  ['class' => 'common\components\UrlRule', 'connectionID' => 'db', /* ... */],
            ],
        ],

          'urlManagerr' => [
            'class' => 'yii\web\urlManager',
            'baseUrl' => 'http://192.168.30.30/new_simpel/',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
        ],
        
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'autoRenewCookie' => true,
            'authTimeout' => 3000000,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // or use 'yii\rbac\DbManager'
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
    ],
   
    'params' => $params,
];

