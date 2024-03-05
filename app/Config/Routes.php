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
    $routes->get('tickets', 'UserController::getTickets');
    $routes->get('reservations', 'UserController::getReservations');
    $routes->post('deleteReservation/(:num)', 'UserController::deleteReservation/$1');
    $routes->post('addToReservation','UserController::addToReservation');
});
$routes->group('process',static function ($routes){
    $routes->get('selectGoingSeats','ProcessController::getSelectGoingSeats');
    $routes->post('selectGoingSeats','ProcessController::selectGoingSeats');
    $routes->get('selectReturningSeats','ProcessController::getSelectReturningSeats');
    $routes->post('selectReturningSeats','ProcessController::selectReturningSeats');
    $routes->get('payment','ProcessController::getPayment');
    $routes->post('payment','ProcessController::payment');
});
$routes->post('selectRoute','RouteController::selectRoute');
$routes->get('searchTickets','TicketController::searchTickets');
//Should be working with dynamic data, now static html.
$routes->get('routes','RouteController::getRoutes');