<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;
/**
 * @var RouteCollection $routes
 */


$routes->get('/', [News::class, 'index']);
$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('news/del/(:num)', [News::class, 'delete']); // Add this line
$routes->post('news/update/updated/(:num)', [News::class, 'updateItem']); // Add this line
$routes->get('news/update/(:num)', [News::class, 'update']); // Add this line
$routes->get('news/(:segment)', [News::class, 'show']);

$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);





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