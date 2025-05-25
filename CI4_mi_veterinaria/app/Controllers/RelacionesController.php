<?php

namespace App\Controllers;
use App\Models\AmoModel;
use App\Models\MascotaModel;
use App\Models\AmoMascotaModel;
use App\Models\VeterinarioModel;
use App\Models\VeterinarioMascotaModel;

class RelacionesController extends BaseController
{
    //retorna formulario alta relacion amo_mascota 
    public function formAlta()
    {
        return view('relaciones/alta_amo_mascota');
    }

    //procesa y guarda alta relacion amo-mascota
    public function guardarAlta()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();
        $relacionModel = new AmoMascotaModel(); 
        
        $dni = $this->request->getPost('dni');
        $nombre_amo = $this->request->getPost('nombre_amo');

        // Verificar si el amo ya existe (por DNI y nombre completo)
        $amoExistente = $amoModel->where('dni', $dni)
                                ->where('nombre_apellido', $nombre_amo)
                                ->first();

        if ($amoExistente) {
            // Si ya existe, usamos su ID
            $id_amo = $amoExistente['id'];
        } else {
        // Si no existe, insertamos amo 
        $id_amo = $amoModel->insert([
            'nombre_apellido' => $this->request->getPost('nombre_amo'),
            'dni' => $this->request->getPost('dni'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
            'fecha_alta' => $this->request->getPost('fecha_alta_amo')
        ]);

        }
        // Generar número de registro para la nueva mascota
        $nroRegistro = 'REG' . rand(1000, 999999); // ejemplo: REG8732

         // Verificar si especie es 'Otra'
        $especie = $this->request->getPost('especie');
        if ($especie === 'Otra') {
            $especie = $this->request->getPost('otra_especie');
        }

        // Insertar mascota
        $id_mascota = $mascotaModel->insert([
            'nombre' => $this->request->getPost('nombre_mascota'),
            /* 'especie' => $this->request->getPost('especie'), */
            'especie' => $especie,
            'raza' => $this->request->getPost('raza'),
            /* 'nro_registro' => $this->request->getPost('nro_registro'), */
            'nro_registro' => $nroRegistro,
            'edad' => $this->request->getPost('edad'),
            'fecha_alta' => $this->request->getPost('fecha_alta_mascota')
        ]);

        // Insertar relación
        $relacionModel->insert([
            'id_amo' => $id_amo,
            'id_mascota' => $id_mascota,
            'fecha_inicio' => date('Y-m-d')
        ]);

        session()->setFlashdata('mensaje', 'Alta de relacion realizada con éxito');
        session()->setFlashdata('tipo', 'alta');
        return redirect()->to('/')->with('mensaje', 'Amo y Mascota registrados correctamente');
    
    }

    //comprueba las mascotas que tiene ese dni actualmente antes de cargar datos
    public function comprobar_mascotas()
    {
        $dni = $this->request->getPost('dni');

        $amoModel = new \App\Models\AmoModel();
        $amo = $amoModel->where('dni', $dni)->first();

        if ($amo) {
            $amoMascotaModel = new \App\Models\AmoMascotaModel();
            $mascotas = $amoMascotaModel
                ->select('mascotas.nombre, mascotas.especie')
                ->join('mascotas', 'mascotas.id = amo_mascota.id_mascota')
                ->where('amo_mascota.id_amo', $amo['id'])
                ->findAll();

            return $this->response->setJSON($mascotas);
        }

        return $this->response->setJSON([]); // no encontró amo
    }


  
    //retorna el formulario alta relacion mascota existente, rellenando los select
    public function alta()
    {
        $amoModel = new AmoModel();

        // Traigo todos los amos sin filtro
        $amos = $amoModel->findAll();

        // Para las mascotas hago query con join y filtro en amo_mascota
        $db = \Config\Database::connect();
        $builder = $db->table('mascotas');
        $builder->select('mascotas.*');
        $builder->join('amo_mascota', 'amo_mascota.id_mascota = mascotas.id');
        $builder->where('amo_mascota.fecha_fin IS NOT NULL');
        $builder->where('amo_mascota.motivo', 'venta');
        $builder->where('amo_mascota.adoptada', '0');//y que adopcion sea igual = 0
        $builder->groupBy('mascotas.id');

         // Esta subconsulta descarta mascotas que ya tienen una relación activa con adoptada = 1
        $builder->whereNotIn('mascotas.id', function($sub) {
            $sub->select('id_mascota')
                ->from('amo_mascota')
                ->where('fecha_fin IS NULL')
                ->where('adoptada', '1');
        });

        $mascotas = $builder->get()->getResultArray();

        $data = [
            'amos' => $amos,
            'mascotas' => $mascotas
        ];

        return view('relaciones/alta_solo_relacion', $data);
    }

    //guarda la relacion del nuevo dueño con mascota existente
    public function guardarRelacion()
    {
        $relacionModel = new AmoMascotaModel();
        

        $relacionModel->insert([
            'id_amo' => $this->request->getPost('id_amo'),
            'id_mascota' => $this->request->getPost('id_mascota'),
            'fecha_inicio' => $this->request->getPost('fecha_inicio'),
            'adoptada' => '1'//y  poner en adoptada 1 
        ]);

        session()->setFlashdata('mensaje', 'Alta de relacion realizada con éxito');
        session()->setFlashdata('tipo', 'alta');
        return redirect()->to('/')->with('mensaje', 'Relación registrada correctamente');
    }

    //retorna el formulario de las relaciones actuales amo-mascota para dar de baja
    public function verRelaciones()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('amo_mascota');
        $builder->select('amo_mascota.*, amos.nombre_apellido as nombre_amo, mascotas.nombre as nombre_mascota', 'amo_mascota.motivo');
        $builder->join('amos', 'amo_mascota.id_amo = amos.id');
        $builder->join('mascotas', 'amo_mascota.id_mascota = mascotas.id');
        $query = $builder->get();
        $relaciones = $query->getResultArray();

        return view('relaciones/amo_mascota', ['relaciones' => $relaciones]);
    }

    //retorna el formulario para confirmar la baja de la relacion
    public function formBaja($id)
    {
        $relacionModel = new AmoMascotaModel();
        $mascotaModel = new MascotaModel();

        $relacion = $relacionModel->select('amo_mascota.*, amos.nombre_apellido as nombre_amo, mascotas.nombre as nombre_mascota')
                                   ->join('amos', 'amo_mascota.id_amo = amos.id')
                                   ->join('mascotas', 'amo_mascota.id_mascota = mascotas.id')
                                   ->find($id);

        if (!$relacion) {
            return redirect()->to('/relaciones/amo_mascota')->with('error', 'Relación no encontrada.');
        }

        return view('relaciones/baja_amo_mascota', [
            'relacion' => $relacion
        ]);
    }

    //procesa la baja de relacion
    public function procesarBaja($id)
    {
        $relacionModel = new AmoMascotaModel();
        $mascotaModel = new MascotaModel();

        $relacion = $relacionModel->find($id);
        if (!$relacion) {
            return redirect()->to('/relaciones/amo_mascota')->with('error', 'Relación no encontrada.');
        }

        $motivo = $this->request->getPost('motivo');
        $fechaFin = $this->request->getPost('fecha_fin');

        // Actualizar fecha de fin de la relación
        $relacionModel->update($id, [
            'fecha_fin' => $fechaFin,
            'motivo' => $motivo,
            'adoptada' => ($motivo === 'venta') ? '0' : null // solo si es venta, queda en adopción
        ]);

        // Si falleció, también se actualiza en la tabla de mascotas
        if ($motivo === 'fallecimiento') {
            $mascotaModel->update($relacion['id_mascota'], [
                'fecha_defuncion' => $fechaFin,
                
            ]);

        }

        // Si la vendieron, también se actualiza en la tabla de mascotas
        if ($motivo === 'venta') {
            $mascotaModel->update($relacion['id_mascota'], [
                'fecha_venta' => $fechaFin,
                
            ]);
            
        }
        session()->setFlashdata('mensaje', 'Baja de relacion realizada con éxito');
        session()->setFlashdata('tipo', 'baja');
        return redirect()->to('/relaciones/verRelaciones')->with('mensaje', 'Baja procesada correctamente.');
    }


    public function verMascotasPorAmo()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();
        $relacionModel = new AmoMascotaModel();

        $todosAmos = $amoModel->findAll();
        $amoId = $this->request->getGet('amo_id');
        $mascotas = [];

        if ($amoId) {
            // Si se filtró por un amo, traer solo las relacionadas
            $relaciones = $relacionModel->where('id_amo', $amoId)->findAll();

            foreach ($relaciones as $rel) {
                $mascota = $mascotaModel->find($rel['id_mascota']);
                if ($mascota) {
                    $mascota['fecha_inicio'] = $rel['fecha_inicio'];
                    $mascota['fecha_fin'] = $rel['fecha_fin'];
                    $mascota['motivo'] = $rel['motivo'];
                    $mascotas[] = $mascota;
                }
            }
        } else {
            // Si no hay filtro, mostrar todas las mascotas
            $mascotas = $mascotaModel->findAll();
        }

        return view('relaciones/ver_mascotas_por_amo', [
            'amos' => $todosAmos,
            'amoSeleccionado' => $amoId,
            'mascotas' => $mascotas
        ]);
    }

    public function verAmosPorMascota()
    {
        $amoModel = new AmoModel();
        $mascotaModel = new MascotaModel();
        $relacionModel = new AmoMascotaModel();

        $todasMascotas = $mascotaModel->findAll();
        $mascotaId = $this->request->getGet('mascota_id');
        $amos = [];

        if ($mascotaId) {
            // Buscar relaciones con esa mascota
            $relaciones = $relacionModel->where('id_mascota', $mascotaId)->findAll();

            foreach ($relaciones as $rel) {
                $amo = $amoModel->find($rel['id_amo']);
                if ($amo) {
                    $amo['fecha_inicio'] = $rel['fecha_inicio'];
                    $amo['fecha_fin'] = $rel['fecha_fin'];
                    $amo['motivo'] = $rel['motivo'];
                    $amos[] = $amo;
                }
            }
        }else {
            // Si no hay filtro, mostrar todos los amos
            $amos = $amoModel->findAll();
        }

        return view('relaciones/ver_amos_por_mascota', [
            'mascotas' => $todasMascotas,
            'mascotaSeleccionada' => $mascotaId,
            'amos' => $amos
        ]);
    }

    //retorna el formulario para registrar la visita de un veterinario
    public function registrar_visita()
    {
        $veterinarioModel = new VeterinarioModel();
        $mascotaModel = new MascotaModel();

        $data = [
            'veterinarios' => $veterinarioModel->findAll(),
            'mascotas' => $mascotaModel->findAll(),
        ];

        return view('relaciones/registrar_visita', $data);
    }

    //guarda la visita del veterinario
    public function guardar_visita()
    {
        $visitaModel = new VeterinarioMascotaModel();

        $datos = [
            'id_veterinario' => $this->request->getPost('id_veterinario'),
            'id_mascota' => $this->request->getPost('id_mascota'),
            'fecha_atencion' => $this->request->getPost('fecha_atencion'),
            'diagnostico' => $this->request->getPost('diagnostico'),
        ];

        $visitaModel->insert($datos);

        session()->setFlashdata('mensaje', 'Visita registrada con éxito');
        session()->setFlashdata('tipo', 'alta');
        return redirect()->to('/')->with('mensaje', 'Visita registrada correctamente.');
    }

   

}
?>