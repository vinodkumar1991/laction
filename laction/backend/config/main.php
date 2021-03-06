<?php
$params = array_merge(require (__DIR__ . '/../../common/config/params.php'), require (__DIR__ . '/../../common/config/params-local.php'), require (__DIR__ . '/params.php'), require (__DIR__ . '/params-local.php'), require (__DIR__ . '/GlobalParams/Patterns.php'), require (__DIR__ . '/GlobalParams/Common.php'));

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute' => 'users/users/login',
    'bootstrap' => [
        'log'
    ],
    'modules' => [
        'dashboard' => [
            'class' => 'app\modules\dashboard\dashboard_module'
        ],
        'users' => [
            'class' => 'app\modules\users\users_module'
        ],
        'notifications' => [
            'class' => 'app\modules\notifications\notifications_module'
        ],
        'uploads' => [
            'class' => 'app\modules\uploads\uploads_module'
        ],
        'slots' => [
            'class' => 'app\modules\slots\slots_module'
        ],
        'reports' => [
            'class' => 'app\modules\reports\reports_module'
        ]
    ],
    'language' => 'en',
    'components' => [
        'db' => require (__DIR__ . '/database.php'),
        'db2' => require (__DIR__ . '/database2.php'),
        'i18n' => [
            'translations' => [
                'roles' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@app/messages'
                ],
                'titles' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@app/messages'
                ],
                'breadcrumb' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@app/messages'
                ]
            ]
        ],
        'request' => [
            'class' => 'common\components\Request',
            'web' => '/backend/web',
            'adminUrl' => '/admin',
            'csrfParam' => '_csrf-backend'
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => [
                'name' => '_identity-backend',
                'httpOnly' => true
            ]
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend'
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => [
                        'error',
                        'warning'
                    ]
                ]
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => require (__DIR__ . '/routing.php')
        ]
    ],
    'params' => $params
];
