<?php
namespace App\Models;

use CodeIgniter\Model;

class CiudadadesModel extends Model
{   
    protected $table = 'ciudades';
    protected $allowedFields = ['ciudad', 'provincia'];

    protected $returnType = 'array'; 

}