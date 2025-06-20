<?php

namespace App\Controllers;
use App\Models\ConsultaModel;

class AdminConsultasController extends BaseController
{
    public function index()
    {
        $model = new ConsultaModel();
        $data['consultas'] = $model->where('activo', 1)->findAll();

        return view('admin/consultas/index', $data);
    }

    public function baja($id)
    {
        $model = new ConsultaModel();
        $model->update($id, ['activo' => 0]);

        return redirect()->to('admin/consultas')->with('mensaje', 'Consulta dada de baja.');
    }
}
