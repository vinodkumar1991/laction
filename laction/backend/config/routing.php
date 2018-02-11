<?php
return [
    '<controller:\w+>/<id:\d+>' => '<controller>/view',
    '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
    '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
    // Settings :: START
    'roles' => 'users/users/roles',
    'permissions' => 'users/users/permissions',
    'role-permissions' => 'users/users/role-permissions',
    'create-role-permissions' => 'users/users/create-role-permissions',
    'categories' => 'slots/slots/categories',
    'sub-categories' => 'slots/slots/sub-categories',
    // Settings :: END
    // Notifications :: START
    'subjects' => 'notifications/notification/subjects',
    'create-subject' => 'notifications/notification/create-sender-id',
    'templates' => 'notifications/notification/templates',
    'create-template' => 'notifications/notification/create-template',
    'edit-template/<id:\d+>' => 'notifications/notification/edit-template',
    // Notifications :: END
    // Slots :: START
    'slots' => 'slots/slots/slots',
    'create-slot' => 'slots/slots/create-slot',
    // Slots :: END
    // Users :: START
    'users' => 'users/users/users',
    'gen' => 'users/users/generate-otp', // Need To Remove
    'upload' => 'uploads/uploads/upload-files',
    'login' => 'users/users/login',
    'dashboard' => 'users/dashboard/dashboard',
    'logout' => 'users/users/logout',
    'forgot-password' => 'users/users/forgot-password'
    // Users :: END

];