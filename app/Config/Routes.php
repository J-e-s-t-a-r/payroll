<?php

use CodeIgniter\Router\RouteCollection;


/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/employee', 'Home::employee');
$routes->get('/addemployee', 'Home::addemployee');
$routes->get('/guest', 'Home::guest');
$routes->get('/editemployee/(:any)', 'Home::editemployee/$1');
$routes->get('/deleteemployee/(:any)', 'Home::deleteemployee/$1');


$routes->get('/login', 'Auth::login');
$routes->get('/logout', 'Auth::logout');
$routes->match(['get','post'],'/register', 'Auth::register');
$routes->match(['get','post'],'/store', 'Home::store');
$routes->match(['get','post'],'/auth', 'Auth::auth');
$routes->match(['get','post'],'/payroll', 'Home::payroll');
$routes->match(['get','post'],'/updatepayroll', 'Home::updatepayroll');

$routes->get('/signin', 'Home::signin');

// GENERATE PDF FILES
$routes->get('/generateFiletoPDF/(:any)', 'Home::generateFiletoPDF/$1');

// AUTH
//$routes->get('/login', 'Auth::login');
//$routes->get('/register', 'Auth::register');


// SB-ADMIN TEMPLATES
$routes->get('/', 'SBAdmin::index');
$routes->get('/Err401', 'SBAdmin::error401');
$routes->get('/Err404', 'SBAdmin::error404');
$routes->get('/Err500', 'SBAdmin::error500');
$routes->get('/charts', 'SBAdmin::charts');
$routes->get('/layout1', 'SBAdmin::layout1');
$routes->get('/layout2', 'SBAdmin::layout2');
$routes->get('/tables', 'SBAdmin::tables');
//$routes->get('/login', 'SBAdmin::login');
//$routes->get('/password', 'SBAdmin::password');
//$routes->get('/register', 'SBAdmin::register');





//$routes->get('/register/(:any)', 'Auth::reg/$1');