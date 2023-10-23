<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/dashboard', 'Home::index');

/* Mascotas */
$routes->get('mascotas', 'Mascotas::index');
$routes->post('mascotas/agregar', 'Mascotas::agregar');
$routes->get('mascotas/eliminar/(:num)', 'Mascotas::eliminar/$1');
$routes->get('mascotas/editar/(:num)', 'Mascotas::editar/$1');
$routes->post('mascotas/actualizar/', 'Mascotas::actualizar/');
