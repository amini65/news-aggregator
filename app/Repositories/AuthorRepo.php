<?php

namespace App\Repositories;

use App\Models\Author;

class AuthorRepo
{
    private $model;
    public function __construct(Author $author)
    {
        $this->model = $author;
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
