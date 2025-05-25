<?php
namespace App\Models;
use CodeIgniter\Model;

class AmoMascotaModel extends Model {
    protected $table = 'amo_mascota';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_amo', 'id_mascota', 'fecha_inicio', 'fecha_fin', 'motivo','adoptada'];

    protected $useTimestamps = false;
}

?>

