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

    public function create($params)
    {
        return $this->model::create($params);
    }

    public function findByName($name)
    {
        return $this->model::where('name', $name)->firstOrFail();
    }

    public function all()
    {
        return $this->model::query()->get();
    }
}
