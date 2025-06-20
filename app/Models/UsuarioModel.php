<?php
namespace App\Models;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

  protected $allowedFields = [
    'nombre', 'email', 'password', 'perfil_id', 'activo',
    'telefono', 'direccion', 'dni', 'fecha_nacimiento'
];
    // Agrega 'activo' si usas baja lógica

    protected $useTimestamps = false; // o true si tienes campos created_at, updated_at

    protected $validationRules = [
        'nombre'   => 'required|min_length[3]',
        'email'    => 'required|valid_email|is_unique[usuarios.email,id,{id}]',
        'password' => 'permit_empty|min_length[6]'
    ];

    protected $validationMessages = [
        // mensajes personalizados opcionales
    ];
}
