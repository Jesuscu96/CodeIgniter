<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\Page;
use App\Models\CategoryModel;


class CategoryController extends BaseController
{
    public function index()
    {
        $model = model(CategoryModel::class);

        $data = [
            'categories' => $model->findAll(),
            'title' => 'Categoty archive',
        ];

        return view('templates/header', $data)
            . view('categories/index')
            . view('templates/footer');
    }


    public function new()
    {
        helper('form');

        return view('templates/header', ['title' => 'Create a category item'])
            . view('categories/create')
            . view('templates/footer');
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['category']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data, [
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

        return $this->index();
    }

    public function delete($id)
    {

        if ($id == null) {
            throw new PageNotFoundException('Cannot delete the item');
        }

        $model = model(CategoryModel::class);

        if ($model->where('id', $id)->find()) {
            $model->where('id', $id)->delete();
        } else {
            throw new PageNotFoundException('Selected item does not exist in databases');
        }

        //     return view('templates/header', ['title' => 'Create a news item'])
        //         . view('news/success')
        //         . view('templates/footer');
        return $this->index();

    }
    public function update($id)
    {
        helper('form');

        if ($id == null) {
            throw new PageNotFoundException('Cannot update the item');
        }

        $model = model(CategoryModel::class);

        if ($model->where('id', $id)->find()) {

            $data = [
                'categories' => $model->where('id', $id)->first(),
                'title' => 'Update Item',

            ];
        } else {
            throw new PageNotFoundException('Selected item  not found in databases');
        }

        return view('templates/header', ['title' => 'Update categories item'])
            . view('categories/update', $data)
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


        return $this->index();
    }
}
