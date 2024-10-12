<?php

namespace App\Repositories\Author;

use App\Models\Author;

class AuthorRepo
{
    private $model;
    public function __construct(Author $author)
    {
        $this->model = $author;
    }

    public function create($name)
    {
       return $this->model::firstOrCreate(['name'=>$name]);
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
