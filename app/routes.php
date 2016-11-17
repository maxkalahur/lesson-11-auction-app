<?php

$routes = [
    '/' => ['handler' => ['MainController','index']],

    '/catalog' => ['handler' => ['CatalogController','index']],

    '/catalog/(.)*' => ['handler' => ['CatalogController','showCategory']],

    '/lot' => ['handler' => ['LotController', 'showLot']],

    '/lot/(.)*'=>['handler' => ['LotController', 'withCategory']],

    '/account' => [
        'handler' => ['AccountController','index'],
        'policy' => 'is_user'
    ],

    '/admin' => [
        'handler' => ['AdminController','index'],
        'policy' => 'is_admin'
    ],
    '/login' => ['handler' => ['AuthController','login']],
    '/registration' => ['handler' => ['AuthController','registration']],
    '/fb-callback' => ['handler' => ['FBAuth','callBack']],


];