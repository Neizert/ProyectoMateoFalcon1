<link rel="stylesheet" href="<?= base_url('assets/css/adminlistafacturas.css') ?>">

<div class="container">
  <a href="<?= base_url('admin') ?>" class="btn-volver">← Volver</a>
  <h2>Listado de Facturas</h2>

  <form method="get" action="<?= base_url('admin/facturas') ?>" class="form-busqueda" style="margin-bottom: 1em;">
    <input type="text" name="q" placeholder="Buscar por ID, fecha o DNI..." value="<?= isset($q) ? esc($q) : '' ?>">
    <button type="submit">Buscar</button>
  </form>

  <?php if (count($facturas) > 0): ?>
    <table class="factura-detalle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Fecha</th>
          <th>DNI</th>
          <th>Total</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($facturas as $factura): ?>
          <tr>
            <td><?= esc($factura['id']) ?></td>
            <td><?= esc($factura['fecha']) ?></td>
            <td><?= esc($factura['dni']) ?></td>
            <td>$<?= number_format($factura['total'], 2) ?></td>
            <td>
              <a href="<?= base_url('admin/facturas/ver/' . $factura['id']) ?>" class="btn-ver">Ver</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <p>No hay facturas registradas.</p>
  <?php endif; ?>
</div>
