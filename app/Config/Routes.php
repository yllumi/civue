<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->resource('dashboard/statistic', ['controller' => '\App\Pages\Dashboard\Statistic\PageAction']);
$routes->resource('dashboard', ['controller' => '\App\Pages\Dashboard\PageAction']);