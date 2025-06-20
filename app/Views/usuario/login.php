<body class="login-page">

    <div class="login-container">
        <h2>Iniciar Sesión</h2>

        <?php if (session()->getFlashdata('mensaje')): ?>
            <div class="login-error">
                <?= session()->getFlashdata('mensaje') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('acceder') ?>" method="post">
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Contraseña:</label><br>
            <input type="password" name="password" required><br><br>

            <button type="submit">Ingresar</button>
        </form>

        <p><a href="<?= base_url('registro') ?>">¿No tienes cuenta? Regístrate</a></p>
    </div>

        </body>