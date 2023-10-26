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
$routes->get('mascotas/dieta/(:num)', 'Mascotas::mostrarDieta/$1');
$routes->get('mascotas/adoptador/(:num)/(:num)', 'Mascotas::mostrarAdoptador/$1/$2');
$routes->post('mascotas/adoptar', 'Mascotas::adoptar');