<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepo
{

    private $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

}
