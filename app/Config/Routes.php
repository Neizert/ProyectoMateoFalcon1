<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('nosotros', 'Home::nosotros');
$routes->get('contacto', 'Home::contacto');
$routes->get('principal', 'Home::principal');
$routes->get('terminosdeuso', 'Home::terminosdeuso');
$routes->get('comercio', 'Home::comercio');
$routes->get('sabores', 'Home::sabores');
$routes->get('bombones', 'Home::bombones');
$routes->get('paletas', 'Home::paletas');