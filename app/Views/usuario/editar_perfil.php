<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/editarperfil.css') ?>">
</head>
<body>
    

    <div class="editar-container">
        <a href="<?= base_url('principal') ?>" class="btn-volver">← Volver</a>
        <h2>Editar Perfil</h2>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="editar-error">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('usuario/actualizarPerfil') ?>" method="post">
    <label>Nombre:</label>
    <input type="text" name="nombre" value="<?= esc($usuario['nombre']) ?>" required>

    <label>Email:</label>
    <input type="email" name="email" value="<?= esc($usuario['email']) ?>" required>

    <label>Teléfono:</label>
    <input type="text" name="telefono" value="<?= esc($usuario['telefono'] ?? '') ?>">

    <label>Dirección:</label>
    <input type="text" name="direccion" value="<?= esc($usuario['direccion'] ?? '') ?>">

    <label>DNI:</label>
    <input type="text" name="dni" value="<?= esc($usuario['dni'] ?? '') ?>">

    <label>Fecha de nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="<?= esc($usuario['fecha_nacimiento'] ?? '') ?>">

    <label>Contraseña (dejar vacío si no desea cambiarla):</label>
    <input type="password" name="password">

    <label>Confirmar contraseña:</label>
    <input type="password" name="password_confirm">

    <button type="submit">Actualizar</button>
</form>
    </div>

</body>
</html>
