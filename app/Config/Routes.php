<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('folios', 'Folios::index');
$routes->match(['get','post'], 'folios/create', 'Folios::create');
$routes->get('folios/confirmDelete/(:num)', 'Folios::confirmDelete/$1');
$routes->post('folios/delete/(:num)', 'Folios::delete/$1');

$routes->get('programaciones', 'Programaciones::index');
$routes->get('programaciones/create', 'Programaciones::create');
$routes->post('programaciones/store', 'Programaciones::store');
$routes->get('programaciones/show/(:num)', 'Programaciones::show/$1');
$routes->get('programaciones/edit/(:num)', 'Programaciones::edit/$1');
$routes->post('programaciones/update/(:num)', 'Programaciones::update/$1');
$routes->get('programaciones/delete/(:num)', 'Programaciones::delete/$1');

