<?php

namespace App\Repositories;

use App\Models\Preference;


class PreferenceRepo
{

    private $model;
    public function __construct(Preference $preference)
    {
        $this->model = $preference;
    }
}
