<?php namespace App\Models;

use CodeIgniter\Model;

class FacturaDetalleModel extends Model
{
    protected $table = 'factura_detalles';
    protected $primaryKey = 'id';
    protected $allowedFields = ['factura_id', 'producto_id', 'cantidad', 'precio_unitario'];
    protected $useTimestamps = false;
}
