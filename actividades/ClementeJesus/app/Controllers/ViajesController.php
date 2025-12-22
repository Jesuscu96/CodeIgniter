<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\ViajesModel;

class ViajesController extends BaseController
{
    public function index()
    {
        $model = model(ViajesModel::class);

        $data = [
            'viajes' => $model->findAll(),
            'title' => 'Viajes archive',
        ];

        return view('templates/header', $data)
            . view('viajes/index')
            . view('templates/footer');
    }
    public function show($id)
    {
        $model = model(ViajesModel::class);

        
        
        if ($model->where('id', $id)->find()) {

            $data = [
                'viajes' => $model->where('id', $id)->first(),
                'title' => 'Show Item',

            ];
        } else {
            throw new PageNotFoundException('Cannot find the viajes item');
        }
        

        

        return view('templates/header', $data)
            . view('viajes/view')
            . view('templates/footer');
    }


    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a viajes item'])
            . view('viajes/create')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['viaje', 'fecha', 'plazas']);

        
        if (! $this->validateData($data, [
            'viaje' => 'required|max_length[255]|min_length[1]',
            'fecha' => 'required|max_length[255]|min_length[1]',
            'plazas' => 'required|max_length[255]|min_length[1]',
        ])) {
            
            return $this->new();
        }

        
        $post = $this->validator->getValidated();

        $model_vij = model(ViajesModel::class);

        $model_vij->save([
            'viaje' => $post['viaje'],
            'fecha' => $post['fecha'],
            'plazas' => $post['plazas'],

        ]);

        return $this->index();
    }

    public function delete($id)
    {

        if ($id == null) {
            throw new PageNotFoundException('Cannot delete the item');
        }

        $model = model(ViajesModel::class);

        if ($model->where('id', $id)->find()) {
            $model->where('id', $id)->delete();
        } else {
            throw new PageNotFoundException('Selected item does not exist in databases');
        }

      
        return $this->index();

    }
    public function update($id)
    {
        helper('form');

        if ($id == null) {
            throw new PageNotFoundException('Cannot update the item');
        }

        $model = model(ViajesModel::class);

        if ($model->where('id', $id)->find()) {

            $data = [
                'viajes' => $model->where('id', $id)->first(),
                'title' => 'Update Item',

            ];
        } else {
            throw new PageNotFoundException('Selected item  not found in databases');
        }

        return view('templates/header', ['title' => 'Update viaje item'])
            . view('viajes/update', $data)
            . view('templates/footer');
        
    }
    public function updateItem($id)
    {
        helper('form');

        
        $data_form = $this->request->getPost(['viaje', 'fecha', 'plazas']);

       
        if (! $this->validateData($data_form, [
            'viaje' => 'required|max_length[255]|min_length[1]',
            'fecha' => 'required|max_length[255]|min_length[1]',
            'plazas' => 'required|max_length[255]|min_length[1]',

        ])) {
            
            return $this->update($id);
        }

        
        $post = $this->validator->getValidated();

        $model = model(ViajesModel::class);

        $model->save([
            'id' => $id,
            'viaje' => $post['viaje'],
            'fecha' => $post['fecha'],
            'plazas' => $post['plazas'],
        ]);


        return $this->index();
    }
}
