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
// RUTAS PARA MOVIMIENTOS
// ------------------------------
$routes->get('movimientos', 'Movimientos::index');                       // Mostrar todos los movimientos
$routes->post('agregar_movimiento', 'Movimientos::agregar_movimiento');  // Agregar nuevo
$routes->get('eliminar_movimiento/(:num)', 'Movimientos::eliminar_movimiento/$1'); // Eliminar por ID
$routes->get('editar_movimiento/(:num)', 'Movimientos::editar_movimiento/$1');     // Cargar formulario de edición
$routes->post('actualizar_movimiento', 'Movimientos::actualizar_movimiento');      // Guardar cambios