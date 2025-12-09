<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News;
use App\Controllers\Pages;
/**
 * @var RouteCollection $routes
 */


//news
$routes->get('/', [News::class, 'index']);
$routes->get('news', [News::class, 'index']);
$routes->get('news/new', [News::class, 'new']); // Add this line
$routes->post('news', [News::class, 'create']); // Add this line
$routes->get('news/del/(:num)', [News::class, 'delete']); // Add this line
$routes->post('news/update/updated/(:num)', [News::class, 'updateItem']); // Add this line
$routes->get('news/update/(:num)', [News::class, 'update']); // Add this line
$routes->get('news/(:segment)', [News::class, 'show']);

//category

$routes->get('/', [Category::class, 'index']);
$routes->get('category', [Category::class, 'index']);
$routes->get('category/new', [Category::class, 'new']); // Add this line
$routes->post('category', [Category::class, 'create']); // Add this line
$routes->get('category/del/(:num)', [Category::class, 'delete']); // Add this line
$routes->post('category/update/updated/(:num)', [Category::class, 'updateItem']); // Add this line
$routes->get('category/update/(:num)', [Category::class, 'update']); // Add this line
$routes->get('category/(:segment)', [Category::class, 'show']);


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