<?php

namespace App\Models;

use CodeIgniter\Model;

class AmoModel extends Model
{
    protected $table      = 'amos';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre_apellido','dni', 'direccion', 'telefono', 'fecha_alta'
    ];

    protected $useTimestamps = false;
}