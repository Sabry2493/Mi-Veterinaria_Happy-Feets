<?php

namespace App\Controllers;

use App\Models\MascotaModel;
use CodeIgniter\Controller;

class MascotaController extends Controller
{
    public function index($modo = 'modificar')
    {
        $model = new MascotaModel();       

        $mascotas = $model
        ->select('mascotas.*, amo_mascota.fecha_inicio, amo_mascota.fecha_fin, amo_mascota.adoptada')
        ->join('amo_mascota', 'amo_mascota.id_mascota = mascotas.id AND amo_mascota.fecha_fin IS NULL', 'left') // Solo relaciones activas 
        ->findAll();

        $data['mascotas'] = $mascotas; // Usamos el resultado del join
        $data['modo'] = $modo;

        return view('mascotas/lista', $data);
    }

    /* public function crear()
    {
        return view('mascotas/crear');
    } */

    public function guardar()
    {
        $model = new MascotaModel();
        $model->insert([
            'nombre' => $this->request->getPost('nombre'),
            'especie' => $this->request->getPost('especie'),
            'raza' => $this->request->getPost('raza'),
            'nro_registro' => $this->request->getPost('nro_registro'),
            'edad' => $this->request->getPost('edad'),
            'fecha_alta' => date('Y-m-d'),
        ]);
        return redirect()->to(base_url('mascotas'));
    }

    public function editar($id)
    {
        $model = new MascotaModel();
        $data['mascota'] = $model->find($id);

        if (!$data['mascota']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Mascota no encontrada con ID: ' . $id);
        }

        return view('mascotas/editar', $data);
    }

    public function actualizar($id)
    {
        $model = new MascotaModel();
        $especie = $this->request->getPost('especie');
        if ($especie === 'Otra') {
            $especie = $this->request->getPost('otra_especie');
        }
        $model->update($id, [
            'nombre' => $this->request->getPost('nombre'),
            /* 'especie' => $this->request->getPost('especie'), */
            'especie' => $especie,
            'raza' => $this->request->getPost('raza'),
            'nro_registro' => $this->request->getPost('nro_registro'),
            'edad' => $this->request->getPost('edad'),
        ]);

        session()->setFlashdata('mensaje', 'Modificación de mascota realizada con éxito');
        session()->setFlashdata('tipo', 'modificacion');
        return redirect()->to('/mascotas');
    }

    /* public function eliminar($id)
    {
        $model = new MascotaModel();
        $model->delete($id);
        return redirect()->to('/mascotas');
    } */

}