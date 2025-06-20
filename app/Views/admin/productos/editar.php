<link rel="stylesheet" href="<?= base_url('assets/css/editarproducto.css') ?>">

<a href="<?= base_url('admin') ?>" class="btn-volver">← Volver</a>

<h1>Editar Producto</h1>

<form action="<?= base_url('admin/productos/actualizar') ?>" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= esc($producto['id']) ?>">
    <input type="hidden" name="imagen_actual" value="<?= esc($producto['imagen']) ?>">

    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?= esc($producto['nombre']) ?>" required>
    </div>

    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control" required><?= esc($producto['descripcion']) ?></textarea>
    </div>

    <div class="mb-3">
        <label>Precio</label>
        <input type="number" step="0.01" name="precio" class="form-control" value="<?= esc($producto['precio']) ?>" required>
    </div>

    <div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" class="form-control" value="<?= $producto['stock'] ?>" required>
</div>

    <div class="mb-3">
        <label>Imagen actual:</label><br>
        <?php if (!empty($producto['imagen'])): ?>
            <img src="<?= base_url('assets/img/' . esc($producto['imagen'])) ?>" alt="Imagen actual" width="120"><br><br>
        <?php else: ?>
            <em>No hay imagen subida</em><br><br>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label>Cambiar imagen:</label>
        <input type="file" name="imagen" class="form-control" accept="image/*">
    </div>

    <div class="mb-3">
        <input type="checkbox" name="borrar_imagen" value="1">
        <label for="borrar_imagen">Eliminar imagen actual</label>
    </div>

    <button type="submit" class="btn btn-success">Actualizar</button>
    <a href="<?= base_url('admin/productos') ?>" class="btn btn-secondary">Cancelar</a>
</form>
