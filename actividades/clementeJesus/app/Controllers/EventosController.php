<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\CiudadadesModel;
use App\Models\EventosModel;


class EventosController extends BaseController
{
    public function index()
    {
        $model = model(EventosModel::class);

        $data = [
            'eventos_list' => $model->getEventos(),
            'title' => 'Eventos archive', 
        ];

        return view('templates/header', $data)
            . view('eventos/index')
            . view('templates/footer');
    }


    public function show( $id = null)
    {
        $model = model(EventosModel::class);

        $data['eventos'] = $model->getEventos($id);

        if ($data['eventos'] === null) {
            throw new PageNotFoundException('Cannot find the eventos item: ' . $id);
        }

        $data['title'] = $data['eventos']['nombre']; 

        return view('templates/header', $data)
            . view('eventos/view', $data)
            . view('templates/footer');
    }
    
    // public function show($id)
    // {
    //     $model = model(EventosModel::class);

        
        
    //     if ($model->where('id', $id)->find()) {

    //         $data = [
    //             'eventos_list' => $model->where('id', $id)->first(),
    //             'title' => 'Show Item',
                

    //         ];
    //     } else {
    //         throw new PageNotFoundException('Cannot find the viajes item');
    //     }
        

        

    //     return view('templates/header', $data)
    //         . view('eventos/view')
    //         . view('templates/footer');
    // }

    public function new()
    {
        helper('form');
        $model_ciudades = model(CiudadadesModel::class);
        if ($data['artistas'] = $model_ciudades->findAll()) {
            return view('templates/header', ['title' => 'Create a eventos item'])
                . view('eventos/create', $data)
                . view('templates/footer');
        }
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['nombre', 'fecha', 'aforo', 'id_ciudad']);

        if (
            !$this->validateData($data, [
                'nombre' => 'required|max_length[255]|min_length[1]',
                'fecha' => 'required|max_length[255]|min_length[1]',
                'aforo' => 'required|max_length[255]|min_length[1]',
                'id_ciudad' => 'required'
            ])
        ) {
        
            return $this->new();
        }

        $post = $this->validator->getValidated();

        $model = model(EventosModel::class);

        $model->save([
            'nombre' => $post['nombre'],
            'fecha' => $post['fecha'],
            'aforo' => $post['aforo'],
            'id_ciudad' => $post['id_ciudad'],
        ]);

        return redirect()->to(base_url('eventos'));

    }
    public function delete($id)
    {
        if ($id == null) {
            throw new PageNotFoundException('Cannot delete the item');
        }

        $model = model(EventosModel::class);
        if ($model->where('id', $id)->find()) {
            $model->where('id', $id)->delete();
        } else {
            throw new PageNotFoundException('Selected item does not exist in database');
        }

        return redirect()->to(base_url('eventos'));
    }

    public function update($id)
    {
        helper('form');

        if ($id == null) {
            throw new PageNotFoundException('Cannot update the item');
        }

        $model = model(EventosModel::class);
        $ciudadadesModel = model(CiudadadesModel::class);
        if ($model->where('id', $id)->find()) {
            $data = [
                'eventos' => $model->where('id', $id)->first(),
                'title' => 'Update item',
                'ciudades' => $ciudadadesModel->findAll(),
            ];
        } else {
            throw new PageNotFoundException('Selected item does not exist in database');
        }

        return view('templates/header', $data)
            . view('eventos/update')
            . view('templates/footer');
    }

    

    public function updatedItem($id)
    {
        helper('form');

        $data_form = $this->request->getPost(['nombre', 'fecha', 'aforo', 'id_ciudad']);

        $validationRules = [
            'nombre' => 'required|max_length[255]|min_length[1]',
            'fecha' => 'required|max_length[255]|min_length[1]',
            'aforo' => 'required|max_length[255]|min_length[1]',
            'id_ciudad' => 'required|integer|is_not_unique[ciudades.id]',
        ];

        if (!$this->validateData($data_form, $validationRules)) {
            return $this->update($id);
        }

        $post = $this->validator->getValidated();
        $EventosModel = model(EventosModel::class);

        $EventosModel->save([
            'id' => $id,
            'nombre' => $post['nombre'],
            'fecha' => $post['fecha'],
            'aforo' => $post['aforo'],
            'id_ciudad' => $post['id_ciudad'],
        ]);

        session()->setFlashdata('message', 'El Evento ha sido actualizada exitosamente.');

        return redirect()->to(base_url('/eventos'));
    }
}