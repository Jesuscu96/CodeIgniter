<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    //protected $allowedFields = ['title', 'slug', 'body'];
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category'];
 
    // public function getNews($slug = false)
    // {
    //     if ($slug === false) {
    //         $sql = $this->select('news.*,category.category'); 
    //         $sql = $this->join('category', 'news.id_category=category.id');
    //         $this->findAll();
    //         return $sql;
    //     }
    //     $sql = $this->select('news.*,category.category'); 
    //     $sql = $this->join('category', 'news.id_category=category.id');
    //     $sql = $this->where(['slug' => $slug]);
    //     $sql = $this->first();
    //     return $sql;
    // }

}