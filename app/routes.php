<?php

$routes = [
    '/' => ['handler' => ['MainController','index']],

    '/catalog' => ['handler' => ['CatalogController','index']],

    '/catalog/(.)*' => ['handler' => ['CatalogController','showCategory']],

    '/admin' => [
        'handler' => ['AdminController','index'],
        'policy' => 'is_admin'
    ]
];