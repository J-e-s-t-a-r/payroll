<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// AUTH
$routes->get('/login', 'Auth::login');
$routes->get('/register', 'Auth::register');
$routes->get('/register/(:any)', 'Auth::reg/$1');