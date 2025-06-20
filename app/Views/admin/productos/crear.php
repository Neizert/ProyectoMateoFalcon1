<link rel="stylesheet" href="<?= base_url('assets/css/crearproducto.css') ?>">

<a href="<?= base_url('admin/productos') ?>" class="btn-volver">← Volver</a>

<h1>Crear Producto</h1>

<form action="<?= base_url('admin/productos/guardar') ?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" required>
    </div>
    <div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control" required>
</div>
    <div class="mb-3">
        <label>Imagen</label>
        <input type="file" name="imagen" class="form-control" accept="image/*">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
    <a href="<?= base_url('admin/productos') ?>" class="btn btn-secondary">Cancelar</a>
</form>
