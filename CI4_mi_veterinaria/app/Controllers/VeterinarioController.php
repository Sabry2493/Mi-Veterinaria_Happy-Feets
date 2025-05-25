<?php

namespace App\Controllers;

use App\Models\VeterinarioModel;
use App\Models\VeterinarioMascotaModel;

class VeterinarioController extends BaseController
{
    public function index($modo = 'ver')
    {
        $model = new VeterinarioModel();
        $data['veterinarios'] = $model->findAll();
        $data['modo'] = $modo; // Nuevo

        return view('veterinarios/lista', $data);
    }

    public function crear()
    {
        return view('veterinarios/crear');
    }

    public function guardar()
    {
        $model = new VeterinarioModel();
        $especialidad = $this->request->getPost('especialidad');
        if ($especialidad === 'Otra especialidad') {
            $especialidad = $this->request->getPost('otra_especialidad');
        }
        //comienzo bloque
        $data = [
            'nombre_apellido' => $this->request->getPost('nombre_apellido'),
            'matricula'             => $this->request->getPost('matricula'),
            /* 'especialidad'       => $this->request->getPost('especialidad'), */
            'especialidad'       => $especialidad,
            'telefono_personal'        => $this->request->getPost('telefono_personal'),
            'fecha_ingreso'      => $this->request->getPost('fecha_ingreso')
        ];

        // Validar que no exista ya un amo con mismo DNI
        $veterinarioExistente = $model->where('matricula', $data['matricula'])->first();

        if ($veterinarioExistente) {
            return redirect()->back()->with('error', 'Ya existe un veterinario con esa matricula');
        }

        $model->insert($data);
        //fin bloque
        session()->setFlashdata('mensaje', 'Alta de veterinario realizada con éxito');
        session()->setFlashdata('tipo', 'alta');
        return redirect()->to('/veterinarios');
    }

    public function editar($id)
    {
        $model = new VeterinarioModel();
        $data['veterinario'] = $model->find($id);

        return view('veterinarios/editar', $data);
    }

    public function listarParaModificar()
    {
        return $this->index('editar');
    }

    public function actualizar($id)
    {
        $model = new VeterinarioModel();
        $especialidad = $this->request->getPost('especialidad');
        if ($especialidad === 'Otra especialidad') {
            $especialidad = $this->request->getPost('otra_especialidad');
        }
        $model->update($id, [
            'nombre_apellido' => $this->request->getPost('nombre_apellido'),
            'matricula' => $this->request->getPost('matricula'),
            /* 'especialidad' => $this->request->getPost('especialidad'), */
            'especialidad'       => $especialidad,
            'telefono_personal' => $this->request->getPost('telefono_personal'),
            'fecha_ingreso' => $this->request->getPost('fecha_ingreso'),
            'fecha_egreso' => $this->request->getPost('fecha_egreso'),
        ]);

        session()->setFlashdata('mensaje', 'Modificación de veterinario realizada con éxito');
        session()->setFlashdata('tipo', 'modificacion');

        return redirect()->to('/veterinarios/listarParaModificar');
    }

    public function baja($id)
    {
        $model = new VeterinarioModel();
        $fechaEgreso = $this->request->getPost('fecha_egreso');
        $model->update($id, [
        'fecha_egreso' => date('Y-m-d')
        ]);
        session()->setFlashdata('mensaje', 'Baja de veterinario realizada con éxito');
        session()->setFlashdata('tipo', 'baja');
        
        return redirect()->to('/veterinarios');
    }

    public function confirmarBaja($id)
    {
        $model = new VeterinarioModel();
        $data['veterinario'] = $model->find($id);

        if (!$data['veterinario']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Veterinario no encontrado con ID: $id");
        }

        return view('veterinarios/baja', $data);
    }

    public function listarParaBaja()
    {
        return $this->index('baja');
    }

    public function mostrarMascotasAtendidas()
    {
        $vetModel = new VeterinarioModel();
        $relModel = new VeterinarioMascotaModel();

        $veterinarios = $vetModel->findAll();
        $veterinarioId = $this->request->getGet('veterinario_id');

        $mascotas = [];

        if ($veterinarioId) {
            $db = \Config\Database::connect();
            $builder = $db->table('veterinario_mascota vm');
            $builder->select('m.nombre, vm.fecha_atencion, vm.diagnostico');
            $builder->join('mascotas m', 'm.id = vm.mascota_id');
            $builder->where('vm.veterinario_id', $veterinarioId);
            $mascotas = $builder->get()->getResultArray();
        }

        return view('veterinarios/mascotas_atendidas', [
            'veterinarios' => $veterinarios,
            'mascotas' => $mascotas,
            'veterinarioSeleccionado' => $veterinarioId
        ]);
    }

    public function mascotas($id)
    {
        $veterinarioModel = new VeterinarioModel();
        $veterinario = $veterinarioModel->find($id);

        if (!$veterinario) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Veterinario no encontrado con ID: $id");
        }

        $veterinarioMascotaModel = new \App\Models\VeterinarioMascotaModel();

         // Obtener todas las mascotas del veterinario actual
        $mascotas = $veterinarioMascotaModel
            ->select('mascotas.*,veterinario_mascota.fecha_atencion, veterinario_mascota.diagnostico')
            ->join('mascotas', 'mascotas.id = veterinario_mascota.id_mascota')
            ->where('veterinario_mascota.id_veterinario', $id)
            ->orderBy('veterinario_mascota.fecha_atencion', 'DESC')
            ->findAll();

        
        return view('veterinarios/mascotas', [
            'veterinario' => $veterinario,
            'mascotas' => $mascotas
        ]);
    }

    

    
}