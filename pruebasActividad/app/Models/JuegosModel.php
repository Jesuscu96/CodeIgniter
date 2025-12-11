<?php

namespace App\Models;

use CodeIgniter\Model;

class JuegosModel extends Model
{
    
    protected $table = 'juegos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre'];
 
}