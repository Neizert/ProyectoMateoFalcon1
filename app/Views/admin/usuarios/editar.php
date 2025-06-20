<link rel="stylesheet" href="<?= base_url('assets/css/editarusuario.css') ?>">

<a href="<?= base_url('admin/usuarios') ?>" class="btn-volver">← Volver</a>
<h2>Editar Usuario</h2>
<form action="<?= base_url('admin/usuarios/actualizar/'.$usuario['id']) ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= esc($usuario['nombre']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= esc($usuario['email']) ?>" required>

    <label>Contraseña (opcional):</label>
    <input type="password" name="password">

    <label>Perfil:</label>
    <select name="perfil_id">
        <option value="1" <?= $usuario['perfil_id'] == 1 ? 'selected' : '' ?>>Admin</option>
        <option value="2" <?= $usuario['perfil_id'] == 2 ? 'selected' : '' ?>>Usuario</option>
    </select>

    <button type="submit">Actualizar</button>
</form>
