<?php

return [
    '/seller/view/<id:\d+>'  => '/seller/view',
    '/product/view/<id:\d+>'  => '/product/view',
    '/comment/update/<id:\d+>'  => '/comment/update',
    '/comment/view/<id:\d+>'    => '/comment/view',

    [
        'class'         => \yii\rest\UrlRule::class,
        'controller'    => ['api/comment'],
       /* 'extraPatterns'      => [
            'GET <name>/<id>' => 'view',
        ]*/
    ],
];