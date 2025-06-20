<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table = 'consultas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'apellido', 'email', 'telefono', 'asunto', 'mensaje', 'activo'];
    protected $useTimestamps = true;
    protected $createdField  = 'creado_en';
}
