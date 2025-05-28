<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index');// muestra el menú principal
//login
$routes->get('login', 'LoginController::login');
$routes->post('autenticar', 'LoginController::autenticar');
$routes->get('logout', 'LoginController::logout');

// CRUD (crear, leer, actualizar y eliminar)básico para Mascotas
$routes->get('mascotas/mostrar', 'MascotaController::index/mostrar');
$routes->get('mascotas', 'MascotaController::index');
$routes->get('mascotas/crear', 'MascotaController::crear');
$routes->post('mascotas/guardar', 'MascotaController::guardar');
$routes->get('mascotas/editar/(:num)', 'MascotaController::editar/$1');
$routes->post('mascotas/actualizar/(:num)', 'MascotaController::actualizar/$1');
$routes->get('mascotas/eliminar/(:num)', 'MascotaController::eliminar/$1');
$routes->get('mascotas/editar', 'MascotaController::index');
$routes->get('relaciones/ver_mascotas_por_amo', 'RelacionesController::verMascotasPorAmo');
// CRUD básico para Amos
$routes->get('amos', 'AmoController::index');
$routes->get('amos/formulario_alta', 'AmoController::formulario_alta');
$routes->post('amos/guardar', 'AmoController::guardar');
$routes->get('amos/modificar', 'AmoController::formModificar');
$routes->post('amos/modificar/guardar', 'AmoController::guardarModificacion');
$routes->get('amos/editar/(:num)', 'AmoController::editar/$1');
$routes->get('relaciones/ver_amos_por_mascota', 'RelacionesController::verAmosPorMascota');

// CRUD básico para Veterinarios
$routes->get('veterinarios', 'VeterinarioController::index');
$routes->get('veterinarios/listarParaModificar', 'VeterinarioController::listarParaModificar');
$routes->get('veterinarios/listarParaBaja', 'VeterinarioController::listarParaBaja');
$routes->get('veterinarios/crear', 'VeterinarioController::crear');
$routes->post('veterinarios/guardar', 'VeterinarioController::guardar');
$routes->get('veterinarios/editar/(:num)', 'VeterinarioController::editar/$1');
$routes->post('veterinarios/actualizar/(:num)', 'VeterinarioController::actualizar/$1');
$routes->post('veterinarios/baja/(:num)', 'VeterinarioController::baja/$1');
$routes->get('veterinarios/confirmarBaja/(:num)', 'VeterinarioController::confirmarBaja/$1');
$routes->get('veterinarios/mascotas/(:num)', 'VeterinarioController::mascotas/$1');
//relacion registro de visistas veterinarias
$routes->get('relaciones/registrar_visita', 'RelacionesController::registrar_visita');
$routes->post('relaciones/guardar_visita', 'RelacionesController::guardar_visita');


// Relación amo-mascota (mostrar vista)
$routes->get('relaciones/amo_mascota', 'RelacionesController::amoMascota');
$routes->get('relaciones/alta', 'RelacionesController::alta');//alta de solo relacion
$routes->post('relaciones/guardarRelacion', 'RelacionesController::guardarRelacion');//garda relacion
$routes->get('relaciones/amo_mascota', 'RelacionesController::verRelaciones');//lista amo_mascota
$routes->get('relaciones/verRelaciones', 'RelacionesController::verRelaciones');//muestra la lista relaciones
$routes->get('relaciones/baja/(:num)', 'RelacionesController::formBaja/$1'); // muestra formulario de baja
$routes->post('relaciones/procesarBaja/(:num)', 'RelacionesController::procesarBaja/$1'); // procesa baja
$routes->post('relaciones/comprobar_mascotas', 'RelacionesController::comprobar_mascotas');

// Alta de relación 
$routes->get('/relaciones/formAlta', 'RelacionesController::formAlta');// Ruta para el formulario de Alta Amo + Mascota
$routes->post('/relaciones/guardar_alta', 'RelacionesController::guardarAlta');// Ruta para guardar la relación 
//prueba base de datos
$routes->get('/prueba_db', 'PruebaDB::index');
$routes->get('prueba_db/insertar', 'PruebaDB::insertar');
