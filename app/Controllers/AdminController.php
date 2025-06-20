<?php namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\UsuarioModel;

class AdminController extends BaseController
{
    public function __construct()
    {
        helper('url');
    }

    private function esAdmin()
    {
        $session = session();
        return $session->get('rol') === 'admin';
    }

    private function validarAdmin()
    {
        if (!$this->esAdmin()) {
            return redirect()->to(base_url('principal'));
        }
    }

    public function index()
    {
        $this->validarAdmin();

        return view('admin/dashboard');
    }

    
}
