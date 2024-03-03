<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'HomeController::index');
$routes->get('login', 'LoginController::index');
$routes->post('login', 'LoginController::auth');
$routes->get('register', 'RegisterController::index');
$routes->post('register', 'RegisterController::save');
$routes->group('user', static function ($routes) {
    $routes->get('card', 'CardController::index',['as'=>'user_card']);
    $routes->post('payment', 'CardController::payment');
    $routes->get('tickets', 'UserController::getTickets');
    $routes->get('reservations', 'UserController::getReservations');
    $routes->post('deleteReservation/(:num)', 'UserController::deleteReservation/$1');
});
$routes->get('searchTickets','TicketController::searchTickets');
$routes->get('routes','RouteController::getRoutes');