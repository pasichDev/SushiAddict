<?php

use Dotenv\Dotenv;

//Start ENV
$dotenv = Dotenv::createImmutable(dirname(__DIR__) . '/config');
$dotenv->load();
$dotenv->safeLoad();

//Check empty env
$dotenv->required(['DATABASE_HOST', 'DATABASE', 'DATABASE_USER'])->notEmpty();

return [
    'settings' => [
        'addContentLengthHeader' => false,
        'displayErrorDetails' => true,
        'db' => [
            'Host' => $_ENV['DATABASE_HOST'],
            'Database' => $_ENV['DATABASE'],
            'Username' => $_ENV['DATABASE_USER'],
            'Password' => $_ENV['DATABASE_PASSWORD']
        ],
        'API_KEYS' => [
            'API_KEY_FONT' => $_ENV['PUBLIC_FRONT_ACCES_TOKEN_API']
        ]
    ]

];
