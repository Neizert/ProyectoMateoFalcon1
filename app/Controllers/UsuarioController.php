<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class UsuarioController extends BaseController
{
    public function registro()
    {
        return view('plantillas/header') .
               view('usuario/registro') .
               view('plantillas/footer');
    }

    public function guardar()
    {
        $usuarioModel = new UsuarioModel();

        $rules = [
            'nombre'           => 'required|min_length[3]',
            'email'            => 'required|valid_email|is_unique[usuarios.email]',
            'password'         => 'required|min_length[6]',
            'password_confirm' => 'matches[password]',
            'telefono'         => 'required',
            'direccion'        => 'required',
            'dni'              => 'required|numeric'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', implode(', ', $this->validator->getErrors()));
        }

        $data = [
            'nombre'           => $this->request->getPost('nombre'),
            'email'            => $this->request->getPost('email'),
            'password'         => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'perfil_id'        => 2,
            'activo'           => 1,
            'telefono'         => $this->request->getPost('telefono'),
            'direccion'        => $this->request->getPost('direccion'),
            'dni'              => $this->request->getPost('dni'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento') ?: null
        ];

        $usuarioModel->insert($data);
        return redirect()->to('login')->with('mensaje', 'Usuario registrado correctamente.');
    }

    public function login()
    {
        return view('plantillas/header') .
               view('usuario/login') .
               view('plantillas/footer');
    }

    public function acceder()
    {
        $usuarioModel = new UsuarioModel();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $usuario = $usuarioModel->where('email', $email)->first();

        if ($usuario && password_verify($password, $usuario['password'])) {
            session()->set([
                'usuario_id' => $usuario['id'],
                'nombre'     => $usuario['nombre'],
                'perfil_id'  => $usuario['perfil_id'],
                'logueado'   => true
            ]);
            return redirect()->to('principal');
        } else {
            return redirect()->to('login')->with('mensaje', 'Credenciales inválidas.');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('principal');
    }

    public function editarPerfil()
    {
        $session = session();
        $usuarioModel = new UsuarioModel();
        $usuario = $usuarioModel->find($session->get('usuario_id'));

        if (!$usuario) {
            return redirect()->to('principal')->with('mensaje', 'Usuario no encontrado.');
        }

        return view('usuario/editar_perfil', ['usuario' => $usuario]); // Vista sin header/footer
    }

    public function actualizarPerfil()
    {
        $usuarioModel = new UsuarioModel();
        $id = session()->get('usuario_id');

        // Reglas de validación para actualización, con excepción del email propio
        $rules = [
    'nombre'           => 'required|min_length[3]',
    'email'            => 'required|valid_email|is_unique[usuarios.email,id,' . $id . ']',
    'telefono'         => 'permit_empty',
    'direccion'        => 'permit_empty',
    'dni'              => 'permit_empty|numeric',
    'fecha_nacimiento' => 'permit_empty|valid_date',
    'password'         => 'permit_empty|min_length[6]',
    // La validación password_confirm solo si password no está vacío
    'password_confirm' => 'permit_empty|matches[password]'
];


        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', implode(', ', $this->validator->getErrors()));
        }

        $data = [
            'nombre'           => $this->request->getPost('nombre'),
            'email'            => $this->request->getPost('email'),
            'telefono'         => $this->request->getPost('telefono'),
            'direccion'        => $this->request->getPost('direccion'),
            'dni'              => $this->request->getPost('dni'),
            'fecha_nacimiento' => $this->request->getPost('fecha_nacimiento'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // Desactivar validación para update para evitar conflictos con reglas del modelo
        $usuarioModel->skipValidation(true);

        $result = $usuarioModel->update($id, $data);
        if (!$result) {
            // Mostrar errores de validación o DB
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Error al actualizar perfil.');
        }

        return redirect()->to('principal')->with('mensaje', 'Perfil actualizado correctamente');
    }

    // Prueba para verificar conexión
    public function test()
    {
        echo "UsuarioController funciona correctamente.";
    }
}
