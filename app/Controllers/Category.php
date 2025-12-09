<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;


use App\Models\NewsModel;
use App\Models\CategoryModel;

class Category extends BaseController
{
    public function index()
    {
        $model = model(CategoryModel::class);

        $data = [
            'title' => 'Categoty archive',
        ];

        return view('templates/header', $data)
                . view('category/index')
                . view('templates/footer');
    }

    public function show()
    {
        $model = model(CategoryModel::class);

        $data = [
            'title' => 'Categoty archive',
        ];

        return view('templates/header', $data)
            . view('category/view')
            . view('templates/footer');
    }
    public function new()
    {
        helper('form');
        $model = model(CategoryModel::class);
        if($data['category'] = $model->findAll()) {
            return view('templates/header', ['title' => 'Create a category item'])
                . view('category/create', $data)
                . view('templates/footer');
        }
        
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['category']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'category' => 'required|max_length[255]|min_length[3]',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model_cat = model(CategoryModel::class);

        $model_cat->save([
            'category' => $post['category'],
            
        ]);

        return view('templates/header', ['title' => 'Create a category item'])
            . view('category/success')
            . view('templates/footer');
        // return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        
        if ($id == null) {
            throw new PageNotFoundExcepction('Cannot delete the item');
        }        

        $model = model(CategoryModel::class);

        if($model->where('id' ,$id)->find()){
            $model->where('id' ,$id)->delete();
        }else {
            throw new PageNotFoundExcepction('Selected item does not exist in databases');
        }

    //     return view('templates/header', ['title' => 'Create a news item'])
    //         . view('news/success')
    //         . view('templates/footer');
        return redirect()->to(base_url(''));
    }
    public function update($id)
    {
        helper('form');
        
        if ($id == null) {
            throw new PageNotFoundExcepction('Cannot update the item');
        }        

        $model = model(CategoryModel::class);

        if ($model->where('id', $id)->find()) {

            $data = [
                'category' => $model->where('id', $id)->first(),
                'title' => 'Update Item',
                
            ];
        } else {
            throw new PageNotFoundExcepction('Selected item  not found in databases');
        }

        return view('templates/header', $data)
            . view('category/update')
            . view('templates/footer');
        //return redirec()->to(base_url(''));
    }
    public function updateItem($id)
    {
        helper('form');

        // Include `id_category` so validation and getValidated() receive it.
        $data_form = $this->request->getPost(['category']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data_form, [
            'category' => 'required|max_length[255]|min_length[3]',
            
        ])) {
            // The validation fails, so returns the form.
            return $this->update($id);
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(CategoryModel::class);

        $model->save([
            'id' => $id,
            'category' => $post['category'],
        ]);

    
        return redirect()->to(base_url(''));
    }
}