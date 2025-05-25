<?php

namespace App\Models;

use CodeIgniter\Model;

class MascotaModel extends Model
{
    protected $table      = 'mascotas';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nombre', 'especie', 'raza', 'nro_registro', 'edad', 'fecha_alta', 'fecha_defuncion','fecha_venta'
    ];

    protected $useTimestamps = false;
}
