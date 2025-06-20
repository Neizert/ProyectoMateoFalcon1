<?php

namespace App\Controllers;

use App\Models\ProductoModel;

class CatalogoController extends BaseController
{
    public function bombones()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel
            ->like('nombre', '(Bombón)', 'both')
            ->where('activo', 1)
            ->findAll();

        return view('catalogo/bombones', [
            'productos' => $productos,
            'mensaje' => session()->getFlashdata('mensaje'),
            'error' => session()->getFlashdata('error')
        ]);
    }

    public function sabores()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel
            ->like('nombre', '(Crema)', 'both')
            ->where('activo', 1)
            ->findAll();

        return view('catalogo/sabores', [
            'productos' => $productos,
            'mensaje' => session()->getFlashdata('mensaje'),
            'error' => session()->getFlashdata('error')
        ]);
    }

    public function paletas()
    {
        $productoModel = new ProductoModel();
        $productos = $productoModel
            ->notLike('nombre', '(Bombón)')
            ->notLike('nombre', '(Crema)')
            ->where('activo', 1)
            ->findAll();

        return view('catalogo/paletas', [
            'productos' => $productos,
            'mensaje' => session()->getFlashdata('mensaje'),
            'error' => session()->getFlashdata('error')
        ]);
    }
}
