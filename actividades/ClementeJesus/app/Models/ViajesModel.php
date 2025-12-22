<?php

namespace App\Models;

use CodeIgniter\Model;

class ViajesModel extends Model
{
    
    protected $table = 'viajes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['viaje', 'fecha', 'plazas'];
 
}