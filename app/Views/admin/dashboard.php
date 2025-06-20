<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/adminpanel.css') ?>">
</head>
<body>
    <h1>Panel de Administración</h1>
    
    <a href="<?= base_url('') ?>" class="btn-volver">← Volver</a>
    
    <ul>
        <li><a href="<?= base_url('admin/productos') ?>">Gestión de Productos</a></li>
        <li><a href="<?= base_url('admin/usuarios') ?>">Gestión de Usuarios</a></li>
        <li><a href="<?= base_url('admin/consultas') ?>">Gestión de Consultas</a></li>
        <li><a href="<?= base_url('admin/facturas') ?>">Gestión de Facturas</a></li>
    </ul>
</body>
</html>
