<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');
$routes->get('/form', 'Home::form');
$routes->post('/login_process', 'Process::login');
$routes->get('/logout', 'Process::logout');