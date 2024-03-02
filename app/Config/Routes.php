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
$routes->post('login', 'Login::auth');
$routes->get('register', 'Register::index');
$routes->post('register', 'Register::save');
$routes->group('user', static function ($routes) {
    $routes->get('card', 'Card::index');
    $routes->post('payment', 'Card::payment');
    $routes->get('tickets', 'User::getTickets');
    $routes->get('tickets', 'User::getReservations');
});