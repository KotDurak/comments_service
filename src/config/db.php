<?php

return [
    'class' => 'yii\db\Connection',
    'dsn' => env('MYSQL_DSN'),
    'username' => env('MYSQL_USER'),
    'password' => env('MYSQL_PASSWORD'),
    'charset' => 'utf8',

    // Schema cache options (for production environment)
    //'enableSchemaCache' => true,
    //'schemaCacheDuration' => 60,
    //'schemaCache' => 'cache',
];
