<?= view('plantillas/header') ?>
<link rel="stylesheet" href="<?= base_url('assets/css/bombones.css') ?>">
<body>
    
<section id="catalogo">
    <?php if (session()->getFlashdata('error')): ?>
    <div class="alerta-mensaje.error">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php elseif (session()->getFlashdata('mensaje')): ?>
    <div class="alerta-mensaje.success">
        <?= session()->getFlashdata('mensaje') ?>
    </div>
<?php endif; ?>

    <h2>Catálogo de bombones</h2>
 

    <div class="catalogo-grid">
        <?php foreach ($productos as $producto): ?>
            <div class="card">
                <img src="<?= base_url('assets/img/' . esc($producto['imagen'])) ?>" class="card-img-top" alt="<?= esc($producto['nombre']) ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= esc($producto['nombre']) ?></h5>
                    <p class="card-text"><?= esc($producto['descripcion']) ?></p>
                    <p class="card-stock"><strong>Stock:</strong> <?= esc($producto['stock']) ?></p>
                    <?php if (session()->get('perfil_id') != 1): ?> <!-- 1 = admin -->
    <a class="btn-compra" href="<?= base_url('carrito/agregar/' . $producto['id'] . '/' . esc(service('uri')->getSegment(1))) ?>">Comprar</a>
<?php endif; ?>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

<?= view('plantillas/footer') ?>
