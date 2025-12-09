<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    //protected $allowedFields = ['title', 'slug', 'body'];
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category'];
 
    

}