<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/adminusuarios.css') ?>">
</head>
<body>
    <a href="<?= base_url('admin') ?>" class="btn-volver">← Volver</a>
    <div class="container-usuarios">
        
        <h2>Listado de Usuarios</h2>
        

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="alert"><?= session()->getFlashdata('mensaje') ?></div>
        <?php endif; ?>

        <a href="<?= base_url('admin/usuarios/crear') ?>" class="btn-accion">Nuevo Usuario</a>
        <form method="get" action="<?= base_url('admin/usuarios') ?>" class="form-busqueda" style="margin-bottom: 1em;">
    <input type="text" name="q" placeholder="Buscar por nombre, email o DNI..." value="<?= esc($q ?? '') ?>">
    <button type="submit">Buscar</button>
</form>

        <table>
            <thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>DNI</th> <!-- Nueva columna -->
        <th>Rol</th>
        <th>Activo</th>
        <th>Acciones</th>
    </tr>
</thead>
<tbody>
    <?php foreach($usuarios as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= esc($u['nombre']) ?></td>
            <td><?= esc($u['email']) ?></td>
            <td><?= esc($u['dni']) ?></td> <!-- Nueva celda -->
            <td><?= $u['perfil_id'] == 1 ? 'Admin' : 'Usuario' ?></td>
            <td class="<?= $u['activo'] ? 'estado-activo' : 'estado-inactivo' ?>">
                <?= $u['activo'] ? 'Sí' : 'No' ?>
            </td>
            <td>
                <a href="<?= base_url('admin/usuarios/editar/'.$u['id']) ?>" class="btn-accion">Editar</a>
                <?php if ($u['activo']): ?>
                    <a href="<?= base_url('admin/usuarios/baja/'.$u['id']) ?>" class="btn-accion" onclick="return confirm('¿Dar de baja?')">Dar de baja</a>
                <?php else: ?>
                    <a href="<?= base_url('admin/usuarios/alta/'.$u['id']) ?>" class="btn-accion" onclick="return confirm('¿Dar de alta?')">Dar de alta</a>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
        </table>
    </div>
</body>

</html>