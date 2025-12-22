<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\ViajesController;


/**
 * @var RouteCollection $routes
 */

$routes->get('/', [ViajesController::class, 'index']);
$routes->get('viajes', [ViajesController::class, 'index']);
$routes->get('viajes/new', [ViajesController::class, 'new']); 
$routes->post('viajes/create', [ViajesController::class, 'create']); 
$routes->get('viajes/del/(:num)', [ViajesController::class, 'delete']); 
$routes->post('viajes/update/updated/(:num)', [ViajesController::class, 'updateItem']); 
$routes->get('viajes/update/(:num)', [ViajesController::class, 'update']); 
$routes->get('viajes/(:segment)', [ViajesController::class, 'show']);