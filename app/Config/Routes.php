<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

use app\Controllers\Pages;

$routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('login', 'Login::index');
$routes->get('register', 'Register::index');
$routes->post('register', 'Register::save');
