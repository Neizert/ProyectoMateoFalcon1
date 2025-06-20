<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Listado de Productos</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/adminproductos.css') ?>">
</head>
<body>
<a href="<?= base_url('admin') ?>" class="btn-volver">← Volver</a>
<div class="container-productos">

    <h1>Productos</h1>

    <form class="form-busqueda" method="get" action="<?= base_url('admin/productos') ?>">
    <input type="text" name="q" placeholder="Buscar por nombre" value="<?= esc($q ?? '') ?>">
    <button type="submit">Buscar</button>
</form>

    <a href="<?= base_url('admin/productos/crear') ?>" class="btn-accion">Nuevo Producto</a>

    <?php if(session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Descripción</th><th>Precio</th><th>Stock</th><th>Activo</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($productos) > 0): ?>
                <?php foreach($productos as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= esc($p['nombre']) ?></td>
                        <td><?= esc($p['descripcion']) ?></td>
                        <td>$<?= number_format($p['precio'], 2) ?></td>
                        <td><?= $p['stock'] ?></td>
                        <td><?= isset($p['activo']) && $p['activo'] ? 'Sí' : 'No' ?></td>
                        <td>
                            <a href="<?= base_url('admin/productos/editar/'.$p['id']) ?>" class="btn-accion">Editar</a>
                            <?php if(isset($p['activo']) && $p['activo']): ?>
                                <a href="<?= base_url('admin/productos/baja/'.$p['id']) ?>" class="btn-accion" onclick="return confirm('¿Confirmar baja?')">Dar de baja</a>
                            <?php else: ?>
                                <a href="<?= base_url('admin/productos/alta/'.$p['id']) ?>" class="btn-accion" onclick="return confirm('¿Confirmar alta?')">Dar de alta</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center;">No se encontraron productos.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</div>

</body>
</html>
