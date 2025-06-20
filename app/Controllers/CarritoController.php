<?php

namespace App\Controllers;
use App\Models\{CarritoModel, ProductoModel, FacturaModel, FacturaDetalleModel};

class CarritoController extends BaseController
{
    public function agregar($idProducto, $vista = 'bombones')
    {
        $productoModel = new ProductoModel();
        $producto = $productoModel->find($idProducto);

        if (!$producto) {
            return redirect()->to($vista)->with('mensaje', 'Producto no encontrado.');
        }

        if ($producto['stock'] <= 0) {
            return redirect()->to($vista)->with('mensaje', 'Este producto está sin stock.');
        }

        $carritoModel = new CarritoModel();

        $item = $carritoModel->where('usuario_id', session('usuario_id'))
                              ->where('producto_id', $idProducto)
                              ->first();

        if ($item) {
            if ($item['cantidad'] < $producto['stock']) {
                $carritoModel->update($item['id'], [
                    'cantidad' => $item['cantidad'] + 1
                ]);
            } else {
                return redirect()->to($vista)->with('mensaje', 'Stock máximo alcanzado para este producto.');
            }
        } else {
            $carritoModel->insert([
                'usuario_id'  => session('usuario_id'),
                'producto_id' => $idProducto,
                'cantidad'    => 1
            ]);
        }

        return redirect()->to($vista)->with('mensaje', 'Producto agregado al carrito.');
    }

    public function ver()
{
    $carritoModel = new CarritoModel();
    $productoModel = new ProductoModel();

    $usuario_id = session('usuario_id');
    $items = $carritoModel->where('usuario_id', $usuario_id)->findAll();

    $productos = [];

    foreach ($items as $item) {
        $producto = $productoModel->find($item['producto_id']);
        if ($producto) {
            $producto['cantidad'] = $item['cantidad'];
            $producto['carrito_id'] = $item['id'];
            $producto['stock'] = $producto['stock']; // <- agregar esto
            $productos[] = $producto;
        }
    }

    return view('plantillas/header')
        . view('carrito/ver', ['productos' => $productos])
        . view('plantillas/footer');
}

    public function eliminar($idCarrito)
    {
        $carritoModel = new CarritoModel();
        $carritoModel->delete($idCarrito);
        return redirect()->to('carrito');
    }

    public function vaciar()
    {
        $carritoModel = new CarritoModel();
        $carritoModel->where('usuario_id', session('usuario_id'))->delete();
        return redirect()->to('carrito');
    }

    public function actualizar($idCarrito)
{
    $carritoModel = new CarritoModel();
    $productoModel = new ProductoModel();

    $nuevaCantidad = (int) $this->request->getPost('cantidad');

    $item = $carritoModel->find($idCarrito);
    if (!$item) {
        return redirect()->to('carrito')->with('error', 'El ítem no existe.');
    }

    $producto = $productoModel->find($item['producto_id']);
    if (!$producto) {
        return redirect()->to('carrito')->with('error', 'Producto no encontrado.');
    }

    if ($nuevaCantidad <= 0) {
        return redirect()->to('carrito')->with('error', 'La cantidad debe ser mayor a cero.');
    }

    if ($nuevaCantidad > $producto['stock']) {
        return redirect()->to('carrito')->with('error', 'No hay suficiente stock para ' . $producto['nombre']);
    }

    $carritoModel->update($idCarrito, ['cantidad' => $nuevaCantidad]);

    return redirect()->to('carrito')->with('mensaje', 'Cantidad actualizada correctamente.');
}

    public function finalizar()
    {
        $session = session();
        $usuario_id = $session->get('usuario_id');

        if (!$usuario_id) {
            return redirect()->to('/login');
        }

        $carritoModel = new CarritoModel();
        $productoModel = new ProductoModel();
        $facturaModel = new FacturaModel();
        $detalleModel = new FacturaDetalleModel();

        $items = $carritoModel->where('usuario_id', $usuario_id)->findAll();

        if (empty($items)) {
            return redirect()->to('/carrito')->with('error', 'El carrito está vacío.');
        }

        $total = 0;
        $detalles = [];

        foreach ($items as $item) {
            $producto = $productoModel->find($item['producto_id']);
            if (!$producto || $producto['stock'] < $item['cantidad']) {
                return redirect()->to('/carrito')->with('error', 'Stock insuficiente para ' . $producto['nombre']);
            }

            $subtotal = $producto['precio'] * $item['cantidad'];
            $total += $subtotal;

            $detalles[] = [
                'producto_id' => $producto['id'],
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $producto['precio']
            ];
        }

        $facturaId = $facturaModel->insert([
            'usuario_id' => $usuario_id,
            'total' => $total,
            'fecha' => date('Y-m-d H:i:s')
        ]);

        foreach ($detalles as $detalle) {
            $detalleModel->insert([
                'factura_id' => $facturaId,
                'producto_id' => $detalle['producto_id'],
                'cantidad' => $detalle['cantidad'],
                'precio_unitario' => $detalle['precio_unitario']
            ]);

            // Descontar stock
            $producto = $productoModel->find($detalle['producto_id']);
            $productoModel->update($detalle['producto_id'], [
                'stock' => $producto['stock'] - $detalle['cantidad']
            ]);
        }

        $carritoModel->where('usuario_id', $usuario_id)->delete();

        return redirect()->to('/factura/' . $facturaId);
    }
}
