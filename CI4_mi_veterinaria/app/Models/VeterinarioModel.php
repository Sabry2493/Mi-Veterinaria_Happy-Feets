<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinarioModel extends Model
{
    protected $table = 'veterinarios';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre_apellido',
        'matricula',
        'especialidad',
        'telefono_personal',
        'fecha_ingreso',
        'fecha_egreso'
    ];
}