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

}
