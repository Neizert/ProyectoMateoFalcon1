<?php
namespace App\Controllers;

use App\Models\FacturaModel;

class CompraController extends BaseController
{
    public function misCompras()
    {
        $usuario_id = session('usuario_id');
        if (!$usuario_id) {
            return redirect()->to('/login');
        }

        $facturaModel = new FacturaModel();

        $facturas = $facturaModel->where('usuario_id', $usuario_id)
                                 ->orderBy('fecha', 'DESC')
                                 ->findAll();

        return view('mis_compras', ['facturas' => $facturas]);
    }
}
