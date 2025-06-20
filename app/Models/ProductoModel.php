<?php namespace App\Models;

use CodeIgniter\Model;

class ProductoModel extends Model
{
    protected $table = 'productos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'imagen', 'activo', 'stock'];


    // Para baja lógica, vamos a filtrar solo activos por defecto
    protected $returnType = 'array';

    public function obtenerProductosActivos()
    {
        return $this->where('activo', 1)->findAll();
    }
}
