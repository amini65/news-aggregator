<?php

namespace App\Repositories\Category;

interface CategoryRepoInterface
{

    public function create($name);

    public function findByName($name);

    public function getBySourceName($sourceName);
}
