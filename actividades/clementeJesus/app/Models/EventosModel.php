<?php

namespace App\Models;

use CodeIgniter\Model;

class EventosModel extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nombre', 'fecha', 'aforo', 'id_ciudad'];

    protected $returnType = 'array';


    public function getEventos($id = false)
    {
        if ($id === false) {
            $sql = $this->select('eventos.*, ciudades.ciudad');
            $sql = $this->join('ciudades', 'eventos.id_ciudad=ciudades.id');
            $sql = $this->findAll();
            return $sql;
        }

        $sql = $this->select('eventos.*, ciudades.ciudad');
        $sql = $this->join('ciudades', 'eventos.id_ciudad=ciudades.id');
        $sql = $this->where(['eventos.id' => $id]);
        $sql = $this->first();
        return $sql;

    }
}