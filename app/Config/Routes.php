<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->group('pages', function ($subroutes) {
    $subroutes->setNamespace('App\Controllers\Pages');
    $subroutes->resource('{any}', ['only' => ['index']]);
}, ['filter' => 'pages']);
