<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Factura N° <?= esc($factura['id']) ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/css/factura.css') ?>">
</head>
<body>

<div class="container-factura">

    <div class="cabecera">
        <h2>Factura N° <?= esc($factura['id']) ?></h2>
        <p><strong>Fecha:</strong> <?= esc($factura['fecha']) ?></p>
        <p><strong>Cliente:</strong> <?= esc($usuario['nombre']) ?> (<?= esc($usuario['email']) ?>)</p>
        <p><strong>Total:</strong> <span class="total">$<?= number_format($factura['total'], 2) ?></span></p>
        <p><strong>Cliente:</strong> <?= esc($usuario['nombre']) ?> (<?= esc($usuario['email']) ?>)</p>
<p><strong>DNI:</strong> <?= esc($usuario['dni']) ?></p>
<p><strong>Dirección:</strong> <?= esc($usuario['direccion']) ?></p>
    </div>

    <div class="tabla-factura">
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($detalles as $detalle): ?>
                    <tr>
                        <td>
                            <?php
                                $producto = (new \App\Models\ProductoModel())->find($detalle['producto_id']);
                                echo esc($producto['nombre']);
                            ?>
                        </td>
                        <td><?= esc($detalle['cantidad']) ?></td>
                        <td>$<?= number_format($detalle['precio_unitario'], 2) ?></td>
                        <td>$<?= number_format($detalle['cantidad'] * $detalle['precio_unitario'], 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="acciones">
        <a href="<?= base_url('/') ?>" class="btn-volver">🛍️ Seguir Comprando</a>
    </div>

</div>

</body>
</html>
