<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('/', 'Home::index', ['filter' => 'auth']);

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::login');
$routes->get('logout', 'AuthController::logout');

$routes->get('/produk', 'Produk::index', ['filter' => 'auth']);
$routes->get('/keranjang', 'Keranjang::index', ['filter' => 'auth']);
