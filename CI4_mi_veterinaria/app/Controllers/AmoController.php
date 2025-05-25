<?php
namespace App\Controllers;
use App\Models\AmoModel;

class AmoController extends BaseController {
    public function index() {
        $model = new AmoModel();
        $data['amos'] = $model->findAll();
        return view('amos/index', $data);
    }

    public function formulario_alta() {
        return view('amos/alta_amo');
    }

    public function guardar()
    {
        $model = new AmoModel();

        $data = [
            'nombre_apellido' => $this->request->getPost('nombre_amo'),
            'dni'             => $this->request->getPost('dni'),
            'direccion'       => $this->request->getPost('direccion'),
            'telefono'        => $this->request->getPost('telefono'),
            'fecha_alta'      => $this->request->getPost('fecha_alta_amo')
        ];

        // Validar que no exista ya un amo con mismo DNI
        $amoExistente = $model->where('dni', $data['dni'])->first();

        if ($amoExistente) {
            return redirect()->back()->with('error', 'Ya existe un amo con ese DNI');
        }

        $model->insert($data);
        session()->setFlashdata('mensaje', 'Alta de amo realizada con éxito');
        session()->setFlashdata('tipo', 'alta');
        return redirect()->to('/')->with('mensaje', 'Amo registrado correctamente');
    }

    public function formModificar()
    {
        $model = new AmoModel();
        $amos = $model->findAll();

        return view('amos/modificar_lista', ['amos' => $amos]);
    }

    public function editar($id)
    {
        $model = new AmoModel();
        $amo = $model->find($id);

        return view('amos/modificar_formulario', ['amo' => $amo]);
    }

    public function guardarModificacion()
    {
        $model = new AmoModel();

        $id = $this->request->getPost('id');

        $model->update($id, [
            'nombre_apellido' => $this->request->getPost('nombre_apellido'),
            'direccion' => $this->request->getPost('direccion'),
            'telefono' => $this->request->getPost('telefono'),
        ]);

        session()->setFlashdata('mensaje', 'Modificación de amo realizada con éxito');
        session()->setFlashdata('tipo', 'modificacion');
        return redirect()->to('/')->with('mensaje', 'Amo modificado correctamente');
    }



}
?>