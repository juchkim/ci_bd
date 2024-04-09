<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/form', 'Home::form');
$routes->get('/logout', 'Process::logout');
$routes->get('/read/(:num)', 'Home::read/$1');

$routes->post('/login_process', 'Process::login');
$routes->post('/register', 'Process::form');
