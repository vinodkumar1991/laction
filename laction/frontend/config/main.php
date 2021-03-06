<?php
$params = array_merge(require (__DIR__ . '/../../common/config/params.php'), require (__DIR__ . '/../../common/config/params-local.php'), require (__DIR__ . '/params.php'), require (__DIR__ . '/params-local.php'));

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => [
        'log'
    ],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'home/home/home',
    'language' => 'en',
    'modules' => [
        'home' => [
            'class' => 'app\modules\home\home_module'
        ],
        'customers' => [
            'class' => 'app\modules\customers\customers_module'
        ],
        'booking' => [
            'class' => 'app\modules\booking\booking_module'
        ]
    ],
    'components' => [
        'db' => require (__DIR__ . '/database.php'),
        'db2' => require (__DIR__ . '/database2.php'),
        'request' => [
            'class' => 'common\components\Request',
            'web' => '/frontend/web',
            'csrfParam' => '_csrf-frontend'
        ],
        // 'user' => [
        // 'identityClass' => 'common\models\User',
        // 'enableAutoLogin' => true,
        // 'identityCookie' => [
        // 'name' => '_identity-frontend',
        // 'httpOnly' => true
        // ]
        // ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend'
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
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                // Home
                'home' => 'home/home/home',
                // Customers
                'login' => 'customers/customers/login',
                'register' => 'customers/customers/register',
                'forgot-password' => 'customers/customers/forgot-password',
                'contact-us' => 'customers/customers/contact-us',
                'logout' => 'customers/customers/logout',
                // Booking
                'booking' => 'booking/booking/booking',
                'videos' => 'home/home/videos',
                'profiles' => 'home/home/profiles',
                'profile' => 'customers/customers/profile',
                'policy' => 'home/home/policy',
                'tnc' => 'home/home/tnc',
                'profile' => 'customers/customers/profile',
                'bookings' => 'booking/booking/bookings'
            ]
        ]
    ],
    'params' => $params
];
