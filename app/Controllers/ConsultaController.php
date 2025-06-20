<?php

namespace App\Controllers;
use App\Models\ConsultaModel;

class ConsultaController extends BaseController
{
    public function guardar()
    {
        $consultaModel = new ConsultaModel();

        $consultaModel->save([
            'nombre'   => $this->request->getPost('nombre'),
            'apellido'=> $this->request->getPost('apellido'),
            'email'    => $this->request->getPost('email'),
            'telefono' => $this->request->getPost('telefono'),
            'asunto'   => $this->request->getPost('asunto'),
            'mensaje'  => $this->request->getPost('mensaje'),
        ]);

        return redirect()->to('contacto')->with('mensaje', 'Consulta enviada correctamente.');
    }
}
