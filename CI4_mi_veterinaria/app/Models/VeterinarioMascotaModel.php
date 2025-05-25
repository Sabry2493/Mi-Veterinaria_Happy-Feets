<?php

namespace App\Models;

use CodeIgniter\Model;

class VeterinarioMascotaModel extends Model
{
    protected $table = 'veterinario_mascota';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_veterinario',
        'id_mascota',
        'fecha_atencion',
        'diagnostico'
    ];
}