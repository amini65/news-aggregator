<?php

namespace App\Services\Article;

use Illuminate\Support\Facades\Facade;

/**
 * @method static ArticleService index(array $inputs)
 */
class Article extends Facade
{
    public static function getFacadeAccessor()
    {
        return ArticleServiceInterface::class;
    }
}
