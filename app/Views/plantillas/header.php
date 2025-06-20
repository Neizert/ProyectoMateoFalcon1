<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SweetFlavor - Ice Cream</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/header.css" rel="stylesheet">
    <link href="assets/css/footer.css" rel="stylesheet">
    <link href="assets/css/contacto.css" rel="stylesheet">
   
    <link rel="stylesheet" href="assets/css/nosotros.css">
    <link rel="stylesheet" href="assets/css/comercio.css">
    <link rel="stylesheet" href="assets/css/principal.css">
    <link href="assets/css/sabores.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/terminosdeuso.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/registro.css">
    <link rel="stylesheet" href="assets/css/carrito.css">
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500&display=swap" rel="stylesheet">
</head>

<body>

<<nav id="navbar-example2" class="navbar bg-body-tertiary px-3 mb-3">
    <div class="d-flex align-items-center">
        <a class="navbar-brand" href="<?= base_url('principal') ?>">
            <img src="<?= base_url('assets/img/logoi.png') ?>" alt="Logo" class="logo-img">
        </a>
        <a class="navbar-brand titulo" href="<?= base_url('principal') ?>">
            SweetFlavor
        </a>
    </div>

    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('comercio') ?>">Comercialización</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('nosotros') ?>">Nosotros</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Productos</a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('sabores') ?>">Sabores</a></li>
                <li><a class="dropdown-item" href="<?= base_url('paletas') ?>">Paletas</a></li>
                <li><a class="dropdown-item" href="<?= base_url('bombones') ?>">Bombones</a></li>
            </ul>
        </li>
    </ul>
   
    <div class="d-flex">
         <a class="btn btn-outline-dark me-3 position-relative" href="<?= base_url('carrito') ?>">
    🛒 Carrito
</a>
<?php if (session()->get('perfil_id') == '1'): ?>
    <a href="<?= base_url('admin') ?>" class="btn btn-admin">Panel de Admin</a>
<?php endif; ?>
<?php if (session()->get('logueado')): ?>
    <?php if(session()->get('usuario_id') && session()->get('perfil_id') != 1): ?>
    <a href="<?= base_url('mis-compras') ?>" class="btn-ver-compras">Mis Compras</a>
<?php endif; ?>
    <a class="btn-ver-compras" href="<?= base_url('usuario/editarPerfil') ?>">Editar perfil</a>
<?php endif; ?>

        <?php if (session()->get('logueado')): ?>
            <a class="btn btn-danger" href="<?= base_url('logout') ?>">Cerrar sesión</a>
        <?php else: ?>
            <a class="btn btn-primary me-2" href="<?= base_url('registro') ?>">Registrarse</a>
            <a class="btn btn-success" href="<?= base_url('login') ?>">Iniciar sesión</a>
        <?php endif; ?>
    </div>
</nav>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

