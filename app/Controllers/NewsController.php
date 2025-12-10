<?php

namespace App\Controllers;
use CodeIgniter\Exceptions\PageNotFoundException;

use App\Models\NewsModel;
use App\Models\CategoryModel;

class NewsController extends BaseController
{
    public function index()
    {
        $model = model(NewsModel::class);

        $data = [
            'news_list' => $model->getNews(),
            'title'     => 'News archive',
        ];

        return view('templates/header', $data)
                . view('news/index')
                . view('templates/footer');
    }

    public function show(?string $slug = null)
    {
        $model = model(NewsModel::class);

        $data['news'] = $model->getNews($slug);
        
        if ($data['news'] === null) {
            throw new PageNotFoundException('Cannot find the news item: ' . $slug);
        }

        $data['title'] = $data['news']['title'];

        return view('templates/header', $data)
            . view('news/view')
            . view('templates/footer');
    }
    public function new()
    {
        helper('form');
        $model = model(CategoryModel::class);
        if($data['category'] = $model->findAll()) {
            return view('templates/header', ['title' => 'Create a news item'])
                . view('news/create', $data)
                . view('templates/footer');
        }
        
    }
    public function create()
    {
        helper('form');

        $data = $this->request->getPost(['title', 'body']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
            'id_category' => 'required',
        ])) {
            // The validation fails, so returns the form.
            return $this->new();
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model_cat = model(NewsModel::class);

        $model_cat->save([
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
            'id_category' => $post['id_category'],
        ]);

        return view('templates/header', ['title' => 'Create a news item'])
            . view('news/success')
            . view('templates/footer');
        // return redirect()->to(base_url('/'));
    }

    public function delete($id)
    {
        
        if ($id == null) {
            throw new PageNotFoundException('Cannot delete the item');
        }        

        $model = model(NewsModel::class);

        if($model->where('id' ,$id)->find()){
            $model->where('id' ,$id)->delete();
        }else {
            throw new PageNotFoundException('Selected item does not exist in databases');
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
            throw new PageNotFoundException('Cannot update the item');
        }        

        $model = model(NewsModel::class);
        $model_cat = model(CategoryModel::class);
        $data_cat['category'] = $model_cat->findAll();

        if ($model->where('id', $id)->find()) {
            // Load categories so the update form can show the category select (like in `new`).
            $catModel = model(CategoryModel::class);
            $categories = $catModel->findAll();

            $data = [
                'news' => $model->where('id', $id)->first(),
                'title' => 'Update Item',
                
            ];
        } else {
            throw new PageNotFoundException('Selected item  not found in databases');
        }

        return view('templates/header', $data)
            . view('news/update',$data_cat)
            . view('templates/footer');
        //return redirec()->to(base_url(''));
    }
    public function updateItem($id)
    {
        helper('form');

        // Include `id_category` so validation and getValidated() receive it.
        $data_form = $this->request->getPost(['title', 'body', 'id_category']);

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validateData($data_form, [
            'title' => 'required|max_length[255]|min_length[3]',
            'body'  => 'required|max_length[5000]|min_length[10]',
            'id_category' => 'required',
        ])) {
            // The validation fails, so returns the form.
            return $this->update($id);
        }

        // Gets the validated data.
        $post = $this->validator->getValidated();

        $model = model(NewsModel::class);

        $model->save([
            'id' => $id,
            'title' => $post['title'],
            'slug'  => url_title($post['title'], '-', true),
            'body'  => $post['body'],
            'id_category' => $post['id_category'],
        ]);

    
        return redirect()->to(base_url(''));
    }
}