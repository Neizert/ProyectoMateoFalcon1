<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <a href="<?= base_url('admin') ?>" class="btn-volver">← Volver</a>
    <title>Gestión de Consultas</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/adminconsultas.css') ?>">
</head>
<body>
    <h1>Consultas Recibidas</h1>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($consultas as $c): ?>
                <tr>
                    <td><?= $c['id'] ?></td>
                    <td><?= esc($c['nombre']) ?></td>
                    <td><?= esc($c['apellido']) ?></td>
                    <td><?= esc($c['email']) ?></td>
                    <td><?= esc($c['telefono']) ?></td>
                    <td><?= esc($c['asunto']) ?></td>
                    <td><?= esc($c['mensaje']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/consultas/baja/'.$c['id']) ?>" onclick="return confirm('¿Dar de baja esta consulta?')">Dar de baja</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
