<?php
namespace App\Controllers;

use App\Models\FacturaModel;
use App\Models\FacturaDetalleModel;
use App\Models\UsuarioModel;

class AdminFacturasController extends BaseController
{
    public function index()
    {
        $facturaModel = new FacturaModel();

        $q = $this->request->getGet('q'); // Obtener término de búsqueda

        $facturasQuery = $facturaModel
            ->select('facturas.*, usuarios.dni')           
            ->join('usuarios', 'usuarios.id = facturas.usuario_id');

        if ($q) {
            // Buscar por id, fecha o dni con like para coincidencias parciales
            $facturasQuery->groupStart()
                ->like('facturas.id', $q)
                ->orLike('facturas.fecha', $q)
                ->orLike('usuarios.dni', $q)
                ->groupEnd();
        }

        $facturas = $facturasQuery->orderBy('facturas.id', 'desc')->findAll();

        return view('admin/facturas/index', ['facturas' => $facturas, 'q' => $q]);
    }

    public function ver($id)
    {
        $facturaModel = new FacturaModel();
        $detalleModel = new FacturaDetalleModel();
        $usuarioModel = new UsuarioModel();

        $factura = $facturaModel->find($id);
        if (!$factura) {
            return redirect()->to(base_url('admin/facturas'))->with('error', 'Factura no encontrada');
        }

        $detalles = $detalleModel->where('factura_id', $id)->findAll();

        // Obtener datos del usuario que hizo la compra
        $usuario = $usuarioModel->find($factura['usuario_id']);

        return view('admin/facturas/ver', [
            'factura' => $factura,
            'detalles' => $detalles,
            'usuario' => $usuario
        ]);
    }
}
