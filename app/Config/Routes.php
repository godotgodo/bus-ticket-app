<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

use app\Controllers\PagesController;

$routes->get('pages', [PagesController::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::auth');
$routes->get('register', 'RegisterController::index');
$routes->post('register', 'RegisterController::save');
$routes->group('user', static function ($routes) {
    $routes->get('card', 'CardController::index');
    $routes->post('payment', 'CardController::payment');
    $routes->get('tickets', 'UserController::getTickets');
    $routes->get('tickets', 'UserController::getReservations');
});