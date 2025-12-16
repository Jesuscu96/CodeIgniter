<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\NewsController;
use App\Controllers\CategoryController;
use App\Controllers\Pages;
/**
 * @var RouteCollection $routes
 */
$routes->setAutoRoute(false);
//Frontend
$routes->get('/', [NewsController::class, 'index']);
$routes->get('news', [NewsController::class, 'index']);
$routes->get('frontend/news/(:segment)', [NewsController::class, 'show']);

//Backend
$routes->group('backend', function($routes){
    
    //news
    $routes->get('/', [NewsController::class, 'index/backend']);
    $routes->get('news', [NewsController::class, 'index']);
    $routes->get('news/new', [NewsController::class, 'new']); // Add this line
    $routes->post('news', [NewsController::class, 'create']); // Add this line
    $routes->get('news/del/(:num)', [NewsController::class, 'delete']); // Add this line
    $routes->post('news/update/updated/(:num)', [NewsController::class, 'updateItem']); // Add this line
    $routes->get('news/update/(:num)', [NewsController::class, 'update']); // Add this line
    $routes->get('news/(:segment)', [NewsController::class, 'show']);

    //category
    $routes->get('categories', [CategoryController::class, 'index']);
    $routes->get('categories/new', [CategoryController::class, 'new']); // Add this line
    $routes->post('categories/create', [CategoryController::class, 'create']); // Add this line
    $routes->get('categories/del/(:num)', [CategoryController::class, 'delete']); // Add this line
    $routes->post('categories/update/updated/(:num)', [CategoryController::class, 'updateItem']); // Add this line
    $routes->get('categories/update/(:num)', [CategoryController::class, 'update']); // Add this line
    $routes->get('categories/(:segment)', [CategoryController::class, 'show']);
});









// $routes->setAutoRoute(false);

// $routes->get('/', 'Home::index');
// $routes->get('news', 'News::index');
// $routes->get('news/new', 'News::new');
// $routes->post('news/create', 'News::create');
// $routes->get('news/(:segment)', 'News::show');


// $routes->get('news', [News::class, 'index']);           // Add this line
// $routes->get('news/(:segment)', [News::class, 'show']); // Add this line

// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);