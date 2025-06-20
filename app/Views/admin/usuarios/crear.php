<link rel="stylesheet" href="<?= base_url('assets/css/crearusuario.css') ?>">
<a href="<?= base_url('admin/usuarios') ?>" class="btn-volver">← Volver</a>
<h2>Nuevo Usuario</h2>
<form action="<?= base_url('admin/usuarios/guardar') ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Contraseña:</label>
    <input type="password" name="password" required>

    <label>Perfil:</label>
    <select name="perfil_id">
        <option value="1">Admin</option>
        <option value="2" selected>Usuario</option>
    </select>

    <button type="submit">Guardar</button>
</form>

<?php // admin/usuarios/editar.php ?>