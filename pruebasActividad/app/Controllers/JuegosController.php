<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\JuegosModel;

class JuegosController extends BaseController
{
    public function index()
    {
        $model = model(JuegosModel::class);

        $data = [
            'juegos' => $model->findAll(),
            'title' => 'Juegos archive',
        ];

        return view('templates/header', $data)
            . view('juegos/index')
            . view('templates/footer');
    }


    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a juego item'])
            . view('juegos/create')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['nombre']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
            'nombre' => 'required|max_length[255]|min_length[3]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model_cat = model(JuegosModel::class);

        $model_cat->save([
            'nombre' => $post['nombre'],

        ]);

        return $this->index();
    }

    public function delete($id)
    {

        if ($id == null) {
            throw new PageNotFoundException('Cannot delete the item');
        }

        $model = model(JuegosModel::class);

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

        $model = model(JuegosModel::class);

        if ($model->where('id', $id)->find()) {

            $data = [
                'juegos' => $model->where('id', $id)->first(),
                'title' => 'Update Item',

            ];
        } else {
            throw new PageNotFoundException('Selected item  not found in databases');
        }

        return view('templates/header', ['title' => 'Update categories item'])
            . view('juegos/update', $data)
            . view('templates/footer');
        //return redirec()->to(base_url(''));
    }
    public function updateItem($id)
    {
        helper('form');

        
        $data_form = $this->request->getPost(['nombre']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data_form, [
            'nombre' => 'required|max_length[255]|min_length[3]',

        ])) {
            // The validation fails, so returns the form.
            return $this->update($id);
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(JuegosModel::class);

        $model->save([
            'id' => $id,
            'nombre' => $post['nombre'],
        ]);


        return $this->index();
    }
}
