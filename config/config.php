<?php

return [
    'database' => [
        'driver' => 'mysql',
        'url' => env('EASYLINK_DB_URL'),
        'host' =>  env('EASYLINK_DB_HOST', 'localhost'),
        'port' => env('EASYLINK_DB_PORT', '3306'),
        'database' => env('EASYLINK_DB_DATABASE', 'fingerspot'),
        'username' => env('EASYLINK_DB_USERNAME', 'fingerspot'),
        'password' => env('EASYLINK_DB_PASSWORD', 'fingerspot'),
        'unix_socket' => env('EASYLINK_DB_SOCKET', ''),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => null,
        'options' => extension_loaded('pdo_mysql') ? array_filter([
            PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
        ]) : [],
    ]
];
