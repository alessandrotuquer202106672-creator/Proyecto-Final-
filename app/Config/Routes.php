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

$routes->get('/', 'Login::index');
$routes->get('/login', 'Login::index');
$routes->get('usuarios','UsuariosController::index');
$routes->get('areas','AreasController::index');


$routes->post('/login/autenticar', 'Login::autenticar');
$routes->get('/logout', 'Login::logout');


$routes->post('agregar_usuario','UsuariosController::agregarUsuario');
$routes->post('agregar_area','AreasController::agregarArea');

$routes->get('eliminar_usuario/(:num)','UsuariosController::eliminarUsuario/$1');
$routes->get('eliminar_area/(:num)','AreasController::eliminarArea/$1');

$routes->get('buscar_usuario/(:num)','UsuariosController::buscarUsuario/$1');
$routes->get('buscar_area/(:num)','AreasController::buscarArea/$1');

$routes->post('modificar_usuario','UsuariosController::modificarUsuario');
$routes->post('modificar_area','AreasController::modificarArea');

$routes->get('/dashboard/admin', 'Dashboard::admin');
$routes->get('/dashboard/supervisor', 'Dashboard::supervisor');
$routes->get('/dashboard/operador', 'Dashboard::operador');


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

