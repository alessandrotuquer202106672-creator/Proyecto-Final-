<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');

$routes->post('/login/autenticar', 'Login::autenticar');
$routes->get('/logout', 'Login::logout');


$routes->get('/dashboard/admin', 'Dashboard::admin');
$routes->get('/dashboard/supervisor', 'Dashboard::supervisor');
$routes->get('/dashboard/operador', 'Dashboard::operador');