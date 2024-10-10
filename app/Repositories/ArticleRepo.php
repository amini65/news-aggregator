<?php

namespace App\Repositories;

use App\Models\Article;

class ArticleRepo
{

    protected $fillable=[
        'source_id',
        'category_id',
        'author_id',
        'title',
        'description',
        'image',
        'content',
        'published_at',
    ];
    private $model;
    public function __construct(Article $article)
    {
        $this->model = $article;
    }

    public function create($params)
    {
        $this->model::create($params);
    }
}
