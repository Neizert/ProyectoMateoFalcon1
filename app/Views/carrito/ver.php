<div class="container">
    <h2>Carrito de Compras</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alerta-mensaje error"><?= session()->getFlashdata('error') ?></div>
    <?php elseif (session()->getFlashdata('mensaje')): ?>
        <div class="alerta-mensaje success"><?= session()->getFlashdata('mensaje') ?></div>
    <?php endif; ?>

    <?php if (count($productos) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Stock</th>
                    <th>Subtotal</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                $hayErrorStock = false;
                foreach ($productos as $p): 
                    $subtotal = $p['precio'] * $p['cantidad'];
                    $total += $subtotal;
                    $stockInsuficiente = $p['cantidad'] > $p['stock'];
                    if ($stockInsuficiente) $hayErrorStock = true;
                ?>
                    <tr style="<?= $stockInsuficiente ? 'background-color: #f8d7da;' : '' ?>">
                        <td>
    <strong><?= esc($p['nombre']) ?></strong><br>
    <small style="color: #666; font-size: 0.9em;">
        <?= esc($p['descripcion']) ?>
    </small>
</td>
                        <td>$<?= esc($p['precio']) ?></td>
                        <td>
                            <form action="<?= base_url('carrito/actualizar/' . $p['carrito_id']) ?>" method="post">
                                <input type="number" name="cantidad" value="<?= esc($p['cantidad']) ?>" min="1" max="<?= esc($p['stock']) ?>" style="width: 60px;">
                                <button type="submit">Actualizar</button>
                            </form>
                        </td>
                        <td><?= esc($p['stock']) ?></td>
                        <td>$<?= number_format($subtotal, 2) ?></td>
                        <td>
                            <a href="<?= base_url('carrito/eliminar/' . $p['carrito_id']) ?>">❌</a>
                        </td>
                    </tr>
                    <?php if ($stockInsuficiente): ?>
                        <tr>
                            <td colspan="6" style="color: #721c24; font-weight: bold; background-color: #fcebea; text-align: center;">
                                ⚠ No hay suficiente stock para <?= esc($p['nombre']) ?>.
                            </td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Total: $<?= number_format($total, 2) ?></h3>

        <div class="acciones-carrito">
            <a href="<?= base_url('carrito/vaciar') ?>">Vaciar carrito</a>
            <?php if ($hayErrorStock): ?>
                <span style="color: red; font-weight: bold;">⚠ Corrige el stock antes de finalizar la compra</span>
            <?php else: ?>
                <a href="<?= base_url('carrito/finalizar') ?>" class="btn-finalizar">Finalizar Compra</a>
            <?php endif; ?>
        </div>

    <?php else: ?>
        <p>Tu carrito está vacío.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
