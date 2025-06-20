<body class="register-page">
    <div class="register-container">
        <h2>Registrarse</h2>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="register-error">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('guardar') ?>" method="post">
            <label>Nombre completo:</label>
            <input type="text" name="nombre" required><br>

            <label>Correo electrónico:</label>
            <input type="email" name="email" required><br>

            <label>Contraseña:</label><br>
<input type="password" name="password" required><br>

<label>Confirmar contraseña:</label><br>
<input type="password" name="password_confirm" required><br>

            <label>Teléfono:</label>
            <input type="text" name="telefono" required><br>

            <label>Dirección:</label>
            <input type="text" name="direccion" required><br>

            <label>Fecha de nacimiento (opcional):</label>
            <input type="date" name="fecha_nacimiento"><br>

            <label>DNI:</label>
            <input type="text" name="dni" required><br>

            <button type="submit">Registrarse</button>
        </form>

        <p><a href="<?= base_url('login') ?>">¿Ya tienes cuenta? Inicia sesión</a></p>
    </div>
</body>
