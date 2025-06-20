<?php
namespace App\Controllers;

use App\Models\FacturaModel;
use App\Models\FacturaDetalleModel;

class FacturaController extends BaseController
{
    public function verFactura($id)
{
    $facturaModel = new \App\Models\FacturaModel();
    $facturaDetalleModel = new \App\Models\FacturaDetalleModel();
    $usuarioModel = new \App\Models\UsuarioModel();

    $factura = $facturaModel->find($id);
    if (!$factura) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Factura no encontrada");
    }

    $detalles = $facturaDetalleModel->where('factura_id', $id)->findAll();
    $usuario = $usuarioModel->find($factura['usuario_id']);

    return view('factura/ver', [
        'factura' => $factura,
        'detalles' => $detalles,
        'usuario' => $usuario
    ]);
}
}
