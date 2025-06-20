<?php namespace App\Controllers;

use App\Models\ProductoModel;

class AdminProductosController extends BaseController
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new ProductoModel();
        helper('url');
    }

    private function validarAdmin()
    {
        $session = session();
        if ($session->get('rol') !== 'admin') {
            return redirect()->to(base_url('principal'))->with('error', 'No autorizado')->send();
            exit; 
        }
    }
public function index()
{
    $this->validarAdmin();

    $q = $this->request->getGet('q');

    $productosQuery = $this->productoModel;

    if ($q) {
        $productosQuery = $productosQuery->like('nombre', $q);
    }

    $data['productos'] = $productosQuery->orderBy('id', 'desc')->findAll();
    $data['q'] = $q;

    return view('admin/productos/index', $data);
}
    public function crear()
    {
        $this->validarAdmin();
        return view('admin/productos/crear');
    }

    public function guardar()
    {
        $this->validarAdmin();

        $imagen = $this->request->getFile('imagen');
        $nombreImagen = null;

        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getClientName(); // o getRandomName()
            $imagen->move(ROOTPATH . '/assets/img', $nombreImagen);
        }

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $nombreImagen,
            'activo' => 1,
            'stock' => $this->request->getPost('stock')
        ];

        if ($this->productoModel->insert($datos)) {
            return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto creado con éxito');
        } else {
            return redirect()->back()->with('error', 'Error al crear producto')->withInput();
        }
    }

    public function editar($id)
    {
        $this->validarAdmin();

        $data['producto'] = $this->productoModel->find($id);
        if (!$data['producto']) {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Producto no encontrado');
        }
        return view('admin/productos/editar', $data);
    }

    public function actualizar()
    {
        $this->validarAdmin();

        $id = $this->request->getPost('id');
        $imagenActual = $this->request->getPost('imagen_actual');
        $borrarImagen = $this->request->getPost('borrar_imagen');

        $imagen = $this->request->getFile('imagen');
        $nombreImagen = $imagenActual;

        
        if ($borrarImagen && $imagenActual) {
            $ruta = ROOTPATH . 'public/assets/img/' . $imagenActual;
            if (file_exists($ruta)) {
                unlink($ruta);
            }
            $nombreImagen = null;
        }

        
        if ($imagen && $imagen->isValid() && !$imagen->hasMoved()) {
            $nombreImagen = $imagen->getClientName();
            $imagen->move(ROOTPATH . 'public/assets/img', $nombreImagen);

            
            if ($imagenActual && !$borrarImagen) {
                $rutaAnterior = ROOTPATH . 'public/assets/img/' . $imagenActual;
                if (file_exists($rutaAnterior)) {
                    unlink($rutaAnterior);
                }
            }
        }

        $datos = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'imagen' => $nombreImagen,
            'stock' => $this->request->getPost('stock')
        ];

        if ($this->productoModel->update($id, $datos)) {
            return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto actualizado');
        } else {
            return redirect()->back()->with('error', 'Error al actualizar')->withInput();
        }
    }

    public function bajaLogica($id)
    {
        $this->validarAdmin();

        $datos = ['activo' => 0];
        if ($this->productoModel->update($id, $datos)) {
            return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto dado de baja');
        } else {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Error al eliminar');
        }
    }

    public function alta($id)
    {
        $this->validarAdmin();

        $datos = ['activo' => 1];
        if ($this->productoModel->update($id, $datos)) {
            return redirect()->to(base_url('admin/productos'))->with('mensaje', 'Producto dado de alta correctamente');
        } else {
            return redirect()->to(base_url('admin/productos'))->with('error', 'Error al dar de alta');
        }
    }
}
