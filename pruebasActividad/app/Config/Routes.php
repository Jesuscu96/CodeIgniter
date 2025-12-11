<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\JuegosController;


/**
 * @var RouteCollection $routes
 */

/* $routes->get('/', [JuegosController::class, 'index']); */
$routes->get('juegos', [JuegosController::class, 'index']);
$routes->get('juegos/new', [JuegosController::class, 'new']); 
$routes->post('juegos/create', [JuegosController::class, 'create']); 
$routes->get('juegos/del/(:num)', [JuegosController::class, 'delete']); 
$routes->post('juegos/update/updated/(:num)', [JuegosController::class, 'updateItem']); 
$routes->get('juegos/update/(:num)', [JuegosController::class, 'update']); 
