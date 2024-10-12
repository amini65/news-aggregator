<?php

namespace App\Repositories\Source;

use App\Models\Source;

class SourceRepo implements SourceRepoInterface
{

    private $model;
    public function __construct(Source $source)
    {
        $this->model = $source;
    }

    public function getByName(string $name)
    {
      return  $this->model->where('name', $name)->first();
    }
}
