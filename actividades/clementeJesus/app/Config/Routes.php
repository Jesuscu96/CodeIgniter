<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Artistas;
use App\Controllers\EventosController;

/**
 * @var RouteCollection 
 */
$routes->setAutoRoute(false);


$routes->get('/', 'EventosController::index');

// Rutas para EventosController 
$routes->get('eventos', [EventosController::class, 'index']);
$routes->get('eventos/new', [EventosController::class, 'new']); 
$routes->post('eventos', [EventosController::class, 'create']); 
$routes->get('eventos/del/(:num)',[EventosController::class, 'delete']);
$routes->post('eventos/update/updated/(:num)',[EventosController::class, 'updatedItem']);
$routes->get('eventos/update/(:num)',[EventosController::class, 'update']);
// La ruta con segmento variable DEBE ir al final de las rutas de EventosController
$routes->get('eventos/(:segment)', [EventosController::class, 'show']); 


