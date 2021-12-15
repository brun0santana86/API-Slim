<?php
return [
    'settings' => [
        'displayErrorDetails' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
        ],

        //db settings
        'db'=>  [
            'driver'=>'mysql',
            'host'=>'localhost',
            'database'=>'slim',
            'username'=>'root',
            'password'=>'bds02101986',
            'charset'=>'utf8',
            'collation'=>'utf8_unicode_ci',
            'prefix'=>'',
                ],

        //secret key
        'secretKey' => 'bc3e5e05b2230fa9d1e049c1bad3102e4034828b'
    ],
];
