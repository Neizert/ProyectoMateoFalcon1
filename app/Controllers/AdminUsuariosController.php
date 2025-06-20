<?php

namespace App\Controllers;
use App\Models\UsuarioModel;

class AdminUsuariosController extends BaseController
{
    public function index()
    {
        $usuarioModel = new UsuarioModel();
        $q = $this->request->getGet('q');

        if ($q) {
            $usuarios = $usuarioModel
                ->groupStart()
                    ->like('nombre', $q)
                    ->orLike('email', $q)
                    ->orLike('dni', $q)
                ->groupEnd()
                ->findAll();
        } else {
            $usuarios = $usuarioModel->findAll();
        }

        return view('admin/usuarios/index', [
            'usuarios' => $usuarios,
            'q' => $q
        ]);
    }

    public function crear()
    {
        return view('admin/usuarios/crear');
    }

    public function guardar()
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'email'     => $this->request->getPost('email'),
            'dni'       => $this->request->getPost('dni'),
            'direccion' => $this->request->getPost('direccion'),
            'perfil_id' => $this->request->getPost('perfil_id'),
            'activo'    => 1,
        ];

        $password = $this->request->getPost('password');
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        } else {
            return redirect()->back()->withInput()->with('error', 'La contraseña es obligatoria.');
        }

        if ($usuarioModel->insert($data)) {
            return redirect()->to('admin/usuarios')->with('mensaje', 'Usuario creado correctamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al crear usuario');
        }
    }

    public function editar($id)
    {
        $usuarioModel = new UsuarioModel();
        $data['usuario'] = $usuarioModel->find($id);
        if (!$data['usuario']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Usuario no encontrado");
        }
        return view('admin/usuarios/editar', $data);
    }

    public function actualizar($id)
    {
        $usuarioModel = new UsuarioModel();

        $data = [
            'nombre'    => $this->request->getPost('nombre'),
            'email'     => $this->request->getPost('email'),
            'dni'       => $this->request->getPost('dni'),
            'direccion' => $this->request->getPost('direccion'),
            'perfil_id' => $this->request->getPost('perfil_id'),
        ];

        $password = $this->request->getPost('password');
        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('admin/usuarios')->with('mensaje', 'Usuario actualizado correctamente');
        } else {
            return redirect()->back()->withInput()->with('error', 'Error al actualizar usuario');
        }
    }

    public function bajaLogica($id)
    {
        $usuarioModel = new UsuarioModel();
        $data = ['activo' => 0];

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('admin/usuarios')->with('mensaje', 'Usuario dado de baja correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al dar de baja usuario');
        }
    }

    public function alta($id)
    {
        $usuarioModel = new UsuarioModel();
        $data = ['activo' => 1];

        if ($usuarioModel->update($id, $data)) {
            return redirect()->to('admin/usuarios')->with('mensaje', 'Usuario dado de alta correctamente');
        } else {
            return redirect()->back()->with('error', 'Error al dar de alta usuario');
        }
    }
}
