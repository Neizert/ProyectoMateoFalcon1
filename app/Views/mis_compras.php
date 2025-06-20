<?= view('plantillas/header') ?>

<div class="container">
    <h2>Mis Compras</h2>

    <?php if(empty($facturas)): ?>
        <p>No has realizado compras todavía.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>ID Factura</th>
                    <th>Fecha</th>
                    <th>Total</th>
                    <th>Ver Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($facturas as $factura): ?>
                    <tr>
                        <td><?= esc($factura['id']) ?></td>
                        <td><?= esc($factura['fecha']) ?></td>
                        <td>$<?= number_format($factura['total'], 2) ?></td>
                        <td><a href="<?= base_url('factura/' . $factura['id']) ?>">Ver</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?= view('plantillas/footer') ?>
