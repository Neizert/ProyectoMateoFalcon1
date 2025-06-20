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


$routes->get('registro', 'UsuarioController::registro');
$routes->post('guardar', 'UsuarioController::guardar');

$routes->get('login', 'UsuarioController::login');
$routes->post('acceder', 'UsuarioController::acceder');

$routes->get('logout', 'UsuarioController::logout');

$routes->get('test', 'UsuarioController::test');

$routes->get('carrito', 'CarritoController::ver');
$routes->get('carrito/agregar/(:num)/(:segment)', 'CarritoController::agregar/$1/$2');
$routes->get('carrito/agregar/(:num)', 'CarritoController::agregar/$1'); // fallback

$routes->get('carrito/eliminar/(:num)', 'CarritoController::eliminar/$1');
$routes->get('carrito/vaciar', 'CarritoController::vaciar');
$routes->post('carrito/actualizar/(:num)', 'CarritoController::actualizar/$1');

// Grupo admin protegido con filtro role:1 (solo admins)
$routes->group('admin', ['filter' => 'role:1'], function($routes) {

    
    // Gestión de facturas
    $routes->get('facturas', 'AdminFacturasController::index');
    $routes->get('facturas/ver/(:num)', 'AdminFacturasController::ver/$1');

    $routes->get('', 'AdminController::index');
    $routes->get('consultas', 'AdminConsultasController::index');
    $routes->get('consultas/baja/(:num)', 'AdminConsultasController::baja/$1');
    // Rutas para administrar productos dentro de admin
    $routes->group('productos', function($routes) {
        $routes->get('', 'AdminProductosController::index');
        $routes->get('crear', 'AdminProductosController::crear');
        $routes->post('guardar', 'AdminProductosController::guardar');
        $routes->get('editar/(:num)', 'AdminProductosController::editar/$1');
        $routes->post('actualizar', 'AdminProductosController::actualizar');
        $routes->get('baja/(:num)', 'AdminProductosController::bajaLogica/$1');
        $routes->get('alta/(:num)', 'AdminProductosController::alta/$1');
    });

    // Rutas para administrar usuarios dentro de admin
    $routes->get('usuarios', 'AdminUsuariosController::index');

    
});
$routes->group('admin/usuarios', ['filter' => 'role:1'], function($routes) {
    $routes->get('', 'AdminUsuariosController::index');
    $routes->get('crear', 'AdminUsuariosController::crear');
    $routes->post('guardar', 'AdminUsuariosController::guardar');
    $routes->get('editar/(:num)', 'AdminUsuariosController::editar/$1');
    $routes->post('actualizar/(:num)', 'AdminUsuariosController::actualizar/$1');
    $routes->get('baja/(:num)', 'AdminUsuariosController::bajaLogica/$1');
    $routes->get('alta/(:num)', 'AdminUsuariosController::alta/$1');
    

});

$routes->post('contacto/enviar', 'ContactoController::enviar');
$routes->post('consultas/guardar', 'ConsultaController::guardar');

$routes->get('carrito/finalizar', 'CarritoController::finalizar');
$routes->get('factura/(:num)', 'FacturaController::verFactura/$1');


$routes->get('sabores', 'CatalogoController::sabores');
$routes->get('bombones', 'CatalogoController::bombones');

$routes->get('paletas', 'CatalogoController::paletas');


$routes->get('usuario/editarPerfil', 'UsuarioController::editarPerfil');
$routes->post('usuario/actualizarPerfil', 'UsuarioController::actualizarPerfil');

$routes->get('mis-compras', 'CompraController::misCompras');
