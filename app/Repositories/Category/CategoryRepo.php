<?php

namespace App\Repositories\Category;

use App\Models\Category;

class CategoryRepo implements CategoryRepoInterface
{

    private $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function create($name)
    {
        return $this->model::firstOrCreate(['name' => $name]);
    }

    public function findByName($name)
    {
        return $this->model::where('name', $name)->firstOrFail();
    }

    public function getBySourceName($sourceName)
    {
        return $this->model::query()
            ->whereHas('sources', function ($query) use ($sourceName) {
                return $query->where('name', $sourceName);
            })
            ->get();
    }
    public function all()
    {
        return $this->model::query()->get();
    }
}
