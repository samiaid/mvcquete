<?php

$routes = [
    'Item' => [ // Controller
        ['index', '/', 'GET'], // action, url, HTTP method
        ['show', '/item/{id:\d+}', 'GET'], // action, url, HTTP method
        ['add', '/item/add', ['GET', 'POST']],
        ['edit', '/item/edit/{id:\d+}', ['GET', 'POST']],
        ['delete', '/item/delete/{id:\d+}', ['GET']],
    ],
    'Category' => [
        ['index', '/categories', 'GET'], // action, url, HTTP method
        ['show', '/category/{id:\d+}', 'GET'], // action, url, HTTP method
        ['add', '/category/add', ['GET', 'POST']],
        ['edit', '/category/edit/{id:\d+}', ['GET', 'POST']],
        ['delete', '/category/delete/{id:\d+}', ['GET']],
    ],
];