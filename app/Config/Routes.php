<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');

$routes->get('reparaciones', 'ReparacionesController::index');
$routes->post('reparaciones/agregar', 'ReparacionesController::agregarReparacion');
$routes->get('reparaciones/eliminar/(:num)', 'ReparacionesController::eliminarReparaciones/$1');
$routes->get('reparaciones/buscar/(:num)', 'ReparacionesController::buscarReparaciones/$1');
$routes->post('reparaciones/modificar', 'ReparacionesController::modificarReparaciones');

// ------------------------------