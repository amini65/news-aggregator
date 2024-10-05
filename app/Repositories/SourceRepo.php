<?php

namespace App\Repositories;

use App\Models\Source;

class SourceRepo
{

    private $model;
    public function __construct(Source $source)
    {
        $this->model = $source;
    }
}
